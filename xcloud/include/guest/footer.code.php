<div class="clearfix hidden-xs" style="width:100%; height:50px;"></div>

</div>

<footer id="subfooter" class="clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Другие ресурсы</h4>
                <p><a href="#nid">Фильмы</a>
                <p><a href="#nid">Игры</a>
                <p><a href="#nid">Музыка</a>
                <p><a href="#nid">Софт</a>
            </div>
            <div class="col-md-4">
                <h4>ITland Group</h4>
                <p><span class="fa fa-globe"></span>&nbsp;&nbsp;&nbsp;Узбекистан, г.Ташкент</p>
                <p><span class="fa fa-android"></span>&nbsp;&nbsp;&nbsp;<a href="https://telegram.me/xcloud">Канал в телеграме: Telegram.me/xcloud</a></p>
                <p><span class="fa fa-android"></span>&nbsp;&nbsp;&nbsp;<a href="https://telegram.me/joinchat/ArsM1wEAVOt2Qhr5VOhO_w">Группа в телеграме.</p>
                <p><span class="fa fa-phone"></span>&nbsp;&nbsp;&nbsp;+998 90 951 72 20</p>
                <p><span class="fa fa-envelope"></span>&nbsp;&nbsp;&nbsp;<a href="mailto:info@crew.uz">info@crew.uz</a></p>
            </div>
            <div class="col-md-4">
                <p>
                    Мы в социальных сетях:<br><br>
                    <!--<a class="fa fa-twitter footer-socialicon" target="_blank" href="https://twitter.com/"></a>-->
                    <a class="fa fa-facebook footer-socialicon" target="_blank" href="https://www.facebook.com/"></a>
                    <a class="fa fa-google-plus footer-socialicon" target="_blank" href="https://plus.google.com/"></a>
                    <!--<a class="fa fa-linkedin footer-socialicon" target="_blank" href="https://plus.google.com/"></a>-->
                    <br><br>Сайт находится в сети TAS-IX
                </p>
            </div>
        </div>
    </div>
</footer>

<footer id="footer" class="clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                <p>Crafted by <a href="http://crew.uz" title="ITland GROUP">ITland GROUP</a> with love</p>
            </div>
        </div>
    </div>
</footer>

<script src='asset/js/yepnope.js'></script>
<script>
    yepnope.injectCss('asset/player/video-js.min.css');
    yepnope.injectCss('asset/fonts/font-awesome/css/font-awesome.min.css');
    yepnope.injectCss('https://fonts.googleapis.com/css?family=Karla');


        yepnope.injectJs('asset/owl-carousel/owl.carousel.js',function(){
            $("#owl-demo").owlCarousel({
                items : 1,
                lazyLoad : true,
                paginationSpeed : 1000,
                autoPlay : 3000,
                stopOnHover : true,
                navigation : false
            });
        });
        yepnope.injectJs('asset/js/theme.js');
        yepnope.injectJs('asset/bootstrap/js/bootstrap.min.js');
        yepnope.injectJs('asset/player/video.min.js',function(){yepnope.injectJs('asset/player/videojs.hls.min.js',function(){
            var player = videojs('my-video');});});




</script>
<script src="asset/js/jsibox_basic.js"></script>
</body>
</html>