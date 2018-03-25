<?php 

	include_once 'class.database.php';
	include_once 'class.song.php';
	include_once 'class.comment.php';
    include_once 'config.php';
    
    if (isset($_POST["name_c"]) && isset($_POST["email_c"]) && isset($_POST["comment_c"]) && isset($_POST["responce_c"]) && isset($_POST["id_song"])) {
        
        echo $DefaultComment->createComment($_POST["name_c"], $_POST["email_c"], $_POST["comment_c"], time(), $_POST["responce_c"], $_POST["id_song"]);

    } else {
        echo "Missing Informations";
    }
    

?>