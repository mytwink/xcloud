<?php

$id = $_POST['last_id'] ?? -1;

if($id < 0) exit;


$page_type = $_POST['page_type'] ?? 0;

//Для главной страницы медиа
if($page_type == 0)
$res = DB::query('SELECT `id`, `title`, `des`, `img` FROM `game` ORDER BY `added` DESC LIMIT ?,4',[$id])->fetchAll(PDO::FETCH_ASSOC);

//Для страницы по жанрам
else if(is_numeric($page_type))
$res = DB::query('SELECT `id`, `title`, `des`, `img` FROM `game` WHERE `cat` LIKE ? ORDER BY `added` DESC LIMIT ?,4',
    ['%'.$page_type.'%', $id])->fetchAll(PDO::FETCH_ASSOC);


$bg = ['danger', 'success', 'info', 'primary', 'warning'];


foreach($res as $r){
    $bgr = $bg[rand()%5];
    ?>

                        <div class="col-md-3" style="margin-bottom: 50px;">
                            <a href="game/<?php echo $r['id']; ?>/">
                                <div class="img-wrapper">
                                    <span class="title bg-<?php echo $bgr; ?>"><?php echo $r['title']; ?></span>
                                    <img class="img-responsive" src="images/cover/game/<?php echo $r['img']; ?>" />
                                    <div class="img-info bg-<?php echo $bgr; ?>"><?php echo mb_substr($r['des'], 0, 200); ?></div>
                                </div>
                            </a>
                        </div>

<?php } ?>
