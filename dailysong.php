
    <?php 
        $actual_date = (isset($page[1])) ? $page[1] : date("Y-m-d", time());
        
        $stmt1 = $DefaultSong->readSong("release_date", $actual_date);

        $nb1 = $stmt1->rowCount();

        if ($nb1 > 0) {
                        
            while ($field1 = $stmt1->fetch(PDO::FETCH_ASSOC)) { 
                extract($field1);
                $TodaySong = new Song($db, $field1['id_song'], $field1['name_song'], $field1['title'], $field1['author'], $field1['lyrics'], $field1['meditation'], $field1['release_date'], $field1['likes'], $field1['dislikes'], $field1['share_facebook'], $field1['share_twitter'], $field1['share_google'], $field1['updates']);
                $id_song = $TodaySong->getId_song();
                $release_date = $TodaySong->getRelease_date();
    ?>

    <input type="hidden" id="id_song" value="<?php echo $id_song; ?>">

    <section class="today-media">
        <div class="row justify-content-center">
            <article class="col-12 col-md-6 today-song">
                <p class="today-song-title"><?php echo $TodaySong->_title; ?> <small class="today-song-author">by <?php echo $TodaySong->_author; ?></small></p>
                <input type="hidden" id="share-today-title" value="<?php echo $TodaySong->_title . ' by ' . $TodaySong->_author . ' with Lyrics and Meditation.'; ?>">
                <audio controls="controls" class="w-100">
                    Votre navigateur ne supporte pas l'élément <code>audio</code>. Veuillez le mettre à jour.
                    <source src="media/<?php echo $TodaySong->_name_song; ?>" type="audio/mp3">
                </audio>
                <div class="today-song-like">
                    You like it ?
                    <div class="btn-group ml-2" role="group" aria-label="Like or dislike buttons">
                        <button data-toggle="tooltip" data-placement="top" type="button" class="btn btn-success" id="likeBtn" <?php if (isset($_COOKIE['vote' . $id_song]) && $_COOKIE['vote' . $id_song] == 'like') { echo "disabled style='transform : scale(1.2); z-index : 6666;' title='Already choose !' "; } else { echo " title='I like !' ";} ?>><i class="icon-thumbs-up-1"></i> <span class="voteCount"><?php echo $TodaySong->_likes; ?></span></button>
                        <button data-toggle="tooltip" data-placement="top" type="button" class="btn btn-danger" id="dislikeBtn" <?php if (isset($_COOKIE['vote' . $id_song]) && $_COOKIE['vote' . $id_song] == 'dislike') { echo "disabled style='transform : scale(1.2); z-index : 6666;' title='Already choose !' "; } else { echo ' title="I don\'t like !" ';} ?>><i class="icon-thumbs-down-1"></i> <span class="voteCount"><?php echo $TodaySong->_dislikes; ?></span></button>
                    </div>
                </div>
                <div class="today-song-options">
                    <!-- interface ordinateur -->
                    <div class="btn-group hidden-sm-down" role="group" aria-label="Button group with nested dropdown">
                        <a href="#today-leave-comment" class="btn btn-secondary"><i class="icon-comment"></i> Comment</a>
                        <a href="media/<?php echo $TodaySong->_name_song; ?>" download="<?php echo $TodaySong->_title . ' by ' . $TodaySong->_author; ?>" class="btn btn-secondary"><i class="icon-download"></i> Download</a>

                        <div class="btn-group" role="group">
                            <a href="#" id="socialShare" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-share"></i> Share
                            </a>
                            <div class="dropdown-menu" aria-labelledby="socialShare">
                                <a href="#" id="share_facebook" data-url="http://www.mydailysong.net/?page=dailysong.php" class="dropdown-item share_facebook" data-toggle="tooltip" data-placement="right" title="Share on Facebook"><i class="icon-facebook"></i> Facebook</a>

                                <a href="#" id="share_twitter" data-url="http://www.mydailysong.net/?page=dailysong.php" class="dropdown-item share_twitter" data-toggle="tooltip" data-placement="right" title="Share on Twitter"><i class="icon-twitter"></i> Twitter</a>

                                <a href="#" id="share_google" data-url="http://www.mydailysong.net/?page=dailysong.php" class="dropdown-item share_gplus" data-toggle="tooltip" data-placement="right" title="Share on Google+"><i class="icon-google-plus-circle"></i> Google+</a>
                            </div>
                        </div>
                    </div>
                    <!-- interface mobile -->
                    <div class="btn-group-vertical hidden-md-up" role="group" aria-label="Button group with nested dropdown">
                        <a href="#today-leave-comment" class="btn btn-secondary"><i class="icon-comment"></i> Comment</a>
                        <a href="media/<?php echo $TodaySong->_name_song; ?>" download="<?php echo $TodaySong->_title . ' by ' . $TodaySong->_author; ?>" class="btn btn-secondary"><i class="icon-download"></i> Download</a>

                        <div class="btn-group" role="group">
                            <a href="#" id="socialShare" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-share"></i> Share
                            </a>
                            <div class="dropdown-menu" aria-labelledby="socialShare">
                                <a href="#" id="share_facebook" data-url="http://www.mydailysong.net/?page=dailysong.php" class="dropdown-item share_facebook" data-toggle="tooltip" data-placement="right" title="Share on Facebook"><i class="icon-facebook"></i> Facebook</a>

                                <a href="#" id="share_twitter" data-url="http://www.mydailysong.net/?page=dailysong.php" class="dropdown-item share_twitter" data-toggle="tooltip" data-placement="right" title="Share on Twitter"><i class="icon-twitter"></i> Twitter</a>

                                <a href="#" id="share_google" data-url="http://www.mydailysong.net/?page=dailysong.php" class="dropdown-item share_gplus" data-toggle="tooltip" data-placement="right" title="Share on Google+"><i class="icon-google-plus-circle"></i> Google+</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="today-song-date">
                    <?php
                        if (isset($page[1])) {
                            echo "
                                That day | <time datetime=" . $release_date . " pubdate=" . $release_date . ">". $DefaultSong->formatDate($release_date) . "</time>
                            ";
                        } else {
                            echo "
                                Today | <time datetime=" . $release_date . " pubdate=" . $release_date . ">". date('l\, d') . "<sup>" . date('S') . "</sup>" . date(' F Y') . "</time>
                            ";
                        }
                        
                    ?>
                </div>
            </article>
            <article class="col-12 col-md-6 today-lyric-medit">

                <ul class="nav nav-pills nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#lyrics" role="tab">LYRICS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#meditations" role="tab">MEDITATIONS</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="lyrics" role="tabpanel">
                        <?php echo $TodaySong->_lyrics; ?>
                    </div>
                    <div class="tab-pane" id="meditations" role="tabpanel">
                        <?php echo $TodaySong->_meditation; ?>
                    </div>
                </div>

            </article>
        </div>
    </section>

    <section class="today-comments">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class="display-1 text-center">Comments About Today</h1>
                
                <?php 		
                    $stmt2 = $DefaultComment->readComment($id_song);

                    $nb2 = $stmt2->rowCount();

                    if ($nb2 > 0) {
                                    
                        while ($field2 = $stmt2->fetch(PDO::FETCH_ASSOC)) { 
                            extract($field2);
                            $TodayComment = new Comment($db, $field2['id_comment'], $field2['name_c'], $field2['email_c'], $field2['comment_c'], $field2['timestamp_c'], $field2['response_c'], $id_song);
                            $id_comment = $TodayComment->getIdcomment();
                ?>
                <div class="media">
                    <img class="d-flex align-self-start mr-3" src="assets/img/profil.png" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-0">
                            <?php echo $TodayComment->_name_c; ?> 
                            <small>
                                <time datetime="<?php echo date('Y-m-d', $TodayComment->_timestamp_c); ?>" pubdate="<?php echo date('Y-m-d', $TodayComment->_timestamp_c); ?>"><?php echo date('d', $TodayComment->_timestamp_c).'<sup>'.date('S', $TodayComment->_timestamp_c).'</sup>'.date(' M. Y', $TodayComment->_timestamp_c); ?></time>
                                at 
                                <time datetime="<?php echo date('H:i', $TodayComment->_timestamp_c); ?>" pubdate="<?php echo date('H:i', $TodayComment->_timestamp_c); ?>"><?php echo date('H\hi\m\i\n', $TodayComment->_timestamp_c); ?></time>
                            </small>
                        </h5>
                        <p class="media-content"><?php echo $TodayComment->_comment_c; ?></p>
                    </div>
                    <footer>
                        <button class="btn btn-success btn-sm">Reply</button>
                    </footer>
                </div><hr>

                <?php
                        }
                    }
                    else {echo "NO COMMENT !";}
                ?>

            </div>
            <div class="col-12 col-md-8" id="today-leave-comment">
                <h1 class="display-1 text-center">Leave a Coment</h1>
                <form class="comment-form" method="POST" action="phpcs/commentCreate.php" id="mainForm">
                    <input type="hidden" value="None" id="responce_c">
                    <div class="comment-form-group">
                        <input type="text" name="name_c" placeholder="NAME" class="comment-form-input" id="name_c">
                    </div>
                    <div class="comment-form-group">
                        <input type="email" name="email_c" placeholder="EMAIL" class="comment-form-input" id="email_c">
                    </div>
                    <div class="comment-form-group">
                        <textarea name="comment_c" id="comment_c" class="comment-form-input" placeholder="COMMENT"></textarea>
                    </div>
                    <div class="comment-form-group-btn">
                        <button type="submit" name="sendComment" id="sendComment" class="comment-form-btn">SEND</button>
                    </div>
                    <output class="mt-4 w-100" id="postResult"></output>
                </form>

            </div>
        </div>
    </section>

    <?php
            }
        } 
        else {
    ?>

    <section class="today-media">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 alert-noavailable">
                <div class="alert alert-info" role="alert">
                    <strong>Heads up!</strong><br><br> There's no avalaible song today. <br> Please come back tomorrow!
                </div>
            </div>
        </div>
    </section>

    <?php
        }
    ?>