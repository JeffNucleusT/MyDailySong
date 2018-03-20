<?php

	$database = new Database();
	$db = $database->getConnection();

	$DefaultSong = new Song($db, '', '', '', '', '', '', '', '', '', '', '', '', '');
	$DefaultComment = new Comment($db, '', '', '', '', '', '', '');

?>
