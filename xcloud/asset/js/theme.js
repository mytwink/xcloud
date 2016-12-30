function open($a){
    var opened = $($a).attr("data-open")=="true";
    if(opened){
        $a.parent().height("");
        $a.children(".pull-right").children(".fa-arrow-up").addClass("rotate");
        $a.attr("data-open","");
    }else{
        $a.parent().height($($a).parent().children(".cur").height()+40);
        $a.children(".pull-right").children(".fa-arrow-up").removeClass("rotate");
        $a.attr("data-open","true");
    }
}
function refresh(){
    $('.img-wrapper').each(function(){
        $(this).height($(this).children('.img-responsive').height());
    });

    $('.img-wrapper').hover(function(){
        $(this).children('.img-info').css("bottom", $(this).children('.img-info').height()+20);
    },function(){
        $(this).children('.img-info').css("bottom", "0");
    });
}
jQuery(function($) {
    var scrolling = false;

    function setActive(li) {
        $(li).addClass('active').siblings().removeClass('active');
    }

    $('a[href^="#"]').click(function(){
            var el = $(this).attr('href');
            $('body').animate({
                scrollTop: $(el).offset().top - 100}, 500);
            return false; 
    });

    $('.seria').click(function(){
            var el = '#player';
            $("#my-video video source").attr("src",$(this).attr("data-src"));
            $("#my-video video").attr("src",$(this).attr("data-src"));
            player = videojs('my-video');
            $('body').animate({
                scrollTop: $(el).offset().top - 100}, 500);
    });

    $("#resize").parent().height($("#resize").parent().children(".cur").height()+40);
    $("#resize").attr("data-open","true");

    $('.unover').click(function(){
        open($(this));
    });

    $('#player').height($(window).height()-100);

    var timer = setInterval(function() {
        refresh();
    }, 100);
});