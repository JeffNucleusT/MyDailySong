<?php 

	include_once 'class.database.php';
	include_once 'class.song.php';
	include_once 'class.comment.php';
	include_once 'class.message.php';
    include_once 'config.php';
    
    if (isset($_POST['name_msg']) && isset($_POST['email_msg']) && isset($_POST['message_msg'])) {
        
		echo $DefaultMessage->createMessage($_POST["name_msg"], $_POST["email_msg"], $_POST["message_msg"]);

    } else {
        echo "Missing Informations";
    }
    

?>