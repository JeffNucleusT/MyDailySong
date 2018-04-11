
    <section class="available-songs content-center">

        <h3 class="display-4 mb-4 mt-4">Add a new song</h3>

        <form class="new-song-form mt-4" method="POST" ENCTYPE="multipart/form-data" action="phpcs/songCreate.php">
            
            <div class="form-group row">
                <label for="name_song" class="col-sm-2 col-form-label">Song File</label>
                <div class="col-sm-10">
                    <input type="file" name="name_song" class="form-control" id="name_song" required>
                    <small class="form-text text-muted">Choose an audio file : mp3, wav</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title" required>
                    <small class="form-text text-muted">This title references the song and will appear on the site.</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="author" class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-10">
                    <input type="text" name="author" class="form-control" id="author" required>
                    <small class="form-text text-muted">Give the author' name of this song.</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="lyrics" class="col-sm-2 col-form-label">Lyrics</label>
                <div class="col-sm-10">
                    <small class="form-text text-muted mb-1">
                        - Use the break-line to separated verses and chorus. <br>
                        - Define the verses numbering yourself (1- 2- 3- or 1. 2. 3. or else). <br>
                    </small>
                    <textarea name="lyrics" class="form-control" id="lyrics" required></textarea>
                </div>
            </div>

            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="existMeditation">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">I want to include meditations to this song !</span>
            </label>

            <div class="form-group row div-meditation">
                <label for="meditation" class="col-sm-2 col-form-label">Meditations</label>
                <div class="col-sm-10">
                    <small class="form-text text-muted mb-1">
                        - Use the break-line to separated verses and chorus. <br>
                        - Define the verses numbering yourself (1- 2- 3- or 1. 2. 3. or else). <br>
                    </small>
                    <textarea name="meditation" class="form-control" id="meditation"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="release_date" class="col-sm-2 col-form-label">Release date</label>
                <div class="col-sm-10">
                    <input type="date" name="release_date" class="form-control" id="release_date" required>
                    <small class="form-text text-muted">Choose the release date of this song.</small>
                </div>
            </div>
            
            <div class="div-submit-button mb-4">
                <button type="submit" class="submit-button" id="save-song-btn"><i class="icon-hdd-2"></i> Save this song informations </button>
            </div>

        </form>

    </section>
