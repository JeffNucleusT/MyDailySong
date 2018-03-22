<?php 
	include_once '../../php_codes/class.database.php';
	include_once '../../php_codes/class.mdsongwriter.php';
	include_once 'config.php';
?>

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

		<section class="login-section content-center">
			
			<h3 class="display-4">#MDSongWriter Connexion</h3>
			
			<?php
				if (isset($_POST['login']) && isset($_POST['password'])) {

					$DefaultMDSwriter->connexion($_POST['login'], $_POST['password']);

				} else {
					header("location:../");
				}

			?>

		</section>

	</div>

</body>
</html>