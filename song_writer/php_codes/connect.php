<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>MDSongWriter Connexion - My Daily Song</title>

	<!-- Metadonnées -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" />
	<meta name="author" content="Nucléus Technologies">
	<meta name="expires" content="never">
	<meta name="subject" content="Sign in page of MDSongWriter">

	<!-- Feuilles de styles -->
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/fontello/fontello.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/fontello/fontello-ie7.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/fontello/animation.css">
	<link rel="stylesheet" type="text/css" href="../css/sw_global.css">

	<!-- Icône -->
	<link rel="shortcut icon" type="image/x-icon" href="../../assets/img/thelogos/favicon.png">

	<!-- Scripts js -->
	<script src="../../assets/js/jquery-3.2.1.js"></script>
	<script src="../../assets/js/tether.js"></script>
	<script src="../../assets/js/bootstrap.js"></script>
	<script src="../js/sw_global.js"></script>
</head>
<body>

	<div class="container-fluid">

		<section class="login-section">
			
			<h3 class="display-4">#MDSongWriter Connexion</h3>
			
			<?php
				if (isset($_POST['login']) && isset($_POST['password'])) {

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

					$login = strip_tags($_POST['login']);
					$password = strip_tags($_POST['password']);

					// Récuperation et vérification des informations de connexion
					try {
						
						$statment = $db -> prepare("SELECT * FROM mdsongwriter where login = :login");
						$statment -> bindParam(':login', $login);
						$statment -> execute();
						$nb_result = $statment -> rowCount();
						$get = $statment -> fetch();
						
						if ($nb_result == 0) {
							echo "<div class='alert alert-danger'> <strong>Oh snap!</strong> This login is wrong! </div>";
							echo $form;
						}

						else {

							$n_login = htmlspecialchars($get["login"]);
							$n_password = htmlspecialchars($get["password"]);
							
							if (CRYPT_BLOWFISH == 1) {
								$Cn_password = crypt($password, '$2y$17$Df/2kl0.zf2pOM9/7dsPQn.5Gt3Xt/a8i$');
							}
							
							if (hash_equals($Cn_password, $n_password)) {

								$_SESSION["login"] = $n_login;
								
								header('location:../home.php');

							}

							else {
								echo "<div class='alert alert-danger'> <strong>Oh snap!</strong> This password is wrong! </div>";
								echo $form;
							}
						}
					} catch (Exception $e) {
						echo "<div class='alert alert-danger'> <strong>Oh snap!</strong> An error occured at the time of your connexion! Please try again! </div>";
						echo $form;
					}

					$statment -> closeCursor();

				} else {
					header("location:../");
				}

			?>

		</section>

	</div>

</body>
</html>