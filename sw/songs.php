
    <section class="available-songs content-center">

        <h3 class="display-4 mb-4 mt-4">Available Songs</h3>

        <ul class="nav nav-tabs nav-justified mt-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#released" role="tab">
                    Already released
                    <span class="badge badge-pill badge-primary ml-2"><?php echo $OneMDSwriter->nbSong("rl"); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#noreleased" role="tab">
                    Not released
                    <span class="badge badge-pill badge-primary ml-2"><?php echo $OneMDSwriter->nbSong("no_rl"); ?></span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            
            <div class="tab-pane active" id="released" role="tabpanel">
                <div class="list-group mt-4"><?php $OneMDSwriter->writerListSong("rl"); ?></div>
            </div>
            <div class="tab-pane" id="noreleased" role="tabpanel">
                <div class="list-group mt-4"><?php $OneMDSwriter->writerListSong("no_rl"); ?></div>
            </div>

        </div>
        
    </section>
