
<?php

include_once '../../php_codes/class.database.php';
include_once '../../php_codes/class.mdsongwriter.php';
include_once '../../php_codes/class.upload.php';
include_once '../../php_codes/class.song.php';
include_once 'config.php';

$OneMDSwriter = new MdSongWriter($db, $_SESSION['id'], $_SESSION['login'], '');

if (isset($_SESSION['login'])) {

    if (isset($_POST['d_id_song'])) {

        echo $DefaultSong->deleteSong($_POST['d_id_song']);

    }
    else {
        echo 'Missing informations.';
    }

} else {
    header("location:deconnect.php");
}

?>
