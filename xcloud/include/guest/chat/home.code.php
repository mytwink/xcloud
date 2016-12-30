<div class="container-projects">
    <div class="container">
        <h1 id="projects" class="text-center">Видеочат</h1>
        <br /><br />
        <div class="row">
			<?php
				if($protocol=='http')
					echo '<h1 id="projects" class="text-center">Необходим защищённый протокол передачи данных! <a href="https://chat.',SITE,'/" class="btn btn-primary">Перейти</a></h1>';
				else{
					?>
					<script src="asset/js/latest-v2.js"></script>
					<div class="row">
						<div class="col-md-6">
							<video height="300" id="localVideo"></video>
						</div>
						<div class="col-md-6">
							<div id="remotesVideos"></div>
						</div>
					</div>
					<script>
						var webrtc = new SimpleWebRTC({
						  // the id/element dom element that will hold "our" video
						  localVideoEl: 'localVideo',
						  // the id/element dom element that will hold remote videos
						  remoteVideosEl: 'remotesVideos',
						  // immediately ask for camera access
						  autoRequestMedia: true
						});
						webrtc.on('readyToCall', function () {
						  // you can name it anything
						  webrtc.joinRoom('owerall');
						});
					</script>
					<?php
				}
			?>
        </div>
    </div>
    <div class="clearfix hidden-xs" style="width:100%; height:50px;"></div>
</div>