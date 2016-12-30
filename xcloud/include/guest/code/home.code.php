<div class="container-projects">
    <div class="container">
        <h1 id="projects" class="text-center">Онлайн компилятор</h1>
        <br /><br />
        <div class="row">
			<?php
				if(!isset($_SESSION['login'])||strlen($_SESSION['login'])<3)
					echo '<h1 id="projects" class="text-center">Необходимо <a href="',$protocol,'://auth.',SITE,'/" class="btn btn-primary">Авторизоваться</a>!</h1>';
				else{
					?>
					<div class="row">
						<form action="/" enctype="multipart/form-data" method="POST">
							<input name="file" type="file" class="form-control">
							<select name="lang" class="form-control">
								<option value="g++">GNU GCC Compiler</option>
								<option value="g++">GNU G++ Compiler</option>
								<option value="java7">Java 7</option>
								<option value="java8">Java 8</option>
							</select>
							<input type="submit" class="btn btn-warning col-md-12">
						</form>
					</div>
					<?php
					if (!empty($_FILES)){
						$ds          = DIRECTORY_SEPARATOR;  //1
						$storeFolder = 'compilefolder';   //2
						$targetPath = dirname ( dirname ( dirname( dirname( __FILE__ ) ) ) ). $ds. $storeFolder . $ds;
						$tempFile = $_FILES['file']['tmp_name'];
						$info = new SplFileInfo($_FILES['file']['name']);
						$uniq = uniqid(true);
						$fileName = $uniq.'.'.$info->getExtension();
						$targetFile =  $targetPath.$fileName;
						
						switch($_POST['lang']){
							case 'g++':
								move_uploaded_file($tempFile,$targetFile);
								exec('"C:/Program Files (x86)/CodeBlocks/MinGW/bin/g++" '.$targetFile.' -o '.$targetPath.$uniq.'.exe');
							case 'g++':
								move_uploaded_file($tempFile,$targetFile);
								exec('"C:/Program Files (x86)/CodeBlocks/MinGW/bin/gcc" '.$targetFile.' -o '.$targetPath.$uniq.'.exe');
							break;
							case 'java7':
								move_uploaded_file($tempFile,$targetPath.$_FILES['file']['name']);
								exec('"C:/Program Files (x86)/Java/jdk1.8.0_31/bin/javac" '.$targetPath.$_FILES['file']['name']);
							break;
						}
						//echo '"C:/Program Files (x86)/CodeBlocks/MinGW/bin/g++" '.$targetFile;
						//$res = passthru($targetPath.$uniq.'.exe');
						
						?>
						<div class="row">
							<div class="over">
								<div class="col-xs-12 unover link bg-warning" id="resize">Результат выполнения<div class="pull-right"><span class="fa fa-arrow-up"></span></div></div>
								<div class="cur col-xs-12">
								<pre><?php 
									$res;
									switch($_POST['lang']){
										case 'g++':
											passthru($targetPath.$uniq.'.exe');
											$res = $uniq.'.exe';
											break;
										case 'gcc':
											passthru($targetPath.$uniq.'.exe');
											$res = $uniq.'.exe';
											break;
										case 'java7':
											echo passthru('java -classpath '.$targetPath.' '.substr($_FILES['file']['name'],0,strlen($_FILES['file']['name'])-5));
											echo exec('java -classpath '.$targetPath.' '.substr($_FILES['file']['name'],0,strlen($_FILES['file']['name'])-5),$res);
											print_r($res);
											$res = substr($_FILES['file']['name'],0,strlen($_FILES['file']['name'])-4).'class';
											break;
									}
								?></pre>
								</div>
							</div>
						</div>
						<?php
						echo '<div class="row"><a href="/compilefolder/',$uniq,'.exe" class="btn btn-primary col-md-12">Скачать скомпилированный файл</a></div>';
					}
				}
			?>
        </div>
    </div>
    <div class="clearfix hidden-xs" style="width:100%; height:50px;"></div>
</div>