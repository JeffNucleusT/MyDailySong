<?php

	/**
	* Comments about songs, attribs and methods
	*/
	class Comment
	{
		// Database connection
		private $_con;
		private $_table_name = 'comments';

		// Properties
		private $_id_comment;
		public $_name_c;
		public $_email_c;
		public $_comment_c;
		public $_timestamp_c;
		public $_response_c;
		private $_id_song;

		public function __construct($db, $id_comment, $name_c, $email_c, $comment_c, $timestamp_c, $response_c, $id_song)
		{
			$this->_con = $db;
			$this->_id_comment = $id_comment;
			$this->_name_c = $name_c;
			$this->_email_c = $email_c;
			$this->_comment_c = $comment_c;
			$this->_timestamp_c = $timestamp_c;
			$this->_response_c = $response_c;
			$this->_id_song = $id_song;
		}

		public function getIdcomment()
		{
			return $this->_id_comment;
		}

		public function getIdsong()
		{
			return $this->_id_song;
		}

		public function createComment($name_c, $email_c, $comment_c, $timestamp_c, $response_c, $id_song)
		{
			$name_c = htmlspecialchars(strip_tags($name_c));
			$email_c = htmlspecialchars(strip_tags($email_c));
			$comment_c = nl2br(htmlspecialchars(strip_tags($comment_c)));
			$timestamp_c = htmlspecialchars(strip_tags($timestamp_c));
			$response_c = htmlspecialchars(strip_tags($response_c));
			$id_song = htmlspecialchars(strip_tags($id_song));

			$query = "INSERT INTO " . $this->_table_name . " (name_c, email_c, comment_c, timestamp_c, response_c, id_song) VALUES (:name_c, :email_c, :comment_c, :timestamp_c, :response_c, :id_song)";
			
			try {
				
				$stmt = $this->_con->prepare($query);
				$stmt->bindParam(':name_c', $name_c);
				$stmt->bindParam(':email_c', $email_c);
				$stmt->bindParam(':comment_c', $comment_c);
				$stmt->bindParam(':timestamp_c', $timestamp_c);
				$stmt->bindParam(':response_c', $response_c);
				$stmt->bindParam(':id_song', $id_song);
				$stmt->execute();

				return "new_comment_success";

			} catch (PDOException $e) {
				return 'Statement Error : ' . $e;
			}

			return $stmt;
		}

		public function readComment($idsong)
		{
			$query = "SELECT * FROM " . $this->_table_name . " WHERE id_song = :idsong ORDER BY timestamp_c DESC";
			try {
				
				$stmt = $this->_con->prepare($query);
				$stmt->bindParam(':idsong', $idsong);
				$stmt->execute();

			} catch (PDOException $e) {
				return 'Statement Error : ' . $e;
			}

			return $stmt;
		}

	}

?>