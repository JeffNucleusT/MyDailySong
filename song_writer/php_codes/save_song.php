
<?php

	if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['lyrics']) && isset($_POST['release_date']) && isset($_FILES['name_song']['name'])) {

		include 'config.php';

		$title = strip_tags($_POST['title']);
		$author = strip_tags($_POST['author']);
		$lyrics = strip_tags($_POST['lyrics']);
		$meditation = strip_tags($_POST['meditation']);
		$release_date = strip_tags($_POST['release_date']);

		if ($_FILES['name_song']['error'] > 0) { echo "get_file_error"; }

		else {
			$ext = substr(strrchr($_FILES['name_song']['name'], '.'), 1);
			if (!in_array($ext, array('mp3','wav'))) { return "get_extension_error";}

			else {

				//Déplacement
				$name_song = str_replace(" ", "", strtoupper($author))."-".str_replace("/", "", $release_date);
				$nom_chemin = "../../media/{$name_song}";
				move_uploaded_file($_FILES['name_song']['tmp_name'], $nom_chemin);
			
			}

		}

		$request1 = $db->prepare("SELECT title FROM songs WHERE title LIKE :title");
		$request1->bindParam(':title', $title);
		$request1->execute();

		if ($request1->rowCount() == 0) {
			
			$request2 = $db->prepare("SELECT release_date FROM songs WHERE release_date LIKE :release_date");
			$request2->bindParam(':release_date', $release_date);
			$request2->execute();

			if ($request2->rowCount() == 0) {
			
				if ($release_date <= date("m/d/Y")) {
					
					try {

						$query = $db -> prepare("INSERT INTO songs(name_song, title, author, lyrics, meditation, release_date) VALUES(:name_song, :title, :author, :lyrics, :meditation, :release_date)");

						$query -> execute(array(
							':name_song' => $name_song,
							':title' => $title,
							':author' => $author,
							':lyrics' => $lyrics,
							':meditation' => $meditation,
							':release_date' => $release_date
						));
						echo 'Save_Success';

					} catch (Exception $ex) {
						echo $ex;
					}

				} else {
					echo "Date_Passed";
				}
				
			} else {
				echo "Date_Exist";
			}

		} else {
			echo "Title_Exist";
		}

	}
	else {
		echo 'Informations manquantes.';
	}

?>
