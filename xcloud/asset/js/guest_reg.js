var $d = $(document);


$('#reg').click(function(){

    $(this).css({"opacity":0});
    $('.reg-wr').fadeIn(400);

});

$d.off();

var b_log = 0, b_pass1 = false, b_pass2 = true;

//Проверка логина!
$d.on('keyup blur', '#login', function(e){

    if(e.which < 37 || e.which > 40){

        var regEx = /^[a-z0-9_-]{3,16}$/ig;
        var str = $(this).val();
        var res = str.match(regEx);

        if(res && res.length==1) {

            $('#login-wrong').fadeOut(400);
            b_log = 1;

            if(str.length > 2){

                $.ajax({
                    type:'post',
                    url:'ajax/auth_exec',
                    data:{
                        auth: "checklogin",
                        checklogin: str
                    },
                    success:function(data){

                        if(data == "login_free"){
                            $('#login-busy').fadeOut(400);
                            b_log = 2;
                        } else {
                            $('#login-busy').fadeIn(400);
                            b_log = 1;
                        }
                    }
                });

            }

        } else {

            $('#login-wrong').fadeIn(400);
            b_log = 0;

        }


    }

});

///////////////////////////////////

//Проверка Пароля!
$d.on('keyup blur', '#pass1', function(e){

    if(e.which < 37 || e.which > 40){

        var regEx = /^[a-z0-9_!@#$%^&*()'+="-]{6,32}$/ig;
        var str = $(this).val();
        var res = str.match(regEx);

        if(res && res.length==1) {

            $('#pass1-wrong').fadeOut(400);
            b_pass1 = true;



        } else {

            $('#pass1-wrong').fadeIn(400);
            b_pass1 = false;

        }


        if($(this).val() == $('#pass2').val()) {

            $('#pass2-wrong').fadeOut(400);
            b_pass2 = true;


        } else {

            $('#pass2-wrong').fadeIn(400);
            b_pass2 = false;

        }


    }

});

$d.on('keyup blur', '#pass2', function(e){

    if(e.which < 37 || e.which > 40){


        if($(this).val() == $('#pass1').val()) {

            $('#pass2-wrong').fadeOut(400);
            b_pass2 = true;


        } else {

            $('#pass2-wrong').fadeIn(400);
            b_pass2 = false;

        }


    }

});

///////////////////////////////////


//Зарегистрироваться

$d.on('click', '#register', function(e){

    if(b_log==2 && b_pass1 && b_pass2){

        var load, i= 0, p = new Array(".","..","...");

        $.ajax({
            type:'post',
            url:'ajax/auth_exec',
            data:{
                auth: "insertuser",
                log: $('#login').val(),
                pass: $('#pass1').val()
            },
            beforeSend: function(){

                load = setInterval(function(){

                    $('#register').html("Регистрация" + p[i]);
                    i++; i%=3;

                }, 400);

            },
            success:function(data){
                clearInterval(load);
                if(data == "inserted") {
                    $('#register').html("Успешно!");

                    $('.reg-wr').hide(400);
                    $('#reg-s').show(400);

                } else {
                    $('#register').html("Упс! Попробуйте заново!");
                }
            }
        });


    } else {

        if(b_log == 1) $('#login-busy').fadeIn(400);
        else if(b_log == 0) $('#login-wrong').fadeIn(400);
        if(!b_pass1) $('#pass1-wrong').fadeIn(400);
        if(!b_pass2) $('#pass2-wrong').fadeIn(400);

    }

});

