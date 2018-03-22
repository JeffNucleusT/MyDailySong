<?php 
	include_once 'php_codes/class.database.php';
	include_once 'php_codes/class.song.php';
	include_once 'php_codes/class.comment.php';
	include_once 'php_codes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Searching Options - My Daily Song</title>

	<!-- Metadonnées -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Daily Meditation on Hymns & Songs. By Fr Herbert Niba.">
	<meta name="keywords" content="my daily song, daily song, song, mydailysong, MDS, mds, meditation, spiritual, gospel">
	<meta name="author" content="Nucléus Technologies">
	<meta name="expires" content="never">
	<meta name="subject" content="Searching Options page of My Daily Song">

	<!-- Feuilles de styles -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="assets/css/fontello/fontello.css">
	<link rel="stylesheet" type="text/css" href="assets/css/fontello/fontello-ie7.css">
	<link rel="stylesheet" type="text/css" href="assets/css/fontello/animation.css">
	<link rel="stylesheet" type="text/css" href="assets/css/global.css">
	<link rel="stylesheet" type="text/css" href="assets/css/global-responsive.css">

	<!-- Icône -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/logos/favicon.png">

	<!-- Scripts js -->
	<script src="assets/js/jquery-3.2.1.js"></script>
	<script src="assets/js/tether.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/plugins/scrollreveal.js"></script>
	<script src="assets/js/plugins/parallax.js"></script>
	<script src="assets/js/plugins/jquery.nicescroll.js"></script>
	<script src="assets/js/functions.js"></script>
	<script src="assets/js/global.js"></script>
	<script src="assets/js/songs.js"></script>
</head>
<body>

	<div class="container-fluid">

		<nav class="navbar" role="navigation">
			<a href="./"><i class="icon-music-4"></i> Home <i class="icon-music-4"></i></a>
			<a href="dailysong.php"><i class="icon-music-1"></i> Daily Song <i class="icon-music-1"></i></a>
			<a href="about.php"><i class="icon-music-outline"></i> About <i class="icon-music-outline"></i></a>
			<a href="contact.php"><i class="icon-music-3"></i> Contact <i class="icon-music-3"></i></a>
		</nav>

		<header class="search-header">
			<div class="search-header-nav">
				<p>
					<button type="button" id="showNavBtn" class="toOpen" title="The Menu">
						<i class="icon-music-4"></i>
						<i class="icon-menu-3"></i>
					</button>
				</p>
			</div>
		</header>

		<section class="title-search">
			<img src="assets/img/mds_b.png"><hr>
			<h1 class="display-1">Searching Options</h1>
		</section>

		<section class="search-option row justify-content-center">
			
			<div class="col-12 col-md-8 form-option1">
				<form method="GET" action="" class="form-option1">
					
					<div class="row">
						<div class="col-12 col-md-3">
							<select name="type_search1" class="custom-select type_search1" required="">
								<option value="" selected>Search for a/an...</option>
								<option value="song">Song</option>
								<option value="author">Author</option>
							</select>
						</div>
						<div class="col-12 col-md-8">
							<input type="search" name="search1" class="form-control search1" placeholder="Write your keywords here..." required="">
						</div>
						<div class="col-12 col-md-1">
					    	<button type="submit" class="btn btn-outline-secondary" id="btn-search1" title="Search for it !"><i class="icon-search-7"></i></button>
						</div>
					</div>

				</form>

				<hr>

				<form method="GET" action="" class="form-option2">
					
					<div class="row">
						<div class="col-12 col-md-3">
							Search from a date...
						</div>
						<div class="col-12 col-md-8">
							<input type="hidden" class="type_search2" value="date">
							<input type="date" name="search2" class="form-control search2" required="" max="<?php echo date('Y-m-d'); ?>">
						</div>
						<div class="col-12 col-md-1">
					    	<button type="submit" class="btn btn-outline-secondary" id="btn-search2" title="Search for it !"><i class="icon-search-7"></i></button>
						</div>
					</div>

				</form>

			</div>			

		</section><hr>

		<section class="result-songs"></section>

		<?php include_once 'footer.php'; ?>

	</div>

</body>
</html>