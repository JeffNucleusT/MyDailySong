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

        if (isset($_POST['u_id_song']) && isset($_POST['n_title']) && isset($_POST['n_author']) && isset($_POST['n_lyrics']) && isset($_POST['n_release_date'])) {

            echo $DefaultSong->updateSong($_POST['u_id_song'], $_POST['n_title'], $_POST['n_author'], $_POST['n_lyrics'], $_POST['n_meditation'], $_POST['n_release_date']);

        }
        else {
            echo 'Missing informations.';
        }

    } else {
        header("location:signout.php");
    }

?>
