
    <section class="spiritual-meditation">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <h1 class="display-1 text-center">Spiritual Meditations</h1>
                <div class="sm-content">
                    <p class="sm-p-cover hidden-sm-down"><img src="assets/img/sm.jpg" class="sm-cover"></p>
                    <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        The soul can do without everything except the word of God, without which none at all of its wants are provided for. We do daily mediations over the gospel each day with some well-chosen gospel music. We do believe that where words fail, music speaks. In the same light, we journey with God’s people in their spiritual lives with daily songs and meditations.
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
                    Music has healing power; it has the ability to take people out of themselves for a few hours. With My Daily Song get some special moments of worship, enabling you to be thankful for God’s boundless love shun on his people on earth. Join God’s people to worship and Praise God.
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
                    After silence, that which comes nearest to expressing the inexpressible is music. Each child of God has something unique to share with God, thus our platform could provide such an interface for you to drop a prayer request, react on a meditation, share your personal experience on how God’s word has impacted your life and you could request for a song to be used for our future meditations.
                </p>
            </div>
        </div>
    </section>
    
    <div class="autoplay text-white row justify-content-center">
        <div class="col-12 col-md-9 d-flex pt-2 text-center">

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
            <h5 class="w-50 ml-2"><small>Daily song : </small> <?php echo $TodaySong->_title; ?></h5>
            <audio controls="controls" class="w-50" autoplay>
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
