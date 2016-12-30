<?php
    $protocol = 'http';
    if(isset($_SERVER['HTTPS'])&&strlen($_SERVER['HTTPS'])!=0)
        $protocol.='s';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="<?php echo $protocol; ?>://<?php echo $_SERVER['HTTP_HOST'] ?>/">

    <title><?php echo $page->title; ?></title>

    <!-- CSS includes -->
    <link href="asset/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="asset/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/theme.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
    <script src="asset/player/ie8/videojs-ie8.min.js"></script>
    <![endif]-->


    <script src="asset/js/jquery.min.js"></script>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default navbar-fixed-top" style="background: cornflowerblue">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Навигация</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="http://<?php echo SITE; ?>">
                <img class="img-responsive" src="asset/images/logo.png" style="height:30px; margin-top:10px;" />
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://media.<?php echo SITE; ?>">Фильмы</a></li>
                <li><a href="http://univer.<?php echo SITE; ?>">ВОУ</a></li>
                <li><a href="http://game.<?php echo SITE; ?>">Игры</a></li>
                <li><a href="http://soft.<?php echo SITE; ?>">Софт</a></li>
                <li><a href="http://tutor.<?php echo SITE; ?>">Уроки</a></li>
                <li><a href="http://book.<?php echo SITE; ?>">Книги</a></li>
                <li><a href="http://chat.<?php echo SITE; ?>">Чат</a></li>
                <li><a href="http://share.<?php echo SITE; ?>">ФО</a></li>
                <li><a href="http://code.<?php echo SITE; ?>">CodeCraft</a></li>

                <?php if($url[0] != "auth" && $url[0]  != "www") { ?>

                    <li class="mtop">
                        <input id="search" type="text" class="form-control" placeholder="Поиск..."/>
                    </li>
                    <li class="mtop">
                        <div>
                            <button id="find" class="btn btn-primary" type="submit">Найти <span class="fa fa-search"></span>
                            </button>
                        </div>
                    </li>

                    <script>

                        $('#find').click(function(){

                            var text = $('#search').val().trim();
                            if(text.length > 2)
                                location.replace("search?key="+text);
                            else alert("Длина запроса не менее 3 символов!");

                        });

                        $('#search').keyup(function(e){
                            if(e.which == 13) $('#find').trigger('click');
                        });

                    </script>

                    <?php
                }

                if($user->right == 1) {
                    ?>
                    <li><a href="http://auth.<?php echo SITE; ?>">Войти на сайт</a></li>

                    <?php  } else {  ?>
                    <li><a style="cursor: pointer" id="logout">Выйти</a></li>

                    <script src="asset/js/logout.js"></script>

                <?php  }  ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="container-projects bg-carousel pad-100">