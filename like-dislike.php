<?php

	include 'php_codes/config.php';

	if (isset($_POST['id_song']) && isset($_POST['vote'])) {
		
		$id_song = strip_tags($_POST['id_song']);
		$vote = strip_tags($_POST['vote']);

		try {
			
			if ($vote == "like") {
				$query = $db->prepare("UPDATE songs SET likes = likes + 1 WHERE id_song = :id_song");
			} 
			elseif ($vote == "dislike") {
				$query = $db->prepare("UPDATE songs SET dislikes = dislikes + 1 WHERE id_song = :id_song");
			}

			$query->bindParam(':id_song', $id_song);
			$query->execute();

			setcookie('adresse_MAC', 'ssssssss', time() + 3650*24*3600, null, null, false, true);
			setcookie('vote'.$id_song, $vote, time() + 3650*24*3600, null, null, false, true);

			echo "vote_success";

		} catch (Exception $e) {
			echo $e;
		}		

	}

?>