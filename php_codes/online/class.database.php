<?php

/**
* Server and database connection
*/
class Database
{
	// Properties
	private $_host = "185.98.131.90";
	private $_db_name = "mydai963307";
	private $_username = "mydai963307";
	private $_password = "h6Y5s3R6G4w3";
	private $_con;

	// Get the database connection
	public function getConnection()
	{
		$this->_con = null;

		try {
			$this->_con = new PDO('mysql:host='.$this->_host.';dbname='.$this->_db_name.';charset=utf8', $this->_username, $this->_password);
			$this->_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->_con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		} catch (PDOException $e) {
			echo "Connection error : " . $e->getMessage();
		}

		return $this->_con;
	}
}

?>