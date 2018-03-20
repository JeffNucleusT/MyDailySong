<?php

	include 'config.php';

	if (isset($_POST['name_msg']) && isset($_POST['email_msg']) && isset($_POST['message_msg'])) {
		
		$name_msg = strip_tags($_POST['name_msg']);
		$email_msg = strip_tags($_POST['email_msg']);
		$message_msg = strip_tags($_POST['message_msg']);
		$time_msg = time();
		$isread = 0;

		if (empty($name_msg) || empty($email_msg) || empty($message_msg)) {
			echo "empty_fields";
		} 

		else {
			try {
				$statmt = $db -> prepare("INSERT INTO messages(name_msg, email_msg, message_msg, time_msg, isread) VALUES (:name_msg, :email_msg, :message_msg, :time_msg, :isread)");
				$statmt -> execute(array(':name_msg'=>$name_msg, ':email_msg'=>$email_msg, ':message_msg'=>nl2br($message_msg), ':time_msg'=>$time_msg, ':isread'=>$isread));
				echo "good";
			} catch (PDOException $e) {
				echo "bad";
			}
		}

	}

?>
