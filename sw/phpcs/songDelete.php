<?php
    session_start();

    if (isset($_SESSION['login'])) {
            
        include_once '../../phpcs/class.database.php';
        include_once '../../phpcs/class.mdsongwriter.php';
        include_once '../../phpcs/class.upload.php';
        include_once '../../phpcs/class.song.php';
        include_once '../../phpcs/class.comment.php';
        include_once '../../phpcs/class.message.php';
        include_once '../../phpcs/config.php';

        $OneMDSwriter = new MdSongWriter($db, $_SESSION['id'], $_SESSION['login'], '');

        if (isset($_POST['d_id_song'])) {

            echo $DefaultSong->deleteSong($_POST['d_id_song']);

        }
        else {
            echo 'Missing informations.';
        }

    } else {
        header("location:signout.php");
    }

?>
