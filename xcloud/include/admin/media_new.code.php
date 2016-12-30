<?php
	$genre = '';
	foreach ($_POST['genre'] as $key => $value) {
		$genre.=($value.' ');
	}
	$genre = rtrim($genre);

	$cover = uniqid(true).'.jpg';
	$image = new Image();
	$image->load($_FILES['cover']['tmp_name']);
	$image->resize(400, 600);
	$image->save('images/cover/media/'.$cover);

	$screens = '';
	foreach ($_FILES['screen']['tmp_name'] as $key => $value) {
		if($_FILES['screen']['error'][$key]!=0)
			continue;
		$name = uniqid(true).'.jpg';
		$image = new Image();
		$image->load($value);
		$image->resize(720, 480);
		$image->save('images/screen/media/'.$name);
		$screens.=$name.' ';
	}
	$screens = rtrim($screens);
	DB::query("INSERT INTO `media` (`tag`, `cat`, `title`, `des`, `img`, `screen`, `link`, `country`, `year`, `type`, `actor`, `size`, `added`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)",
		array($_POST['tag'],$genre,$_POST['title'],$_POST['des'],$cover,$screens,$_POST['link'],$_POST['country'],$_POST['year'],0,'1',$_POST['size'],time()));
	header("Location: media");
?>