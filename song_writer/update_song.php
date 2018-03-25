<?php 
	include_once '../php_codes/class.database.php';
	include_once '../php_codes/class.mdsongwriter.php';
	include_once '../php_codes/class.song.php';
	include_once 'php_codes/config.php';

	$OneMDSwriter = new MdSongWriter($db, $_SESSION['id'], $_SESSION['login'], '');
	
	if (isset($_SESSION['login']) && isset($_GET['idsg'])) {

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update a song - My Daily Song</title>

	<!-- Metadonnées -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="author" content="Nucléus Technologies">
	<meta name="expires" content="never">
	<meta name="subject" content="New song page of MDSongWriter">

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
					<a class="nav-item nav-link active" href="songs.php">Available songs</a>
					<a class="nav-item nav-link" href="new_song.php">New song <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="php_codes/deconnect.php">Sign out</a>
				</div>
			</div>
		</nav>

		<section class="available-songs content-center">
	
			<h3 class="display-4 mb-4 mt-4">Update a song</h3>

			<form class="update-song-form mt-4" method="POST" action="php_codes/songUpdate.php">

				<input type="hidden" name="u_id_song" id="u_id_song" value="<?php echo $_GET['idsg']; ?>">

				<?php
				
					$stmt = $DefaultSong->readSong("id_song", $_GET['idsg']);

					$row = $stmt->fetch(PDO::FETCH_ASSOC);
				
				?>

				<div class="form-group row">
					<label for="n_title" class="col-sm-2 col-form-label">New Title</label>
					<div class="col-sm-10">
						<input type="text" name="n_title" class="form-control" id="n_title" value="<?php echo $row['title']; ?>" required>
						<small class="form-text text-muted">This new title references this song and will appear on the site.</small>
					</div>
				</div>

				<div class="form-group row">
					<label for="n_author" class="col-sm-2 col-form-label">New Author</label>
					<div class="col-sm-10">
						<input type="text" name="n_author" class="form-control" id="n_author" value="<?php echo $row['author']; ?>" required>
						<small class="form-text text-muted">Give the author' new name of this song.</small>
					</div>
				</div>

				<div class="form-group row">
					<label for="n_lyrics" class="col-sm-2 col-form-label">Lyrics</label>
					<div class="col-sm-10">
						<small class="form-text text-muted mb-1">
							- Use the break-line to separated verses and chorus. <br>
							- Define the verses numbering yourself (1- 2- 3- or 1. 2. 3. or else). <br>
						</small>
						<textarea name="n_lyrics" class="form-control" id="n_lyrics" required> <?php echo $row['lyrics']; ?> </textarea>
					</div>
				</div>

				<div class="form-group row div-n_meditation">
					<label for="n_meditation" class="col-sm-2 col-form-label">New Meditations</label>
					<div class="col-sm-10">
						<small class="form-text text-muted mb-1">
							- Use the break-line to separated verses and chorus. <br>
							- Define the verses numbering yourself (1- 2- 3- or 1. 2. 3. or else). <br>
						</small>
						<textarea name="n_meditation" class="form-control" id="n_meditation"> <?php echo $row['meditation']; ?> </textarea>
					</div>
				</div>

				<div class="form-group row">
					<label for="n_release_date" class="col-sm-2 col-form-label">New Release date</label>
					<div class="col-sm-10">
						<input type="date" name="n_release_date" class="form-control" id="n_release_date" min="<?php echo date('Y-m-d'); ?>"  value="<?php echo $row['release_date']; ?>" required>
						<small class="form-text text-muted">Choose the new release date of this song.</small>
					</div>
				</div>
				
				<div class="div-submit-button mb-4">
					<button type="submit" class="submit-button" id="update-song-btn"><i class="icon-hdd-2"></i> Update this song informations </button>
				</div>

			</form>

		</section>

	</div>

</body>
</html>

<?php

	} else {
		header("location:php_codes/deconnect.php");
	}

?>