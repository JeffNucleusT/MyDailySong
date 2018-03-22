<?php

	session_start();

	$database = new Database();
	$db = $database->getConnection();

	$DefaultMDSwriter = new MdSongWriter($db, '', '', '');
	$DefaultSong = new Song($db, '', '', '', '', '', '', '', '', '', '', '', '', '');

?>