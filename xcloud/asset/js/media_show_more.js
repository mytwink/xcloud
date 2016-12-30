var last_id = 8, load=false, p = ['.','..','...'];

$('#show-more').click(function() {

    var th = $(this),i=0;

    $.ajax({
        type: 'post',
        url: 'ajax/show_more',
        data: {
            last_id: last_id,
            page_type: th.attr("data-page")
        },
        beforeSend: function(){

            if(!load) load = setInterval(function(){

                th.html("Загрузка" + p[i]);
                i++; i%=3;

            }, 400);

        },

        success: function(data){

            clearInterval(load); load = false;
            th.html("Далее");

            $('#content').append(data);
            refresh();
            //yepnope.injectJs('asset/js/theme.js');

        }

    });

    last_id +=4;

});