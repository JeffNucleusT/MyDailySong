<?php 
	include_once 'class.database.php';
	include_once 'class.song.php';
	include_once 'class.comment.php';
	include_once 'config.php';
?>

<div class="row justify-content-center">
	 
	<?php 
		if (isset($_GET['type_search']) && $_GET['type_search'] != null && isset($_GET['search']) && $_GET['search'] != null) {

			$DefaultSong->searchSong($_GET['type_search'], $_GET['search']);
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