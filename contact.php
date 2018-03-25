<?php 
	include_once 'php_codes/class.database.php';
	include_once 'php_codes/class.song.php';
	include_once 'php_codes/class.comment.php';
	include_once 'php_codes/class.message.php';
	include_once 'php_codes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact us - My Daily Song</title>

	<!-- Metadonnées -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Daily Meditation on Hymns & Songs. By Fr Herbert Niba.">
	<meta name="keywords" content="my daily song, daily song, song, mydailysong, MDS, mds, meditation, spiritual, gospel">
	<meta name="author" content="Nucléus Technologies">
	<meta name="expires" content="never">
	<meta name="subject" content="Contact page of My Daily Song">

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
						<h1 class="display-1"> <img src="assets/img/logos/logo.png"> Contact Us</h1>
						<img src="assets/img/mds_b.png" class="hidden-sm-down">
					</div>
				</div>
			</div>
			<div id="carouselHeader" class="carousel slide" data-ride="carousel" data-interval="3000">
				<ol class="carousel-indicators">
					<li data-target="#carouselHeader" data-slide-to="0"></li>
					<li data-target="#carouselHeader" data-slide-to="1"></li>
					<li data-target="#carouselHeader" data-slide-to="2"></li>
					<li data-target="#carouselHeader" data-slide-to="3" class="active"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item">
						<img class="d-block img-fluid" src="assets/img/carousel/img1.jpg" alt="img1.jpg">
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid" src="assets/img/carousel/img2.jpg" alt="img2.jpg">
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid" src="assets/img/carousel/img3.jpg" alt="img3.jpg">
					</div>
					<div class="carousel-item active">
						<img class="d-block img-fluid" src="assets/img/carousel/img4.jpg" alt="img4.jpg">
					</div>
				</div>
			</div>
		</header>

		<section class="contact-online">
			<h1 class="display-1 text-center">Get In Touch</h1>
			<div class="row justify-content-center">
				<div class="col-12 col-md-6 contact-online-social">
					<a href="https://www.facebook.com/My-Daily-Song-633052103521565" target="_blank"> Facebook <i class="icon-facebook"></i></a>
					<a href="#" target="_blank"> Twitter <i class="icon-twitter"></i></a>
					<a href="#" target="_blank"> Google+ <i class="icon-google-plus-circle"></i></a>
					<a href="https://chat.whatsapp.com/L2nlNrq6jtqDRFg3JtUIUI" target="_blank"> Whatsapp <i class="icon-whatsapp"></i></a>
				</div>
				<div class="col-12 col-md-6 contact-online-web">
					<p><i class="icon-location"></i> Down Street, Bamenda, Cameroon</p>
					<p><i class="icon-phone"></i> +237 672 129 023</p>
					<p><a href="http://www.mydailsong.net/" target="_blank"><i class="icon-network"></i> mydailysong.net/</a></p>
				</div>
			</div>
		</section>

		<section class="contact-message">
			<div class="row justify-content-center">
				<div class="col-12 col-md-8">
					<h1 class="display-1 text-center">Leave a Message</h1>
					<form class="contact-form" method="POST" action="">
						<div class="contact-form-group">
							<input type="text" name="name_msg" placeholder="NAME" class="contact-form-input" id="name_msg">
						</div>
						<div class="contact-form-group">
							<input type="email" name="email_msg" placeholder="EMAIL" class="contact-form-input" id="email_msg">
						</div>
						<div class="contact-form-group">
							<textarea name="message_msg" id="message_msg" class="contact-form-input" placeholder="MESSAGE"></textarea>
						</div>
						<div class="contact-form-group-btn">
							<button type="submit" name="sendMessage" id="sendMessage" class="contact-form-btn">SEND</button>
						</div>
						<output id="postResult"></output>
					</form>
				</div>
			</div>
		</section>

		<?php include_once 'footer.php'; ?>

	</div>

</body>
</html>