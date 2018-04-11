
<?php             
    if($page[0] == 'home') {
        $title = 'Welcome to My Daily Song';
        $subject = 'Home page of My Daily Song';
        $c_title = $title;
    } 
    elseif($page[0] == 'dailysong') {
        $title = (isset($page[1])) ? "The " . $DefaultSong->formatDate($page[1]) . "'s song" : "This " . date('l') . "'s song";
        $title .= ' - My Daily Song';
        $subject = 'The daily song page of My Daily Song';
        $c_title = 'My Daily Song';
    }
    elseif($page[0] == 'about') {
        $title = 'About us - My Daily Song';
        $subject = 'About page of My Daily Song';
        $c_title = 'About Us';
    }
    elseif($page[0] == 'contact') {
        $title = 'Contact us - My Daily Song';
        $subject = 'Contact page of My Daily Song';
        $c_title = 'Contact Us';
    }
    elseif($page[0] == 'search') {
        $title = 'Searching Options - My Daily Song';
        $subject = 'Searching Options page of My Daily Song';
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?php echo $title; ?></title>

	<!-- Google Analytics -->

	<?php include_once 'google_analytics.php'; ?>

	<!-- Metadonnées -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Daily Meditation on Hymns & Songs. By Fr Herbert Niba.">
	<meta name="keywords" content="my daily song, daily song, song, mydailysong, MDS, mds, meditation, spiritual, gospel">
	<meta name="author" content="Nucléus Technologies">
	<meta name="expires" content="never">
	<meta name="subject" content="<?php echo $subject; ?>">

	<!-- Feuilles de styles -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="assets/css/fontello/fontello.css">
	<link rel="stylesheet" type="text/css" href="assets/css/fontello/fontello-ie7.css">
	<link rel="stylesheet" type="text/css" href="assets/css/fontello/animation.css">
	<link rel="stylesheet" type="text/css" href="assets/css/app.css">
	<link rel="stylesheet" type="text/css" href="assets/css/app-responsive.css">

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
	<script src="assets/js/app.js"></script>
	<script src="assets/js/songs.js"></script>
	<script src="assets/js/comment.js"></script>
	<script src="assets/js/social.js"></script>
</head>
<body>

	<div class="container-fluid">

		<nav class="navbar" role="navigation">
			<a href="./"><i class="icon-music-4"></i> Home <i class="icon-music-4"></i></a>
			<a href="./?page=dailysong"><i class="icon-music-1"></i> My Daily Song <i class="icon-music-1"></i></a>
			<a href="./?page=about"><i class="icon-music-outline"></i> About <i class="icon-music-outline"></i></a>
			<a href="./?page=contact"><i class="icon-music-3"></i> Contact <i class="icon-music-3"></i></a>
		</nav>

        <?php             
            if($page[0] == 'search') {
        ?>

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
       
        <?php
            } else {
        ?>

        <header class="page-header">
			<div class="page-header-nav">
				<p>
					<button type="button" id="showNavBtn" class="toOpen" title="The Menu">
						<i class="icon-music-4"></i>
						<i class="icon-menu-3"></i>
					</button>
				</p>
				<p class="nav-search">
					<a href="./?page=search" data-toggle="tooltip" data-html="true" data-placement="left" title="Search for <b>a song</b>, <b>an author</b>, ..."><i class="icon-search-7"></i></a>
				</p>
				
				<div class="row">
					<div class="col-12">
						<h1 class="display-1"> <img src="assets/img/logos/logo.png"> <?php echo $c_title; ?> </h1>
						<img src="assets/img/mds_b.png" class="hidden-md-down">
					</div>
				</div>
			</div>
			<div id="carouselHeader" class="carousel slide" data-ride="carousel" data-interval="3000">
				<ol class="carousel-indicators">
					<li data-target="#carouselHeader" data-slide-to="0" <?php if($page[0] == 'home') echo 'class="active"'; ?>></li>
					<li data-target="#carouselHeader" data-slide-to="1" <?php if($page[0] == 'dailysong') echo 'class="active"'; ?>></li>
					<li data-target="#carouselHeader" data-slide-to="2" <?php if($page[0] == 'about') echo 'class="active"'; ?>></li>
					<li data-target="#carouselHeader" data-slide-to="3" <?php if($page[0] == 'contact') echo 'class="active"'; ?>></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item <?php if($page[0] == 'home') echo 'active'; ?>">
						<img class="d-block img-fluid" src="assets/img/carousel/img1.jpg" alt="img1.jpg">
					</div>
					<div class="carousel-item <?php if($page[0] == 'dailysong') echo 'active'; ?>">
						<img class="d-block img-fluid" src="assets/img/carousel/img2.jpg" alt="img2.jpg">
					</div>
					<div class="carousel-item <?php if($page[0] == 'about') echo 'active'; ?>">
						<img class="d-block img-fluid" src="assets/img/carousel/img3.jpg" alt="img3.jpg">
					</div>
					<div class="carousel-item <?php if($page[0] == 'contact') echo 'active'; ?>">
						<img class="d-block img-fluid" src="assets/img/carousel/img4.jpg" alt="img4.jpg">
					</div>
				</div>
			</div>
		</header>

        <?php
            }
        ?>
        