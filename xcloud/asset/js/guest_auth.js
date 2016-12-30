$('#signinlogin').keyup(
    function(e){
        if(e.which == 13) $('#signin').trigger('click');
    }
);

$('#signinpass').keyup(
    function(e){
        if(e.which == 13) $('#signin').trigger('click');
    }
);

$('#signin').click(function(){

    var th = $(this), load, i= 0, p = new Array(".","..","...");
    var login = $('#signinlogin').val(), password = $('#signinpass').val(), link = th.attr("data-src");

    $.ajax({
        type:'post',
        url:'ajax/auth_exec',
        data:{
            auth: "signin",
            login: login,
            password: password
        },
        beforeSend: function(){

            load = setInterval(function(){

                th.html("Авторизация" + p[i]);
                i++; i%=3;

            }, 400);

        },
        success:function(data){
            clearInterval(load);

            if(data == "welcome") {


                th.html("Добро пожаловать!");
                setTimeout(function(){
                    location.replace("http://" +link);
                },500);

            } else {
                th.html("Упс! Попробуйте заново!");
            }
        }
    });


});