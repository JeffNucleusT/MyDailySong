
<?php

include_once '../../php_codes/class.database.php';
include_once '../../php_codes/class.mdsongwriter.php';
include_once '../../php_codes/class.upload.php';
include_once '../../php_codes/class.song.php';
include_once 'config.php';

$OneMDSwriter = new MdSongWriter($db, $_SESSION['id'], $_SESSION['login'], '');

if (isset($_SESSION['login'])) {

    if (isset($_POST['u_id_song']) && isset($_POST['n_title']) && isset($_POST['n_author']) && isset($_POST['n_lyrics']) && isset($_POST['n_release_date'])) {

        echo $DefaultSong->updateSong($_POST['u_id_song'], $_POST['n_title'], $_POST['n_author'], $_POST['n_lyrics'], $_POST['n_meditation'], $_POST['n_release_date']);

    }
    else {
        echo 'Missing informations.';
    }

} else {
    header("location:deconnect.php");
}

?>
