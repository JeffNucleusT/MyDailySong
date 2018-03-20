<?php include 'php_codes/config.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Search for a song or an author - My Daily Song</title>

	<!-- Metadonnées -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Daily Meditation on Hymns & Songs. By Fr Herbert Niba.">
	<meta name="keywords" content="my daily song, daily song, song, mydailysong, MDS, mds, meditation, spiritual, gospel">
	<meta name="author" content="Nucléus Technologies">
	<meta name="expires" content="never">
	<meta name="subject" content="Song or author searching page of My Daily Song">

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
	<script src="assets/js/global.js"></script>
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

			<p class="nav-search">
				<a href="search.php" data-toggle="tooltip" data-html="true" data-placement="left" title="Search for <b>a song</b>, <b>an author</b>, ..."><i class="icon-search-7"></i></a>
			</p>
		</header>

		<section class="result-songs">
			<img src="assets/img/mds_b.png"><hr>
			<h1 class="display-1">Search results about songs or authors</h1>
			<h3>- <?php echo $_GET['search']; ?> -</h3><hr>
			<div class="row justify-content-center">
				 
				<?php 
					if (isset($_GET['search']) && $_GET['search'] != null) {

						$search = strip_tags($_GET['search']);

						$query = $db->prepare('SELECT * FROM songs WHERE release_date <= ? AND (title LIKE ? OR author LIKE ?) ORDER BY release_date DESC');
						$query->bindValue(1, date('d/m/Y'));
						$query->bindValue(2, "%".$search."%");
						$query->bindValue(3, "%".$search."%");
						$query->execute();

						$nb = $query->rowCount();

						if ($nb != 0) {

							echo "<div class='col-12'>About <b>".$nb."</b> results.</div>";
						
							while ($row = $query->fetch()) {
				?>

				<div class="col-12 col-sm-10 col-md-8">
					<article class="card">
						<div class="card-block">
							<h4 class="card-title"><strong><?php echo $row['title']; ?></strong></h4>
							<h6 class="card-subtitle mb-2 text-muted"><i>by <?php echo $row['author']; ?></i></h6>
							<p class="card-text"><?php echo substr(strip_tags($row['lyrics']), 0, 200).'...'; ?></p>
							<small>Release on the <?php echo $row['release_date']; ?></small> | 
							<a href="showSearchSong.php?release_date=<?php echo $row['release_date']; ?>" class="card-link">Go to this song <i class="icon-right-open-big"></i></a>
						</div>
					</article>
				</div>

				<?php
							}
						} 
						else {
				?>

				<div class="col-12 col-sm-10 col-md-8">
					<div class="alert alert-info" role="alert">
						<strong>Heads up!</strong> No results for your search <u><?php echo $_GET['search']; ?></u> in the past days!
					</div>
				</div>

				<?php 		
						}
					} 
					else {
				?>

				<div class="col-12 col-sm-10 col-md-8">
					<div class="alert alert-info" role="alert">
						<strong>Heads up!</strong> None information has been sent for the searching.
					</div>
				</div>

				<?php 		
					} 
				?>

			</div>
		</section>

		<?php include 'footer.php'; ?>

	</div>

</body>
</html>