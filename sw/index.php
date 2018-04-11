
<?php 

    include_once '../phpcs/class.database.php';
    include_once '../phpcs/class.mdsongwriter.php';
    include_once '../phpcs/class.upload.php';
    include_once '../phpcs/class.song.php';
    include_once '../phpcs/class.comment.php';
    include_once '../phpcs/class.message.php';
    include_once '../phpcs/config.php';

    $page = "signin.php";

    if (isset($_REQUEST['page'])) {

        $page = $_REQUEST['page'];

        if(file_exists($page)){

            session_start();
            $OneMDSwriter = new MdSongWriter($db, $_SESSION['id'], $_SESSION['login'], '');
            
            if (isset($_SESSION['login'])) {
                include_once "header.php";
                include_once $page;
                include_once "footer.php";
            } else {
                header("location:phpcs/signout.php");
            }

        } else {
            include_once '404.php';
        }

    } else {
        include_once "header.php";
        include_once $page;
        include_once "footer.php";
    }
    
?>