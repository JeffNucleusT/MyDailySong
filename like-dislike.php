<?php

	include_once 'phpcs/class.database.php';
	include_once 'phpcs/class.song.php';
	include_once 'phpcs/class.comment.php';
	include_once 'phpcs/class.message.php';
	include_once 'phpcs/config.php';

	if (isset($_POST['id_song']) && isset($_POST['vote'])) {
		
		echo $DefaultSong->likeDislikeSong($_POST['id_song'], $_POST['vote']);	

	}

?>