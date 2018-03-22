<?php 
	include_once 'php_codes/class.database.php';
	include_once 'php_codes/class.song.php';
	include_once 'php_codes/class.comment.php';
	include_once 'php_codes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>About us - My Daily Song</title>

	<!-- Metadonnées -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Daily Meditation on Hymns & Songs. By Fr Herbert Niba.">
	<meta name="keywords" content="my daily song, daily song, song, mydailysong, MDS, mds, meditation, spiritual, gospel">
	<meta name="author" content="Nucléus Technologies">
	<meta name="expires" content="never">
	<meta name="subject" content="About page of My Daily Song">

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

		<header class="page-header">
			<div class="page-header-nav">
				<p>
					<button type="button" id="showNavBtn" class="toOpen" title="The Menu">
						<i class="icon-music-4"></i>
						<i class="icon-menu-3"></i>
					</button>
				</p>
				<p class="nav-search">
					<a href="search.php" data-toggle="tooltip" data-html="true" data-placement="left" title="Search for <b>a song</b>, <b>an author</b>, ..."><i class="icon-search-7"></i></a>
				</p>
				
				<div class="row">
					<div class="col-12">
						<h1 class="display-1"> <img src="assets/img/logos/logo.png"> About Us</h1>
						<img src="assets/img/mds_b.png" class="hidden-sm-down">
					</div>
				</div>
			</div>
			<div id="carouselHeader" class="carousel slide" data-ride="carousel" data-interval="3000">
				<ol class="carousel-indicators">
					<li data-target="#carouselHeader" data-slide-to="0"></li>
					<li data-target="#carouselHeader" data-slide-to="1"></li>
					<li data-target="#carouselHeader" data-slide-to="2" class="active"></li>
					<li data-target="#carouselHeader" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item">
						<img class="d-block img-fluid" src="assets/img/carousel/img1.jpg" alt="img1.jpg">
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid" src="assets/img/carousel/img2.jpg" alt="img2.jpg">
					</div>
					<div class="carousel-item active">
						<img class="d-block img-fluid" src="assets/img/carousel/img3.jpg" alt="img3.jpg">
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid" src="assets/img/carousel/img4.jpg" alt="img4.jpg">
					</div>
				</div>
			</div>
		</header>

		<section class="who-we-are">
			<div class="row justify-content-center">
				<div class="col-12 col-md-8">
					<h1 class="display-1 text-center">Who we are <i class="icon-help-3"></i></h1>
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium unde omnis 
						iste natus error sit doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo 
						inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim 
						ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit nesciunt unde omnis iste 
						natus error sit voluptatem.
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem unde omnis 
						iste natus error sit accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab 
						illo inventore veritatis et quasi architecto beatae vitae dicta sunt.
					</p>
				</div>
			</div>
		</section>

		<section class="our-mission">
			<div class="row justify-content-center">
				<div class="col-12 col-md-8">
					<h1 class="display-1 text-center">Our mission</h1>
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium unde omnis 
						iste natus error sit doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo 
						inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim 
						ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit nesciunt unde omnis iste 
						natus error sit voluptatem.
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem unde omnis 
						iste natus error sit accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab 
						illo inventore veritatis et quasi architecto beatae vitae dicta sunt.
					</p>
				</div>
			</div>
		</section>

		<section class="personal-intervention">
			<div class="row justify-content-center">
				<div class="col-12 col-md-8">
					<h1 class="display-1 text-center">Our actions</h1>
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium unde omnis 
						iste natus error sit doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo 
						inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim 
						ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit nesciunt unde omnis iste 
						natus error sit voluptatem.
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem unde omnis 
						iste natus error sit accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab 
						illo inventore veritatis et quasi architecto beatae vitae dicta sunt.
					</p>
				</div>
			</div>
		</section>

		<?php include_once 'footer.php'; ?>

	</div>

</body>
</html>