<?php

if(!is_numeric($url[2])) quit();

if($url[1] == 'genre') {
    $res = DB::query('SELECT * FROM `cat` WHERE `portal` = 6 AND `id`=?', [$url[2]]);
    $title = 'name';
}
else if($url[1] == 'vou') {
    $res = DB::query('SELECT * FROM `vuz` WHERE `id`=?', [$url[2]]);
    $title = 'ru';
}

if($res->rowCount() == 0) quit();

    $info = $res->fetch(PDO::FETCH_ASSOC);

    $page->title = $info[$title];

?>