
<?php             
    if(($page == 'signin.php') || ($page == 'signinExec.php')) {
        $title = 'Sign in - MDSongWriter';
        $subject = 'Page of Signing in for MDSongWriter';
    }
    elseif($page == 'home.php') {
        $title = 'MDSongWriter Home - MDSongWriter';
        $subject = 'Home page of MDSongWriter';
    }
    elseif($page == 'songs.php') {
        $title = 'Songs Management - MDSongWriter';
        $subject = 'Page of Songs Management for MDSongWriter';
    }
    elseif($page == 'new_song.php') {
        $title = 'Add a new song - MDSongWriter';
        $subject = 'Page of New song for MDSongWriter';
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?php echo $title; ?></title>

	<!-- Metadonnées -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="author" content="Nucléus Technologies">
	<meta name="expires" content="never">
	<meta name="subject" content="<?php echo $subject; ?>">

	<!-- Feuilles de styles -->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/fontello/fontello.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/fontello/fontello-ie7.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/fontello/animation.css">
	<link rel="stylesheet" type="text/css" href="css/sw_global.css">

	<!-- Icône -->
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/logos/favicon.png">

	<!-- Scripts js -->
	<script src="../assets/js/jquery-3.2.1.js"></script>
	<script src="../assets/js/tether.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="js/sw_global.js"></script>
</head>
<body>

	<div class="container">

        <?php
            if (($page != 'signin.php') && ($page != 'signinExec.php') && ($page != 'home.php')) {
        ?>
        
        <nav class="navbar navbar-toggleable-md navbar-light">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="./?page=home.php">#MDSongWriter</a>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link <?php if ($page == 'songs.php' || $page == 'update_song.php') echo 'active'; ?>" href="./?page=songs.php">Available songs <?php if ($page == 'songs.php' || $page == 'update_song.php') echo '<span class="sr-only">(current)</span>'; ?></a>
					<a class="nav-item nav-link <?php if ($page == 'new_song.php') echo 'active'; ?>" href="./?page=new_song.php">New song <?php if ($page == 'new_song.php') echo '<span class="sr-only">(current)</span>'; ?></a>
					<a class="nav-item nav-link" href="phpcs/signout.php">Sign out</a>
				</div>
			</div>
		</nav>
        
        <?php
            }
        ?>