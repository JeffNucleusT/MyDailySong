<?php 
	include_once '../php_codes/class.database.php';
	include_once '../php_codes/class.mdsongwriter.php';
	include_once 'php_codes/config.php';

	$OneMDSwriter = new MdSongWriter($db, $_SESSION['id'], $_SESSION['login'], '');
	
	if (isset($_SESSION['login'])) {

?>

<!DOCTYPE html>
<html>
<head>
	<title>MDSongWriter Home - My Daily Song</title>

	<!-- Metadonnées -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="author" content="Nucléus Technologies">
	<meta name="expires" content="never">
	<meta name="subject" content="Home page of MDSongWriter">

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

		<section class="nav-section content-center">
			
			<nav class="row">
				<div class="col-12 col-md-4 content-center">
					<a href="songs.php" class="content-center"><i class="icon-music"></i> Songs Management</a>
				</div>
				<div class="col-12 col-md-4 content-center">
					<a href="#" class="content-center"><i class="icon-hourglass-4"></i> Not Available</a>
				</div>
				<div class="col-12 col-md-4 content-center">
					<a href="php_codes/deconnect.php" class="content-center"><i class="icon-logout"></i> Sign out</a>
				</div>
			</nav>

		</section>

	</div>

</body>
</html>

<?php

	} else {
		header("location:php_codes/deconnect.php");
	}

?>