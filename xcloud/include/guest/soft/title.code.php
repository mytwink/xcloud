<?php

if(!is_numeric($url[2])) quit();

if($url[1] == 'genre') {
    $res = DB::query('SELECT * FROM `cat` WHERE `portal` = 2 AND `id`=?', [$url[2]]);
    $title = 'name';
}
else if($url[1] == 'soft') {
    $res = DB::query('SELECT * FROM `soft` WHERE `id`=?', [$url[2]]);
    $title = 'title';
}

if($res->rowCount() == 0) quit();

    $info = $res->fetch(PDO::FETCH_ASSOC);

    $page->title = $info[$title];

?>