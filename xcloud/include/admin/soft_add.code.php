	<div class="content">
		<form method="POST" enctype="multipart/form-data" action="/soft_new">
			<h3 class="info">Жанры:</h3><br>
			<div class="block" style="height:auto;text-align:left;background:none;box-shadow:none;">
				<?php
	                $res = DB::query('SELECT * FROM `cat` WHERE `portal` = 2',[])->fetchAll(PDO::FETCH_ASSOC);
	                foreach($res as $r){
	                ?>
					<input name="genre[]" value="<?php echo $r['id'] ?>" type="checkbox"><?php echo $r['name'] ?><br>
				<?php
					}
				?>
			</div>
			<h3 class="info">Название:</h3><br>
			<input type="text" name="title" required>
			<h3 class="info">Постер:</h3><br>
			<input type="file" accept="image/*" name="cover" required>
			<h3 class="info">Скриншоты:</h3><br>
			<div id="screens">
				<input onchange="$(this).removeAttr('onchange');add()" type="file" accept="image/*" name="screen[]" required>
			</div>
			<h3 class="info">Описание:</h3><br>
			<textarea name="des" required></textarea>
			<h3 class="info">Ссылка на софт:</h3><br>
			<input type="text" name="link" required>
			<h3 class="info">Поддерживаемые системы:</h3><br>
			<input type="text" name="support" required>
			<h3 class="info">Год:</h3><br>
			<input type="number" min="1900" max="2016" name="year" required>
			<h3 class="info">Версия:</h3><br>
			<input type="text" name="version" required>
			<h3 class="info">Размер:</h3><br>
			<input type="number" name="size" required>
			<h3 class="info">Теги:</h3><br>
			<textarea name="tag" required></textarea>
			<input type="submit" value="Сохранить">
		</form>
	</div>
</body>
<script>
	function add(){
		$('#screens').append('<br><br><input onchange="$(this).removeAttr(\'onchange\');add()" type="file" accept="image/*" name="screen[]">');
	}
</script>
</html>