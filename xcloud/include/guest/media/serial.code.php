<?php

//Количество просмотров
if(!isset($_SESSION['media'.$url[2]])){
    $_SESSION['media'.$url[2]] = 1;
    DB::query('UPDATE `media` SET `popular` = `popular`+1 WHERE `id`=?',[$url[2]]);
}

//размер файла
$size = $info['size'];
if($size < 1024) $size .= ' КБ';
else if($size < 1024 * 1024) $size = round($size / 1024,2).' МБ';
else $size = round($size / 1024 / 1024, 2).' ГБ';
?>
<div class="container-projects bg-carousel">
    <div class="container">
        <br /><br />
        <div class="row">
            <div class="col-md-3">
                <div class="img-wrapper">
                    <img class="img-responsive" src="images/cover/media/<?php echo $info['img']; ?>" />
                </div>
                <a href="#player" class="link col-xs-12 bg-warning"><span class="fa fa-video-camera"></span> Смотреть</a>
               <a href="#" class="link col-xs-12 bg-success"><span class="fa fa-eye"></span> Просмотров: <?php echo $info['popular']; ?></a>
                <br><br><br><br><br><br>
                <div class="text-center">
                    <h4>Страна: <?php echo $info['country']; ?></h4>
                    <h4>Год: <?php echo $info['year']; ?></h4>
                    <h4>Размер: <?php echo $size; ?></h4>
                </div>
            </div>
            <div class="col-md-9 col-xs-12">
                <div class="over">
                    <div class="col-xs-12 unover link bg-warning" id="resize">Описание<div class="pull-right"><span class="fa fa-arrow-up"></span></div></div>
                    <div class="cur col-xs-12">
                        <h4><?php echo $info['title']; ?></h4>
                        <?php echo $info['des']; ?>
                    </div>
                </div>


                <div class="over">
                    <div class="col-md-12 unover link bg-info">Смотреть серии<div class="pull-right"><span class="fa fa-arrow-up rotate"></span></div></div>


                    <div class="cur">



                        <br><br>

                            <?php
                                $r = SERIAL.'/'.$info['link'];

                            $season = scandir($r);

                            $i = 0;
                            foreach($season as $s){

                                if(!is_dir($r.'/'.$s) || $s == '.' || $s=='..') continue;
                                ++$i;
                            ?>

                        <h4>Сезон <?php echo $i; ?></h4>

                                    <div class="row text-center">

                                        <?php

                                        $seria = scandir($r.'/'.$s);

                                        $j = 0;

                                        foreach($seria as $ser){
                                            if(!is_file($r.'/'.$s.'/'.$ser)) continue;
                                            ++$j;

                                            ?>

                                        <div data-src="http://content.<?php echo SITE."/media/serial/".$info['link'].'/'.$s."/".$ser; ?>"
                                             class="seria col-md-3 col-xs-6 btn btn-primary"><?php echo $j; ?> - Серия</div>

                                        <?php } ?>
                                    </div>

                        <?php } ?>


                </div>
                    </div>



                <div class="over">
                    <div class="col-md-12 unover link bg-primary">Скачать серии<div class="pull-right"><span class="fa fa-arrow-up rotate"></span></div></div>


                    <div class="cur">



                        <br><br>

                        <?php
                        $r = SERIAL.'/'.$info['link'];

                        $season = scandir($r);

                        $i = 0;
                        foreach($season as $s){

                            if(!is_dir($r.'/'.$s) || $s == '.' || $s=='..') continue;
                            ++$i;
                            ?>

                            <h4>Сезон <?php echo $i; ?></h4>

                            <div class="row text-center">

                                <?php

                                $seria = scandir($r.'/'.$s);

                                $j = 0;

                                foreach($seria as $ser){
                                    if(!is_file($r.'/'.$s.'/'.$ser)) continue;
                                    ++$j;

                                    $first = $first ?? 'http://content.'.SITE.'/media/serial/'.$info['link'].'/'.$s.'/'.$ser;
                                    ?>

                                    <a href="http://content.<?php echo SITE."/media/serial/".$info['link'].'/'.$s."/".$ser; ?>"
                                         class="col-md-3 col-xs-6 btn btn-primary"><?php echo $j; ?> - Серия</a>

                                <?php } ?>
                            </div>

                        <?php } ?>


                    </div>
                </div>



                <div class="over">
                    <div class="col-md-12 unover link bg-danger">Скриншоты<div class="pull-right"><span class="fa fa-arrow-up rotate"></span></div></div>
                    <div class="cur">
                        <div class="row text-center">

                            <?php

                            $scr = explode(' ',$info['screen']);

                            foreach($scr as $s){

                                ?>

                                <div class="col-md-3 col-xs-12">
                                    <a href="images/screen/media/<?php echo $s; ?>" rel="screens" onclick="return jsiBoxOpen(this)">
                                        <img class="col-xs-12" src="images/screen/media/<?php echo $s; ?>" style="margin-top: 5px;"></a>
                                </div>

                            <?php } ?>

                        </div>
                    </div>
                </div>


                <!-- <div class="over">
                     <div class="col-md-12 unover link bg-primary">Актёрский состав<div class="pull-right"><span class="fa fa-arrow-up rotate"></span></div></div>
                     <div class="cur">
                         <div class="row text-center">
                             <div class="col-md-3 col-xs-12">
                                 <img class="col-xs-12" src="images/acters/team1.jpg" style="margin-top: 5px;">
                                 <b>Степан</b><br>Актёр
                             </div>
                             <div class="col-md-3 col-xs-12">
                                 <img class="col-xs-12" src="images/acters/team2.jpg" style="margin-top: 5px;">
                                 <b>Степан</b><br>Ещё Актёр
                             </div>
                             <div class="col-md-3 col-xs-12">
                                 <img class="col-xs-12" src="images/acters/team3.jpg" style="margin-top: 5px;">
                                 <b>Степан</b><br>Сценарист
                             </div>
                             <div class="col-md-3 col-xs-12">
                                 <img class="col-xs-12" src="images/acters/team4.jpg" style="margin-top: 5px;">
                                 <b>Степан</b><br>Режисёр
                             </div>
                         </div>
                     </div>
                 </div> -->


                <?php

                require_once("include/guest/comment.code.php");
                ?>



            </div>
        </div>
    </div>
    <div class="clearfix hidden-xs" style="width:100%; height:50px;"></div>
</div>





<div class="container-player text-center" id="player">
    <div class="container">
        <video id="my-video" class="video-js" controls="controls" preload="auto" poster="images/screen/media/<?php echo $scr[0]; ?>">
            <source src="<?php echo $first; ?>">
            Воспрооизведение не поддерживается вашим браузером.
            <a href="<?php echo $first; ?>">Скачайте видео</a>.
        </video>
    </div>
</div>

