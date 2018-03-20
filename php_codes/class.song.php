<?php

	/**
	* Songs attribs and methods
	*/

	class Song
	{
		// Database connection
		private $_con;
		private $_table_name = 'songs';

		// Properties
		private $_id_song;
		public $_name_song;
		public $_title;
		public $_author;
		public $_lyrics;
		public $_meditation;
		private $_release_date;
		public $_likes;
		public $_dislikes;
		public $_share_facebook;
		public $_share_twitter;
		public $_share_google;
		public $_updates;

		private $_nom_chemin;

		public function __construct($db, $id_song, $name, $title, $author, $lyrics, $meditation, $release_date, $likes, $disliles, $share_facebook, $share_twitter, $share_google, $updates)
		{
			$this->_con = $db;
			$this->_id_song = $id_song;
			$this->_name_song = $name;
			$this->_title = $title;
			$this->_author = $author;
			$this->_lyrics = $lyrics;
			$this->_meditation = $meditation;
			$this->_release_date = $release_date;
			$this->_likes = $likes;
			$this->_dislikes = $disliles;
			$this->_share_facebook = $share_facebook;
			$this->_share_twitter = $share_twitter;
			$this->_share_google = $share_google;
			$this->_updates = $updates;
		}

		public function getId_song()
		{
			return $this->_id_song;
		}

		public function getRelease_date()
		{
			return $this->_release_date;
		}

		// Create a new song
		private function createSong()
		{
			$this->_name_song = htmlspecialchars(strip_tags($this->_name_song));
			$this->_title = htmlspecialchars(strip_tags($this->_title));
			$this->_title = htmlspecialchars(strip_tags($this->_title));
			$this->_author = htmlspecialchars(strip_tags($this->_author));
			$this->_lyrics = htmlspecialchars(strip_tags($this->_lyrics));
			$this->_meditation = htmlspecialchars(strip_tags($this->_meditation));
			$this->_release_date = htmlspecialchars(strip_tags($this->_release_date));

			if ($_FILES['name_song']['error'] > 0) { return "get_file_error"; }

			else {
				$ext = substr(strrchr($_FILES['name_song']['name'], '.'), 1);
				if (!in_array($ext, array('mp3','wav'))) { return "get_extension_error";}

				else {

					//Déplacement
					$this->_name_song = str_replace(" ", "", strtoupper($this->_author))."-".str_replace("/", "", $this->_release_date);
					$this->_nom_chemin = "../../media/{$this->_name_song}";
					move_uploaded_file($_FILES['name_song']['tmp_name'], $this->_nom_chemin);
				
				}

			}

			$query1 = "SELECT title FROM " . $this->_table_name . " WHERE title LIKE " . $this->_title;
			$stmt1 = $this->_con->prepare($query1);
			$stmt1->bindParam(':title', $this->_title);
			$stmt1->execute();

			if ($stmt1->rowCount() == 0) {
				
				$query2 = "SELECT release_date FROM " . $this->_table_name . " WHERE release_date LIKE " . $this->_release_date;
				$stmt2 = $this->_con->prepare($query1);
				$stmt2->bindParam(':release_date', $this->_release_date);
				$stmt2->execute();

				if ($stmt2->rowCount() == 0) {
				
					if ($this->_release_date <= date("m/d/Y")) {
						
						try {

							$query3 = "INSERT INTO " . $this->_table_name . "(name_song, title, author, lyrics, meditation, release_date) VALUES(:name_song, :title, :author, :lyrics, :meditation, :release_date)";
							$stmt3 = $this->_con->prepare($query3);

							$stmt3->bindParam(':name_song', $this->_name_song);
							$stmt3->bindParam(':title', $this->_title);
							$stmt3->bindParam(':author', $this->_author);
							$stmt3->bindParam(':lyrics', $this->_lyrics);
							$stmt3->bindParam(':meditation', $this->_meditation);
							$stmt3->bindParam(':release_date', $this->_release_date);

							$stmt3->execute();

							return 'Save_Success';

						} catch (Exception $ex) {
							return 'Statement Error : ' . $ex;
						}

					} else {
						return 'Date_Passed';
					}
					
				} else {
					return 'Date_Exist';
				}

			} else {
				return 'Title_Exist';
			}
		}

		// Read the infos of a song
		public function readSong($thatDate)
		{
			$thatDate = htmlspecialchars(strip_tags($thatDate));

			$query = "SELECT * FROM " . $this->_table_name . " WHERE release_date = :thatDate";
			
			$stmt = $this->_con->prepare($query);
			$stmt->bindParam(':thatDate', $thatDate);
			$stmt->execute();

			return $stmt;
		}

		private function updateSong($idSong)
		{
			
		}

		private function deleteSong($idSong)
		{

		}

	}

?>