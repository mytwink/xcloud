<?php
function check_allow(int $a, int $b){

    if(($b < 3 || $b == 4) && $a!=$b) return false;

    if($b == 3 && $a == 4) return false;

    if($b == 5 && $a==2) return false;

    if($b == 6 && $a == 1) return false;

    return true;
}

function mkpage(string $str){
    switch($str){


        //Guest Include
        case 'www':
            return new Struct('guest',['header_main', 'home_slider', 'home', 'footer'], 7, 'XCloud - облако ресурсов в TAS-IX.');
            break;

        case 'auth':
            return new Struct('guest',['header','auth', 'footer'], 1, 'Войти на сайт!');
            break;


      //Guest Media
        case 'media': return new Struct('guest',['header_media','genre','media/slider', 'media/home',  'footer'], 7, 'XMedia - Коллекция фильмов всех жанров.');
            break;

        case 'media/genre': return new Struct('guest',['media/title','header_media', 'genre', 'media/slider', 'media/genre',  'footer'], 7, '');
            break;

        case 'media/film': return new Struct('guest',['media/title', 'header_media', 'genre', 'media/film', 'media/home',  'footer'], 7, '');
            break;

        case 'media/serial': return new Struct('guest',['media/title', 'header_media', 'genre', 'media/serial', 'media/home',  'footer'], 7, '');
            break;

        case 'media/search': return new Struct('guest',['header_media', 'genre', 'media/slider', 'media/search',  'footer'], 7, 'XMedia - Поиск фильма.');
            break;
			
			
      //Guest VOU
        case 'univer': return new Struct('guest',['header_media','genre','univer/slider', 'univer/home',  'footer'], 7, 'XSchools - Путеводитель по Высшим Образовательным Учреждениям.');
            break;

        case 'univer/genre': return new Struct('guest',['univer/title','header_media', 'genre', 'univer/slider', 'univer/genre',  'footer'], 7, '');
            break;

        case 'univer/vou': return new Struct('guest',['univer/title', 'header_media', 'genre', 'univer/item', 'univer/home',  'footer'], 7, '');
            break;

        case 'univer/search': return new Struct('guest',['header_media', 'genre', 'univer/slider', 'univer/search',  'footer'], 7, 'XMedia - Поиск фильма.');
            break;

        //Guest Soft
        case 'soft': return new Struct('guest',['header','genre','soft/slider', 'soft/home',  'footer'], 7, 'XSoft - Программы, утилиты и софт.');
            break;

        case 'soft/genre': return new Struct('guest',['soft/title','header', 'genre', 'soft/slider', 'soft/genre',  'footer'], 7, '');
            break;

        case 'soft/soft': return new Struct('guest',['soft/title', 'header', 'genre', 'soft/soft', 'soft/home',  'footer'], 7, '');
            break;
        case 'soft/search': return new Struct('guest',['header', 'genre', 'soft/slider', 'soft/search',  'footer'], 7, 'Xsoft - Поиск софта.');
            break;

        //Guest Game
        case 'game': return new Struct('guest',['header','genre','game/slider', 'game/home',  'footer'], 7, 'Xgame - Игры всех сортов.');
            break;

        case 'game/genre': return new Struct('guest',['game/title','header', 'genre', 'game/slider', 'game/genre',  'footer'], 7, '');
            break;

        case 'game/game': return new Struct('guest',['game/title', 'header', 'genre', 'game/game', 'game/home',  'footer'], 7, '');
            break;
        case 'game/search': return new Struct('guest',['header', 'genre', 'game/slider', 'game/search',  'footer'], 7, 'Xgame - Поиск игр.');
            break;

        //Guest Tutor
        case 'tutor': return new Struct('guest',['header','genre','tutor/slider', 'tutor/home',  'footer'], 7, 'Xtutor - Игры всех сортов.');
            break;

        case 'tutor/genre': return new Struct('guest',['tutor/title','header', 'genre', 'tutor/slider', 'tutor/genre',  'footer'], 7, '');
            break;

        case 'tutor/tutor': return new Struct('guest',['tutor/title', 'header', 'genre', 'tutor/tutor', 'tutor/home',  'footer'], 7, '');
            break;
        case 'tutor/search': return new Struct('guest',['header', 'genre', 'tutor/slider', 'tutor/search',  'footer'], 7, 'Xtutor - Поиск игр.');
            break;

               //Guest Book
        case 'book': return new Struct('guest',['header','genre','book/slider', 'book/home',  'footer'], 7, 'Xbook - Игры всех сортов.');
            break;

        case 'book/genre': return new Struct('guest',['book/title','header', 'genre', 'book/slider', 'book/genre',  'footer'], 7, '');
            break;

        case 'book/book': return new Struct('guest',['book/title', 'header', 'genre', 'book/book', 'book/home',  'footer'], 7, '');
            break;
        case 'book/search': return new Struct('guest',['header', 'genre', 'book/slider', 'book/search',  'footer'], 7, 'Xbook - Поиск игр.');
            break;

      //Guest Chat
        case 'chat': return new Struct('guest',['header_main', 'chat/home',  'footer'], 7, 'XMedia - Коллекция фильмов всех жанров.');
            break;
			
      //Guest Filesharing
        case 'share': return new Struct('guest',['header_main', 'share/home',  'footer'], 7, 'XShare - Удобный обмен и хранилище данных.');
            break;
			
      //Guest Codecraft
        case 'code': return new Struct('guest',['header_main', 'code/home',  'footer'], 7, 'XCode - Компилятор в кармане.');
            break;
			
      //Guest VR
        case 'vr': return new Struct('guest',['header_main', 'vr/home',  'footer'], 7, 'XVR - Путешествие в мире виртуальной реальности.');
            break;



        //Admin Include
        case 'admin':
            return new Struct('admin',['header','media'], 4, 'Административная панель');
        break;
        case 'admin/media':
            return new Struct('admin',['header','media'], 4, 'Административная панель');
        break;
        case 'admin/media_add':
            return new Struct('admin',['header','media_add'], 4, 'Административная панель');
        break;
        case 'admin/media_new':
            return new Struct('admin',['media_new'], 4, 'Административная панель');
        break;
        case 'admin/soft':
            return new Struct('admin',['header','soft'], 4, 'Административная панель');
        break;
        case 'admin/soft_add':
            return new Struct('admin',['header','soft_add'], 4, 'Административная панель');
        break;
        case 'admin/soft_new':
            return new Struct('admin',['soft_new'], 4, 'Административная панель');
        break;
        case 'admin/del_art':
            return new Struct('ajax',['del_art'], 4, 'Административная панель');
        break;



        //Ajax Include
        case 'auth/ajax/auth_exec':
        case 'www/ajax/auth_exec':
        case 'media/ajax/auth_exec':
        case 'music/ajax/auth_exec':
        case 'soft/ajax/auth_exec':
        case 'game/ajax/auth_exec':
        case 'book/ajax/auth_exec':
        case 'tutor/ajax/auth_exec':
        case 'admin/ajax/auth_exec':
            return new Struct('ajax',['auth_exec'], 7, '');
            break;

        //Ajax Include
        case 'auth/ajax/comment':
        case 'www/ajax/comment':
        case 'media/ajax/comment':
        case 'music/ajax/comment':
        case 'soft/ajax/comment':
        case 'game/ajax/comment':
        case 'book/ajax/comment':
        case 'tutor/ajax/comment':
        case 'admin/ajax/comment':
            return new Struct('ajax',['comment'], 6, '');
            break;

        case 'media/show_more' : return new Struct('ajax',['media_show_more'],7,'');
        break;

        case 'soft/show_more' : return new Struct('ajax',['soft_show_more'],7,'');
        break;

        case 'game/show_more' : return new Struct('ajax',['game_show_more'],7,'');
            break;

        case 'tutor/show_more' : return new Struct('ajax',['tutor_show_more'],7,'');
            break;

        case 'book/show_more' : return new Struct('ajax',['book_show_more'],7,'');
            break;
    }


    //Default page (404)
    return new Struct('guest',['header', '404', 'footer'], 7, '404 - Страница не найдено...');

}

$str = $url;
while(is_numeric($str[count($str)-1]) > 0) array_pop($str); //print_r($str);
$str = implode('/',$str);

$page = mkpage($str);


if(!check_allow($user->right, $page->allow)){
            header('Location: p404');
            exit;
}

foreach($page->include as $v){

    require_once('include/'.$page->dir.'/'.$v.'.code.php');

}


?>