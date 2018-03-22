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

		public function formatDate($input_format)
		{
			$annee = substr($input_format, 0, 4);
			$mois = substr($input_format, 5, 2);
			$jour = substr($input_format, 8, 2);
			return $jour . "/" . $mois . "/" . $annee;
		}

		// Create a new song
		public function createSong($name_song, $title, $author, $lyrics, $meditation, $release_date)
		{
			$name_song = htmlspecialchars(strip_tags($name_song));
			$title = htmlspecialchars(strip_tags($title));
			$author = htmlspecialchars(strip_tags($author));
			$lyrics = htmlspecialchars(strip_tags($lyrics));
			$meditation = htmlspecialchars(strip_tags($meditation));
			$release_date = htmlspecialchars(strip_tags($release_date));

			try {
				
				$query1 = "SELECT title FROM " . $this->_table_name . " WHERE title LIKE :title";
				$stmt1 = $this->_con->prepare($query1);
				$stmt1->bindParam(':title', $title);
				$stmt1->execute();

				if ($stmt1->rowCount() == 0) {
					
					$query2 = "SELECT release_date FROM " . $this->_table_name . " WHERE release_date LIKE :release_date";
					$stmt2 = $this->_con->prepare($query2);
					$stmt2->bindParam(':release_date', $release_date);
					$stmt2->execute();

					if ($stmt2->rowCount() == 0) {
					
						if ($release_date >= date("Y-m-d")) {
							
							try {

								$query3 = "INSERT INTO " . $this->_table_name . "(name_song, title, author, lyrics, meditation, release_date) VALUES(:name_song, :title, :author, :lyrics, :meditation, :release_date)";
								$stmt3 = $this->_con->prepare($query3);

								$stmt3->bindParam(':name_song', $name_song);
								$stmt3->bindParam(':title', $title);
								$stmt3->bindParam(':author', $author);
								$stmt3->bindParam(':lyrics', $lyrics);
								$stmt3->bindParam(':meditation', $meditation);
								$stmt3->bindParam(':release_date', $release_date);

								$stmt3->execute();

								return 'Save_Success';

							} catch (Exception $e) {
								return 'Statement Error : ' . $e;
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

			} catch (Exception $e) {
				return 'Statement Error : ' . $e;
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

		public function searchSong($type, $search)
		{
			$type = htmlspecialchars(strip_tags($type));
			$search = htmlspecialchars(strip_tags($search));

			if ($type == 'song')  $type_s = 'title'; 
			elseif ($type == 'author') $type_s = 'author';
			else $type_s = 'release_date';
			
			$query = "SELECT * FROM " . $this->_table_name . " WHERE release_date <= ? AND " . $type_s . " LIKE ? ORDER BY release_date DESC";
			
			try {
				
				$stmt = $this->_con->prepare($query);
				$stmt->bindValue(1, date('Y-m-d'));
				$stmt->bindValue(2, "%".$search."%");
				$stmt->execute();

				$nb = $stmt->rowCount();

				if ($nb != 0) {

					echo "<h1 class='col-12 display-1'>Search results for the " . $type . " <small><u>" .  $search . "</u></small></h1>";

					echo "<h3 class='col-12 mb-4'>About <b>" . $nb . "</b> results.</h3>";
				
					while ($row = $stmt->fetch()) {
						echo '
							<div class="col-12 col-sm-10 col-md-8">
								<article class="card mb-4">
									<div class="card-block">
										<h4 class="card-title"><strong>' . $row["title"] . '</strong></h4>
										<h6 class="card-subtitle mb-2 text-muted"><i>by ' . $row["author"] . '</i></h6>
										<p class="card-text">' . substr(strip_tags($row["lyrics"]), 0, 200).'...' . '</p>
										<small>Release on the ' . $this->formatDate($row["release_date"]) . '</small> | 
										<a href="dailysong.php?rl_dt=' . $row["release_date"] . '" class="card-link">Go to this song <i class="icon-right-open-big"></i></a>
									</div>
								</article>
							</div>
						';
					}

				} 

				else {
					echo '
						<div class="col-12 col-sm-10 col-md-8">
							<div class="alert alert-info" role="alert">
								<strong>Heads up!</strong> No results for your search <u><?php echo $_GET[\'search\']; ?></u> in the past days!
							</div>
						</div>
					';
				}

			} catch (PDOException $e) {
				echo 'Statement Error : ' . $e;
			}
		}

		public function likeDislikeSong($id_song, $vote)
		{
			$id_song = htmlspecialchars(strip_tags($id_song));
			$vote = htmlspecialchars(strip_tags($vote));
			$_table_col = $vote . "s";

			$query = "UPDATE " . $this->_table_name . " SET " . $_table_col . " = " . $_table_col . " + 1 WHERE " . $id_song . " = :id_song";

			try {
				
				$stmt = $this->_con->prepare($query);
				$stmt->bindParam(':id_song', $id_song);
				$stmt->execute();

				setcookie('vote' . $id_song, $vote, time() + 3650*24*3600, null, null, false, true);

				return 'vote_success';

			} catch (PDOException $e) {
				return 'Statement Error : ' . $e;
			}
		}

	}

?>