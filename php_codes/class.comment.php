<?php

	/**
	* Server and database connection
	*/
	class Comment
	{
		// Properties
		private $_host = "localhost";
		private $_db_name = "mydailysong_db";
		private $_username = "jeffNucleust";
		private $_password = "thenucleusTboy777";
		private $_con;

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

		public function readComment($idsong)
		{
			$query = "SELECT * FROM comments WHERE id_song = :idsong ORDER BY timestamp_c DESC";

			$stmt = $this->_con->prepare($query);
			$stmt->bindParam(':idsong', $idsong);
			$stmt->execute();

			return $stmt;
		}

	}

?>