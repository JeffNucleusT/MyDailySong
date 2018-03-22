<?php

	include_once 'php_codes/class.database.php';
	include_once 'php_codes/class.song.php';
	include_once 'php_codes/class.comment.php';
	include_once 'php_codes/config.php';

	if (isset($_POST['id_song']) && isset($_POST['vote'])) {
		
		echo $DefaultSong->likeDislikeSong($_POST['id_song'], $_POST['vote']);	

	}

?>