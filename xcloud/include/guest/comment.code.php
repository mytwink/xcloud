<div class="over">
    <div class="col-xs-12 unover link bg-success" id="comover">Комментарии<div class="pull-right"><span class="fa fa-arrow-up rotate"></span></div></div>
    <div class="cur">

        <div class="row text-center">

            <?php if($user->right > 1) { ?>
            <div class="col-xs-12">
                <textarea id="mess" class="form-control" placeholder="Ваш комментарий" style="margin-top:10px"></textarea>
                <input id="send"
                       data-page="<?php echo $url[2]; ?>"
                       data-portal="<?php echo $portal; ?>"
                       class="form-control" type="button" value="Прокомментировать">
            </div>
        </div>

        <?php } else { ?>

            <div class="col-xs-12"><h4>Чтобы Оставлять комментарий <a class="btn btn-primary" href="http://auth.<?php echo SITE; ?>">
                        войдите на сайт!</a></h4></div>

    <?php    } ?>

<div id="messages">
        <?php
        $res = DB::query("SELECT * FROM `comment` WHERE `portal`=? AND `page_id`=? ORDER BY `id` DESC",[$portal,$url[2]])->fetchAll(PDO::FETCH_ASSOC);
        foreach($res as $r){

            $u = DB::query("SELECT `login`, `avatar` FROM `user` WHERE `id`=?",[$r['user_id']])->fetch(PDO::FETCH_ASSOC);

            $avatar = "asset/images/avatar.png";
            if(strlen($u['avatar']) > 3)
                $avatar = "images/avatar/".$u['avatar'];
            ?>

            <div class="row text-center">
                <div class="col-md-2 col-xs-6">
                    <img class="col-xs-12 circle" src="<?php echo $avatar; ?>" style="margin-top: 5px;">
                    <?php echo $u['login']; ?>
                </div>
                <div class="col-md-10 col-xs-12 comment text-left">
                    <?php echo $r['text']; ?>
                </div>
            </div>
        <?php } ?>
</div>

    </div>
</div>

<script>

    $('#send').click(function(){

        var th = $(this), mess = $("#mess"), text = mess.val().trim();

        if(text.length > 0) {


            $.ajax({
                type: 'post',
                url: 'ajax/comment',
                data: {
                    page_id: th.attr("data-page"),
                    portal: th.attr("data-portal"),
                    text: text
                },
                beforeSend: function () {

                    /*load = setInterval(function(){

                     th.html("Авторизация" + p[i]);
                     i++; i%=3;

                     }, 400); */

                },
                success: function (data) {
                    //clearInterval(load);
                    if (data.length > 0) {
                        mess.val("");
                        $('#messages').html(data);
                    }
                    $th = $("#comover");
                    var opened = $th.attr("data-open")=="true";
                    if(opened){
                        $th.parent().height($th.parent().children(".cur").height()+40);
                        $th.children(".pull-right").children(".fa-arrow-up").removeClass("rotate");
                        $th.attr("data-open","true");
                    }
                }

            });

        }


    });

</script>