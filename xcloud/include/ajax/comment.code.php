<?php

$user_id = $user->id;
$page_id = $_POST['page_id'] ?? false;
$portal = $_POST['portal'] ?? false;
$text = trim($_POST['text']) ?? '';

if(!($user_id && $page_id && $portal && strlen($text) > 0)) exit;

DB::query('INSERT INTO `comment` (`user_id`,`page_id`,`portal`,`time`,`text`) VALUES(?,?,?,?,?)',
    [$user_id,$page_id,$portal,time(),$text]);


$res = DB::query("SELECT * FROM `comment` WHERE `portal`=? AND `page_id`=? ORDER BY `id` DESC",[$portal,$page_id])->fetchAll(PDO::FETCH_ASSOC);


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