
    <section class="spiritual-meditation">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <h1 class="display-1 text-center">Spiritual Meditations</h1>
                <div class="sm-content">
                    <p class="sm-p-cover hidden-sm-down"><img src="assets/img/sm.jpg" class="sm-cover"></p>
                    <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium unde omnis 
                        iste natus error sit doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo 
                        inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim 
                        ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit nesciunt unde omnis iste 
                        natus error sit voluptatem.
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem unde omnis 
                        iste natus error sit accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab 
                        illo inventore veritatis et quasi architecto beatae vitae dicta sunt.
                    </p>
                </div>	
            </div>
        </div>
    </section>

    <section class="worship-moment">
        <div class="row justify-content-end">
            <div class="col-12 col-md-8">
                <h1 class="display-1 text-center">Worship Moments</h1>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium unde omnis 
                    iste natus error sit doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo 
                    inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim 
                    ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit nesciunt unde omnis iste 
                    natus error sit voluptatem.
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem unde omnis 
                    iste natus error sit accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab 
                    illo inventore veritatis et quasi architecto beatae vitae dicta sunt.
                </p>
            </div>
        </div>
    </section>

    <section class="personal-intervention">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 hidden-sm-down">
                <img src="assets/img/pi.png" class="pi-cover">
            </div>
            <div class="col-12 col-md-8">
                <h1 class="display-1 text-center">Personal Interventions</h1>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium unde omnis 
                    iste natus error sit doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo 
                    inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim 
                    ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit nesciunt unde omnis iste 
                    natus error sit voluptatem.
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem unde omnis 
                    iste natus error sit accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab 
                    illo inventore veritatis et quasi architecto beatae vitae dicta sunt.
                </p>
            </div>
        </div>
    </section>
    
    <div class="autoplay text-white row justify-content-center">
        <div class="col-12 col-md-5 pt-2 text-center">

            <?php 
                $actual_date = (isset($_GET["rl_dt"])) ? $_GET["rl_dt"] : date("Y-m-d", time());
            
                $stmt1 = $DefaultSong->readSong("release_date", $actual_date);

                $nb1 = $stmt1->rowCount();

                if ($nb1 > 0) {
                                
                    while ($field1 = $stmt1->fetch(PDO::FETCH_ASSOC)) { 
                        extract($field1);
                        $TodaySong = new Song($db, $field1['id_song'], $field1['name_song'], $field1['title'], $field1['author'], $field1['lyrics'], $field1['meditation'], $field1['release_date'], $field1['likes'], $field1['dislikes'], $field1['share_facebook'], $field1['share_twitter'], $field1['share_google'], $field1['updates']);
                        $id_song = $TodaySong->getId_song();
                        $release_date = $TodaySong->getRelease_date();
            ?>
            <h5 class="ml-2"><small>Daily song : </small> <?php echo $TodaySong->_title; ?></h5>
            <audio controls="controls" class="w-100" autoplay>
                Votre navigateur ne supporte pas l'élément <code>audio</code>. Veuillez le mettre à jour.
                <source src="media/<?php echo $TodaySong->_name_song; ?>" type="audio/mp3">
            </audio>

            <?php
                    }
                }
                else {
                    echo '<p class="w-100 text-center">No song for today !</p>';
                }
            ?>

        </div>
    </div>
