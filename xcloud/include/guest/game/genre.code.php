<div class="container-projects bg-warning">
    <div class="container">
        <h1 id="projects" class="text-center"><?php echo $page->title; ?></h1>
        <br /><br />
        <div id="content" class="row">

            <?php

            $res = DB::query('SELECT `id`, `title`, `des`, `img` FROM `game` WHERE `cat` LIKE ? ORDER BY `added` DESC LIMIT 8'
                ,['%'.$url[2].'%'])->fetchAll(PDO::FETCH_ASSOC);

            $bg = ['danger', 'success', 'info', 'primary', 'warning'];

            foreach($res as $r){
                $bgr = $bg[rand()%5];
                ?>

                <div class="col-md-3" style="margin-bottom: 50px;">
                    <a href="game/<?php echo $r['id']; ?>/">
                        <div class="img-wrapper">
                            <div class="title bg-<?php echo $bgr; ?>"><?php echo $r['title']; ?></div>
                            <img class="img-responsive" src="images/cover/game/<?php echo $r['img']; ?>" />
                            <div class="img-info bg-<?php echo $bgr; ?>"><?php echo mb_substr($r['des'], 0, 200); ?>...</div>
                        </div>
                    </a>
                </div>

            <?php } ?>




        </div>
        <div class="clearfix hidden-xs" style="width:100%; height:10px;"></div>
        <div id="show-more" class="col-xs-12 btn btn-primary" data-page="<?php echo $url[2]; ?>">Далее</div>
    </div>

    <script src="asset/js/show_more.js"></script>