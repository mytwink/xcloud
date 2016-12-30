<?php
	$res = DB::query("SELECT * FROM `media` ORDER BY `id` desc",[])->fetchAll(PDO::FETCH_ASSOC);
?>
	<script type="text/javascript">
		function del($i) {
			$.ajax({
				type: "POST",
				url: "del_media",
				data: ({id : $i}),
				success: (function(data){
					$('#lol'+$i+" *").remove();
					$('#lol'+$i).attr("class", $('#lol'+$i).attr("class")+" deleted");
					setTimeout(function () {
						$('#lol'+$i).remove();
					}, 800);
				})
			});
		}
	</script>	<div class="content">
		<a href="media_add/" class="block">
			<img src="asset/images/plus.jpg">
			<div class="text"><h3>Добавить публикацию</h3></div>
		</a>
	<?php foreach ($res as $r) { ?>
		<div class="block" id="lol<?php echo $r['id'];?>">
			<a href="media_edit/<?php echo $r['id'];?>" class="calc">
				<img src="images/cover/<?php echo $r['img'];?>">
			</a>
			<a href="media_edit/<?php echo $r['id'];?>" class="text">
				<div>
					<?php echo $r['title'];?>
				</div>
			</a>
			<div class="delete" onclick="del(<?php echo $r['id'];?>)">Удалить</div>
			<a href="media_edit/<?php echo $r['id'];?>" class="edit">Редактировать</a>
		</div>
	<?php } ?>
	<div class="col-xs-12 btn btn-success">Далее</div>
	<script type="text/javascript">
		$(window).load(function(){
			$f = true;
			$('.block').each(function(){
				if($f){
					$f = false;
				}else{
					$i = $(this).children(".calc").height();
					$(this).height($i-5);
				}
			});
		});
	</script>
</body>
</html>