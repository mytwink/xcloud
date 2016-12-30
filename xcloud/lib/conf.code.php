<?php
declare(strict_types = 1);
session_start();

const SITE = 'xcloud.uz';
const SERIAL = 'D:/Xampp/htdocs/content/media/serial';

//Получение массива $url
$url = $_GET['url'] ?? '';
$url = explode('/',strtolower($url));
if($url[count($url)-1] == '') array_pop($url);

$sub = $_SERVER['HTTP_HOST'] ?? 'www';
$sub = explode('.',strtolower($sub));
if($sub[0] != 'xcloud' && $sub[0] != 'www')
		array_unshift($url,$sub[0]);
else
		array_unshift($url,'www');

//Подключение классов
function __autoload(string $name){

	require_once('lib/'.$name.'.class.php');
}


function quit(){
	header('Location: http://'.$_SERVER['HTTP_HOST'].'/p404');
}

?>