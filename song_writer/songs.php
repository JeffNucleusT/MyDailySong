<?php 
	include_once '../php_codes/class.database.php';
	include_once '../php_codes/class.mdsongwriter.php';
	include_once '../php_codes/class.song.php';
	include_once 'php_codes/config.php';

	$OneMDSwriter = new MdSongWriter($db, $_SESSION['id'], $_SESSION['login'], '');
	
	if (isset($_SESSION['login'])) {

?>

<!DOCTYPE html>
<html>
<head>
	<title>Songs Management - My Daily Song</title>

	<!-- Metadonnées -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="author" content="Nucléus Technologies">
	<meta name="expires" content="never">
	<meta name="subject" content="Songs Management page of MDSongWriter">

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

	<div class="container">

		<nav class="navbar navbar-toggleable-md navbar-light">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="home.php">#MDSongWriter</a>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link active" href="songs.php">Available songs <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="new_song.php">New song</a>
					<a class="nav-item nav-link" href="php_codes/deconnect.php">Sign out</a>
				</div>
			</div>
		</nav>

		<section class="available-songs content-center">
	
			<h3 class="display-4 mb-4 mt-4">Available Songs</h3>

			<ul class="nav nav-tabs nav-justified mt-4" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#released" role="tab">
						Already released
						<span class="badge badge-pill badge-primary ml-2"><?php echo $OneMDSwriter->nbSong("rl"); ?></span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#noreleased" role="tab">
						Not released
						<span class="badge badge-pill badge-primary ml-2"><?php echo $OneMDSwriter->nbSong("no_rl"); ?></span>
					</a>
				</li>
			</ul>

			<div class="tab-content">
				
				<div class="tab-pane active" id="released" role="tabpanel">
					<div class="list-group mt-4"><?php $OneMDSwriter->writerListSong("rl"); ?></div>
				</div>
				<div class="tab-pane" id="noreleased" role="tabpanel">
					<div class="list-group mt-4"><?php $OneMDSwriter->writerListSong("no_rl"); ?></div>
				</div>

			</div>
			
		</section>

	</div>

</body>
</html>

<?php

	} else {
		header("location:php_codes/deconnect.php");
	}

?>