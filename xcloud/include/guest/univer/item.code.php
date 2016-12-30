<?php

//Количество просмотров
if(!isset($_SESSION['vou'.$url[2]])){
    $_SESSION['vou'.$url[2]] = 1;
    DB::query('UPDATE `vuz` SET `popular` = `popular`+1 WHERE `id`=?',[$url[2]]);
}

?>
<div class="container-projects bg-carousel">
    <div class="container">
        <br /><br />
        <div class="row">
            <div class="col-md-3">
                <div class="img-wrapper">
                    <img class="img-responsive" src="images/cover/vou/<?php echo $info['img']; ?>" />
                </div>
                <a href="#" class="link col-xs-12 bg-warning"><span class="fa fa-eye"></span> Просмотров: <?php echo $info['popular']; ?></a>
                <a href="#" class="link col-xs-12 bg-primary"><span class="fa fa-phone"></span> Телефон: <?php echo $info['phone']; ?></a>
                <a href="#" class="link col-xs-12 bg-success"><span class="fa fa-envelope"></span> Email: <?php echo $info['mail']; ?></a>
                <br><br><br><br>
            </div>
            <div class="col-md-9 col-xs-12">
                <div class="over">
                    <div class="col-xs-12 unover link bg-warning" id="resize">Описание<div class="pull-right"><span class="fa fa-arrow-up"></span></div></div>
                    <div class="cur col-xs-12">
                        <h4><?php echo $info['short']; ?></h4>
                        Название на русском: <?php echo $info['ru']; ?><br><br>
                        Название на узбекском: <?php echo $info['uzb']; ?><br><br>
                        Название на английском: <?php echo $info['en']; ?><br><br>
                        Адрес: <?php echo $info['address']; ?><br><br>
                        Веб-сайт: <a href="<?php echo $info['site']; ?>"><?php echo $info['site']; ?></a><br><br>
                        Ректор/управляющий: <?php echo $info['boss']; ?><br>
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