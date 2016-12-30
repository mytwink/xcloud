<?php

//Количество просмотров
if(!isset($_SESSION['soft'.$url[2]])){
    $_SESSION['soft'.$url[2]] = 1;
    DB::query('UPDATE `soft` SET `popular` = `popular`+1 WHERE `id`=?',[$url[2]]);
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
                    <img class="img-responsive" src="images/cover/soft/<?php echo $info['img']; ?>" />
                </div>
                <a href="http://content.<?php echo SITE.'/'.$info['link']; ?>" class="link col-xs-12 bg-primary"><span class="fa fa-download"></span> Скачать</a>
                <a href="#" class="link col-xs-12 bg-success"><span class="fa fa-eye"></span> Просмотров: <?php echo $info['popular']; ?></a>
                <br><br><br><br>
                <div class="text-center">
                    <h4>Требование: <?php echo $info['support']; ?></h4>
                    <h4>Год: <?php echo $info['year']; ?></h4>
                    <h4>Размер: <?php echo $size; ?></h4>
                    <h4>Версия: <?php echo $info['version']; ?></h4>
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
                    <div class="col-md-12 unover link bg-danger">Скриншоты<div class="pull-right"><span class="fa fa-arrow-up rotate"></span></div></div>
                    <div class="cur">


                        <div class="row text-center">

                            <?php

                            $scr = explode(' ',$info['screen']);

                            foreach($scr as $s){

                            ?>

                            <div class="col-md-3 col-xs-12">
                                <a href="images/screen/soft/<?php echo $s; ?>" rel="screens" onclick="return jsiBoxOpen(this)">
                                    <img class="col-xs-12" src="images/screen/soft/<?php echo $s; ?>" style="margin-top: 5px;"></a>
                            </div>

                            <?php } ?>

                        </div>
                    </div>
                </div>




             <?php

             require_once("include/guest/comment.code.php");
             ?>



            </div>
        </div>
    </div>
    <div class="clearfix hidden-xs" style="width:100%; height:50px;"></div>
</div>