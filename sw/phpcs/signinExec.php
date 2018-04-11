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
            
    $page = 'signinExec.php';
    include_once '../header.php';
?>

    <section class="login-section content-center">
        
        <h3 class="display-4">Sign in #MDSongWriter</h3>
        
        <?php
            if (isset($_POST['login']) && isset($_POST['password'])) {

                $DefaultMDSwriter->connexion($_POST['login'], $_POST['password']);

            } else {
                header("location:../");
            }

        ?>

    </section>

<?php 
    include_once '../footer.php';
?>