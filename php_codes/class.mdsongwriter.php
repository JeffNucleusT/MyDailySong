<?php

	/**
	* Song writer attribs and methods
	*/
	class MdSongWriter
	{
		// Database connection
		private $_con;
		private $_table_name = 'mdsongwriter';

		// Properties
		private $_id;
		private $_login;
		private $_password;
		
		function __construct($db, $id, $login, $password)
		{
			$this->_con = $db;
			$this->_id = $id;
			$this->_login = $login;
			$this->_password = $password;
		}

		public function getId()
		{
			return $this->_id;
		}

		public function getLogin()
		{
			return $this->_login;
		}

		public function getPassword()
		{
			return $this->_password;
		}

		public function connexion($login, $password)
		{
			$login = htmlspecialchars(strip_tags($login));
			$password = htmlspecialchars(strip_tags($password));

			$query = "SELECT id, login, password FROM " . $this->_table_name . " WHERE login = :login";

			$form = '
				<form method="POST" action="connect.php">

					<div class="div-login-input">
						<input type="text" name="login" class="login-input" id="login-input" placeholder="Login..." value="'.$_POST['login'].'">
					</div>

					<div class="div-login-input">
						<input type="password" name="password" class="login-input" id="password-input" placeholder="Password..." value="'.$_POST['password'].'">
					</div>

					<div class="div-submit-button">
						<button type="submit" class="submit-button" id="login-button"><i class="icon-login-1"></i> Sign in</button>
					</div>

				</form>
			';

			// Récuperation et vérification des informations de connexion
			try {
				
				$stmt = $this->_con->prepare($query);
				$stmt->bindParam(':login', $login);
				$stmt->execute();

				$nb_result = $stmt->rowCount();

				$row = $stmt->fetch();
				
				if ($nb_result == 0) {
					echo "<div class='alert alert-danger'> <strong>Oh snap!</strong> This login is wrong! </div>";
					echo $form;
				}

				else {

					$n_login = htmlspecialchars($row["login"]);
					$n_password = htmlspecialchars($row["password"]);
					
					if (CRYPT_BLOWFISH == 1) {
						$Cn_password = crypt($password, '$2y$17$Df/2kl0.zf2pOM9/7dsPQn.5Gt3Xt/a8i$');
					}
					
					if (hash_equals($Cn_password, $n_password)) {

						$_SESSION["id"] = htmlspecialchars($row["id"]);
						$_SESSION["login"] = $n_login;
						
						header('location:../home.php');

					}

					else {
						echo "<div class='alert alert-danger'> <strong>Oh snap!</strong> This password is wrong! </div>";
						echo $form;
					}
				}
			} catch (PDOException $e) {
				echo "<div class='alert alert-danger'> <strong>Oh snap!</strong> An error occured at the time of your connexion! Please try again! </div>";
				echo $form;
			}

		}

		public function deconnexion()
		{
			session_unset();
			session_destroy();
			header("location:../");
		}


		public function writerListSong($ord_rl)
		{
			$aSong = new Song($this->_con, '', '', '', '', '', '', '', '', '', '', '', '', '');

			$signe = ($ord_rl == "rl") ? "<=" : ">";
			$actual_date = date("Y-m-d");

			$query = "SELECT * FROM songs WHERE release_date " . $signe . " :actual_date ORDER BY release_date DESC";
			
			$stmt = $this->_con->prepare($query);
			$stmt->bindParam(":actual_date", $actual_date);
			$stmt->execute();
			
			while ($row = $stmt->fetch()) {
				
				$dis = ($signe == '<=') ? " disabled' href='#' title='This option is disabled because this song has been released.'" : "' href='update_song.php?idsg=" . $row['id_song'] . "'";

				$infos_mdt = (strlen($row['meditation']) != 0) ? "<i class='icon-info-circled-1'></i>with Meditations" : "";

				echo "
					<div class='list-group-item list-group-item-action flex-column align-items-start'>
						
						<div class='d-flex w-100 justify-content-between'>
							
							<h5 class='mb-1'>" . $row['title'] . " <small>by " . $row['author'] . "</small></h5>
							
							<div class='dropdown ml-4'>
								<a class='btn btn-secondary btn-sm dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
									<i class='icon-cog-alt'></i>
								</a>

								<div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
									<a class='dropdown-item' href='#' data-toggle='modal' data-target='#viewSongModal" . $row['id_song'] . "'><i class='icon-eye'></i> View</a>
									<a class='dropdown-item" . $dis . "><i class='icon-pencil'></i> Update</a>
									<a class='dropdown-item' href='#' data-toggle='modal' data-backdrop='static' data-target='#deleteSongModal" . $row['id_song'] . "'><i class='icon-trash'></i> Delete</a>
								</div>
							</div>
							
							<!-- View Modal -->
							<div class='modal fade' id='viewSongModal" . $row['id_song'] . "' tabindex='-1' role='dialog' aria-labelledby='viewSongModalTitle" . $row['id_song'] . "' aria-hidden='true'>
								
								<div class='modal-dialog modal-lg' role='document'>
									
									<div class='modal-content'>
										
										<div class='modal-header'>
											<div class='w-100'>
												<input type='hidden' id='share-today-title" . $row['id_song'] . "' value='" . $row['title'] . " by " . $row['author'] . " with Lyrics and Meditation.'>
												<audio controls='controls' class='w-100'>
													Votre navigateur ne supporte pas l'élément <code>audio</code>. Veuillez le mettre à jour.
													<source src='../media/" . $row['name_song'] . "' type='audio/mp3'>
												</audio><hr>
												<h5 class='modal-title' id='viewSongModalTitle'><b>" . $row['title'] . "</b> <small>by</small> " . $row['author'] . "</h5>
												<span>Release on the " . $aSong->formatDate($row['release_date']) . ".</span>
												<p class='mb-1'> 
													<span class='badge badge-success badge-pill'><i class='icon-thumbs-up-1'></i>" . $row['likes'] . "</span>
													<span class='badge badge-danger badge-pill'><i class='icon-thumbs-down-1'></i>" . $row['dislikes'] . "</span> |
													<span class='badge badge-primary badge-pill'><i class='icon-facebook'></i> " . $row['share_facebook'] . "</span>
													<span class='badge badge-info badge-pill'><i class='icon-twitter'></i> " . $row['share_twitter'] . "</span>
													<span class='badge badge-danger badge-pill'><i class='icon-google'></i> " . $row['share_google'] . "</span>
												</p>
											</div>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>

										<div class='modal-body'>
											<div class='lyrics'><h2 class='mb-4 mt-4'>LYRICS</h2>" . $row['lyrics'] . "</div>
											<div class='meditations'><h2 class='mb-4 mt-4'>MEDITATION</h2>" . $row['meditation'] . "</div>
										</div>

										<div class='modal-footer'>
											<h3 class='display-4'>05 comments</h3>
										</div>

									</div>

								</div>

							</div>
							
							<!-- Delete Modal -->
							<div class='modal' id='deleteSongModal" . $row['id_song'] . "' tabindex='-1' role='dialog' aria-labelledby='deleteSongModalTitle" . $row['id_song'] . "' aria-hidden='true'>
								
								<div class='modal-dialog modal-dialog-centered' role='document'>
									
									<div class='modal-content'>
										
										<div class='modal-body'>
											Do you want to delete the song&nbsp;<b>" . $row['title'] . "</b>&nbsp;?
										</div>

										<div class='modal-footer'>
											<input type='hidden' class='del_idSong' value='" . $row['id_song'] . "'>
											<button type='button' class='btn btn-secondary' data-dismiss='modal'>NO</button>
											<button type='button' class='btn btn-primary del_btnSong' id='del_btnSong" . $row['id_song'] . "'>YES</button>
										</div>

									</div>

								</div>

							</div>

						</div>

					</div>
				";

			}

		}

		public function nbSong($ord_rl)
		{
			$signe = ($ord_rl == "rl") ? "<=" : ">";
			$actual_date = date("Y-m-d");

			$query = "SELECT * FROM songs WHERE release_date " . $signe . " :actual_date";
			
			$stmt = $this->_con->prepare($query);
			$stmt->bindParam(":actual_date", $actual_date);
			$stmt->execute();

			return $stmt->rowCount();

		}

	}

?>