$(function () {

    (function() {
        function popupCenter(url,title,width,height) {
            var windowTop = window.screenTop || window.screenY;
            var windowLeft = window.screenLeft || window.screenX;

            var windowWidth = window.innerWidth || document.documentElement.clientWidth;
            var windowHeight = window.innerHeight || document.documentElement.clientHeight;

            var popUpwidth = width || 800;
            var popUpheight = height || 500;

            var popUpleft = windowTop + windowWidth/2 -popUpwidth/2;
            var popUptop = windowLeft + windowHeight/2 -popUpheight/2;

            window.open(url,title,"scrollbars=yes, width="+popUpwidth+", height="+popUpheight+",top="+popUptop+", left="+popUpleft+"").focus();
            return true;
        };

        $('.share_facebook').on('click', function(e){
            e.preventDefault();
            var url = this.getAttribute('data-url');
            var shareUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url) + "&t=" + $('#share-today-title').val();
            popupCenter(shareUrl, "Partager sur facebook");
        });

        $('.share_twitter').on('click', function(e){
            e.preventDefault();
            var url = this.getAttribute('data-url');
            var shareUrl = "https://twitter.com/intent/tweet?text=" + encodeURIComponent($('#share-today-title').val()) +
                "&via=MyDailySong" +
                "&url=" + encodeURIComponent(url);
            popupCenter(shareUrl, "Partager sur Twitter");
        });

        $('.share_gplus').on('click', function(e){
            e.preventDefault();
            var url = this.getAttribute('data-url');
            var shareUrl = "https://plus.google.com/share?url=" + encodeURIComponent(url);
            popupCenter(shareUrl, "Partager sur Google+");
        });

    })();

});
