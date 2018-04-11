
    <section class="title-search">
        <img src="assets/img/mds_b.png"><hr>
        <h1 class="display-1">Searching Options</h1>
    </section>

    <section class="search-option row justify-content-center">
        
        <div class="col-12 col-md-8 form-option1">
            <form method="GET" action="" class="form-option1">
                
                <div class="row">
                    <div class="col-12 col-md-3">
                        <select name="type_search1" class="custom-select type_search1" required="">
                            <option value="" selected>Search for a/an...</option>
                            <option value="song">Song</option>
                            <option value="author">Author</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-8">
                        <input type="search" name="search1" class="form-control search1" placeholder="Write your keywords here..." required="">
                    </div>
                    <div class="col-12 col-md-1">
                        <button type="submit" class="btn btn-outline-secondary" id="btn-search1" title="Search for it !"><i class="icon-search-7"></i></button>
                    </div>
                </div>

            </form>

            <hr>

            <form method="GET" action="" class="form-option2">
                
                <div class="row">
                    <div class="col-12 col-md-3">
                        Search from a date...
                    </div>
                    <div class="col-12 col-md-8">
                        <input type="hidden" class="type_search2" value="date">
                        <input type="date" name="search2" class="form-control search2" required="" max="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="col-12 col-md-1">
                        <button type="submit" class="btn btn-outline-secondary" id="btn-search2" title="Search for it !"><i class="icon-search-7"></i></button>
                    </div>
                </div>

            </form>

        </div>			

    </section><hr>

    <section class="result-songs"></section>
