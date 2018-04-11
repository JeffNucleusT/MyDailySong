
<?php 

    include_once 'phpcs/class.database.php';
    include_once 'phpcs/class.song.php';
    include_once 'phpcs/class.comment.php';
    include_once 'phpcs/class.message.php';
    include_once 'phpcs/config.php';

    $page[0] = "home";

    if (isset($_REQUEST['page'])) {

        $page = (isset($_REQUEST['rl_dt'])) ? array($_REQUEST['page'], $_REQUEST['rl_dt']) : array($_REQUEST['page']);

        if(file_exists($page[0] . '.php')){
                
            include_once "header.php";
            include_once $page[0] . '.php';
            include_once "footer.php";

        } else {
            include_once '404.php';
        }

    } else {
        include_once "header.php";
        include_once $page[0] . '.php';
        include_once "footer.php";
    }
?>