<div class="container-projects">
    <div class="container">
        <h1 id="projects" class="text-center">Файлообменник</h1>
        <br /><br />
        <div class="row">
			<?php
				if(!isset($_SESSION['login'])||strlen($_SESSION['login'])<3)
					echo '<h1 id="projects" class="text-center">Необходимо <a href="',$protocol,'://auth.',SITE,'/" class="btn btn-primary">Авторизоваться</a>!</h1>';
				else{
 
if (!empty($_FILES)) {
	$ds          = DIRECTORY_SEPARATOR;  //1
	$storeFolder = 'userfiles';   //2
    $targetPath = dirname ( dirname ( dirname( dirname( __FILE__ ) ) ) ). $ds. $storeFolder . $ds;
    $tempFile = $_FILES['file']['tmp_name'];
	$info = new SplFileInfo($_FILES['file']['name']);
	$fileName = uniqid(true).'.'.$info->getExtension();
    $targetFile =  $targetPath.$fileName;
	DB::query("INSERT INTO userfiles (`user_id`, `filename`, `saved_filename`) VALUES (?,?,?)",[$_SESSION['id'],$_FILES['file']['name'],$fileName]);
    move_uploaded_file($tempFile,$targetFile);
     
}
					?>
					<script src="asset/js/dropzone.js"></script>
					<div class="row">
						<div class="col-md-6 update_this">
							<?php
								$res = DB::query("SELECT * FROM userfiles WHERE user_id = ?",[$_SESSION['id']])->fetchAll(PDO::FETCH_ASSOC);
								
								foreach($res as $r){
									echo '<div class="row">',$r['filename'],'<br><a href="/userfiles/',$r['saved_filename'],'" class="btn btn-primary">Скачать</a><a href="#" class="btn btn-danger">Удалить</a></div><br>';
								}
							?>
						</div>
						<div class="col-md-6">
<div id="dropzone"><form action="" class="dropzone needsclick dz-clickable" id="demo-upload">

  <div class="dz-message needsclick">
    Перетащите или нажмите для загрузки файлов.<br>
    <span class="note needsclick">Максимальный размер файла - <strong>200 Мб</strong>.</span>
  </div>

</form></div>
						</div>
					</div>
					<script>
						  $("div#dropzone").dropzone({ url: "/" });
						  Dropzone.options.dropzone = {
						  paramName: "file", // The name that will be used to transfer the file
						  maxFilesize: 200, // MB
						  accept: function(file, done) {
							if (file.name == "justinbieber.jpg") {
							  done("Naha, you don't.");
							}
							else { done(); }
						  }
						};
					</script>
					<?php
				}
			?>
        </div>
    </div>
    <div class="clearfix hidden-xs" style="width:100%; height:50px;"></div>
</div>