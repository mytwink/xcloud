<?php



$key = $_GET['key'] ?? "";

$key = trim($key);
$len = strlen($key);

require_once("lib/translate.code.php");
$key1 = lat($key);
$key2 = cyr($key);

$type = ['film','serial'];

if($len > 2) {
    $key1 = "%".$key1."%";
    $key2 = "%".$key2."%";



    $res = DB::query("SELECT `id`, `title`, `des`, `img` FROM `tutor` WHERE `tag` LIKE ? OR `tag` LIKE ? OR `title` LIKE ? OR `title` LIKE ?",
        [$key1,$key2,$key1,$key2]);

    if($res->rowCount() == 0)
        $res = DB::query("SELECT `id`, `title`, `des`, `img` FROM `tutor` WHERE `des` LIKE ? OR `des` LIKE ?",
            [$key1, $key2]);


}

?>

<div class="container-projects bg-warning">
    <div class="container">
        <h4 id="projects" class="text-center"><?php

            if($len < 3 || $res->rowCount() == 0) echo "По вашему запросу ничего не найдено!";
            else echo "По вашему запросу ".($res->rowCount())." совподений!";

            ?></h4>
        <br /><br />
        <div id="content" class="row">

            <?php


            $bg = ['danger', 'success', 'info', 'primary', 'warning'];
            if($len > 2 && $res->rowCount() > 0){
                $res = $res->fetchAll(PDO::FETCH_ASSOC);
            foreach($res as $r){
                $bgr = $bg[rand()%5];
                ?>

                <div class="col-md-3" style="margin-bottom: 50px;">
                    <a href="tutor/<?php echo $r['id']; ?>/">
                        <div class="img-wrapper">
                            <div class="title bg-<?php echo $bgr; ?>"><?php echo $r['title']; ?></div>
                            <img class="img-responsive" src="images/cover/tutor/<?php echo $r['img']; ?>" />
                            <div class="img-info bg-<?php echo $bgr; ?>"><?php echo mb_substr($r['des'],0 ,200); ?>...</div>
                        </div>
                    </a>
                </div>

            <?php } } ?>




        </div>
        <div class="clearfix hidden-xs" style="width:100%; height:10px;"></div>
    </div>
