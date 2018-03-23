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


		public function writerListSong()
		{
			$aSong = new Song($this->_con, '', '', '', '', '', '', '', '', '', '', '', '', '');

			$query = "SELECT * FROM songs ORDER BY release_date DESC";
			
			$stmt = $this->_con->prepare($query);
			$stmt->execute();

			while ($row = $stmt->fetch()) {

				$infos_mdt = (strlen($row['meditation']) != 0) ? "<i class='icon-info-circled-1'></i>with Meditations" : "";

				echo "
					<div class='list-group-item list-group-item-action flex-column align-items-start'>
						<div class='d-flex w-100 justify-content-between'>
							<h5 class='mb-1'>" . $row['title'] . " <small>by " . $row['author'] . "</small></h5>
							<div class='dropdown show'>
								<a class='btn btn-secondary btn-sm dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
									<i class='icon-cog-alt'></i>
								</a>

								<div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
									<a class='dropdown-item' href='#' data-toggle='modal' data-target='#viewSongModal'>View</a>
									<a class='dropdown-item' href='#'>Update</a>
									<a class='dropdown-item' href='#'>Delete</a>
								</div>
							</div>
							
							<!-- Modal -->
							<div class='modal fade' id='viewSongModal' tabindex='-1' role='dialog' aria-labelledby='viewSongModalTitle' aria-hidden='true'>
								<div class='modal-dialog' role='document'>
									<div class='modal-content'>
										<div class='modal-header'>
											
											<h5 class='modal-title' id='viewSongModalTitle'>Modal title</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
											</button>
										</div>
										<div class='modal-body'>
											...
										</div>
									</div>
								</div>
							</div>

						</div>
						<p class='mb-1'> 
							<span class='badge badge-success badge-pill'><i class='icon-thumbs-up-1'></i>" . $row['likes'] . "</span>
							<span class='badge badge-danger badge-pill'><i class='icon-thumbs-down-1'></i>" . $row['dislikes'] . "</span> |
							<span class='badge badge-primary badge-pill'><i class='icon-facebook'></i> " . $row['share_facebook'] . "</span>
							<span class='badge badge-info badge-pill'><i class='icon-twitter'></i> " . $row['share_twitter'] . "</span>
							<span class='badge badge-danger badge-pill'><i class='icon-google'></i> " . $row['share_google'] . "</span>
						</p>
						<div class='d-flex w-100 justify-content-between'>
							<small>Release date : " . $aSong->formatDate($row['release_date']) . "</small>
							<small>" . $infos_mdt . "</small>
						</div>
					</div>
				";

			}

		}

	}

?>