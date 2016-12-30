<?php
	$genre = '';
	foreach ($_POST['genre'] as $key => $value) {
		$genre.=($value.' ');
	}
	$genre = rtrim($genre);

	$cover = uniqid(true).'.jpg';
	$image = new Image();
	$image->load($_FILES['cover']['tmp_name']);
	$image->resize(400, 400);
	$image->save('images/cover/soft/'.$cover);

	$screens = '';
	foreach ($_FILES['screen']['tmp_name'] as $key => $value) {
		if($_FILES['screen']['error'][$key]!=0)
			continue;
		$name = uniqid(true).'.jpg';
		$image = new Image();
		$image->load($value);
		$image->resize(720, 480);
		$image->save('images/screen/soft/'.$name);
		$screens.=$name.' ';
	}
	$screens = rtrim($screens);
	DB::query("INSERT INTO `soft` (`tag`, `cat`, `title`, `des`, `img`, `screen`, `link`, `year`, `size`, `added`, `version`, `support`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)",
		array(
			$_POST['tag'],$genre,$_POST['title'],$_POST['des'],$cover,$screens,$_POST['link'],$_POST['year'],$_POST['size'],time(),$_POST['version'],$_POST['support']
			)
		);
	header("Location: soft");
?>