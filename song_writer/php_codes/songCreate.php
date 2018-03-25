
<?php

	include_once '../../php_codes/class.database.php';
	include_once '../../php_codes/class.mdsongwriter.php';
	include_once '../../php_codes/class.upload.php';
	include_once '../../php_codes/class.song.php';
	include_once 'config.php';

	$OneMDSwriter = new MdSongWriter($db, $_SESSION['id'], $_SESSION['login'], '');
	
	if (isset($_SESSION['login'])) {

		if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['lyrics']) && isset($_POST['release_date']) && isset($_FILES['name_song']['name'])) {

			$OneUpload = new upload('../../media/', 'name_song');

			$new_name = str_replace(" ", "_", $_POST['title']);

			$info = new SplFileInfo($_FILES['name_song']['name']);
			$name_song = $new_name . ".". $info->getExtension();
		
			$OneUpload->cl_taille_maxi = 8*1048576;
			$OneUpload->cl_extensions = array('.mp3','.wav');

			if (!$OneUpload->uploadFichier($new_name)) echo $OneUpload->affichageErreur();
		
			echo $DefaultSong->createSong($name_song, $_POST['title'], $_POST['author'], $_POST['lyrics'], $_POST['meditation'], $_POST['release_date']);

		}
		else {
			echo 'Missing informations.';
		}

	} else {
		header("location:deconnect.php");
	}

?>
