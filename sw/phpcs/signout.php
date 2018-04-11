<?php
    session_start();

	include_once '../../phpcs/class.database.php';
    include_once '../../phpcs/class.mdsongwriter.php';
    include_once '../../phpcs/class.upload.php';
    include_once '../../phpcs/class.song.php';
    include_once '../../phpcs/class.comment.php';
    include_once '../../phpcs/class.message.php';
    include_once '../../phpcs/config.php';

    $DefaultMDSwriter = new MdSongWriter($db, '', '', '');

	$DefaultMDSwriter->deconnexion();

?>
