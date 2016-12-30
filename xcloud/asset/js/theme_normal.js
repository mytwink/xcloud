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

    $('.unover').click(function(){
        var opened = $(this).attr("data-open")=="true";
        if(opened){
            $(this).parent().height("");
            $(this).attr("data-open","");
        }else{
            $(this).parent().height($(this).parent().children(".cur").height()+40);
            $(this).attr("data-open","true");
        }
    });

    $('#player').height($(window).height()-100);
});