<!-- Janres -->
<nav class="navbar navbar-default navbar-fixed-top" style="top:50px">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                <span class="sr-only">Жанры</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span style="margin:0; font-size:21px; color: white; font-weight:700;" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">ЖАНРЫ</span>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                <?php

                switch($url[0]){
                    case 'media' : $portal = 1; break;
                    case 'soft': $portal = 2; break;
                    case 'tutor' : $portal = 3; break;
                    case 'game': $portal = 4; break;
                    case 'book' : $portal = 5; break;
                    case 'univer': $portal = 6; break;
                    default : $portal = 0;
                }

                $res = DB::query('SELECT * FROM `cat` WHERE `portal` = ?',[$portal])->fetchAll(PDO::FETCH_ASSOC);


                foreach($res as $r){

                ?>
                <li><a href="genre/<?php echo $r['id'] ?>/"><?php echo $r['name'] ?></a></li>

                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>