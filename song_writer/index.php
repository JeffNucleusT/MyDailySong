<?php 
	include_once '../php_codes/class.database.php';
	include_once '../php_codes/class.mdsongwriter.php';
	include_once 'php_codes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>MDSongWriter Connexion - My Daily Song</title>

	<!-- Metadonnées -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="author" content="Nucléus Technologies">
	<meta name="expires" content="never">
	<meta name="subject" content="Login page of MDSongWriter">

	<!-- Feuilles de styles -->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/fontello/fontello.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/fontello/fontello-ie7.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/fontello/animation.css">
	<link rel="stylesheet" type="text/css" href="css/sw_global.css">

	<!-- Icône -->
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/thelogos/favicon.png">

	<!-- Scripts js -->
	<script src="../assets/js/jquery-3.2.1.js"></script>
	<script src="../assets/js/tether.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="js/sw_global.js"></script>
</head>
<body>

	<div class="container-fluid">

		<section class="login-section content-center">
			
			<h3 class="display-4">#MDSongWriter Connexion</h3>

			<form method="POST" action="php_codes/connect.php">
				
				<div class="div-login-input">
					<input type="text" name="login" class="login-input" id="login-input" placeholder="Login...">
				</div>

				<div class="div-login-input">
					<input type="password" name="password" class="login-input" id="password-input" placeholder="Password...">
				</div>

				<div class="div-submit-button">
					<button type="submit" class="submit-button" id="login-button"><i class="icon-login-1"></i> Sign in</button>
				</div>

			</form>

		</section>

	</div>

</body>
</html>