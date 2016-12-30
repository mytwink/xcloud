	<style>
		.modal-err{
			display: none;
		}
		.reg-wr{
			display: none;
		}
		#reg-s{
			display: none;
		}
	</style>


	<div class="container">
		<br /><br />
		<div class="row">
			<div class="col-md-3 text-center">
				<h3 id="auth">Авторизация</h3>
				<div class="row">
					<div class="col-xs-1"></div>
					<img class="col-xs-10" src="asset/images/avatar.png">
				</div>
				<br>
				<div id="sign-wr">
					<input id="signinlogin" type="text" class="form-control" placeholder="Логин" /><br>
					<input id="signinpass" type="password" class="form-control" placeholder="Пароль" /><br>
					<button id="signin" data-src="<?php echo SITE; ?>" class="btn col-xs-12 btn-primary" type="button">Войти</button>
				</div>

			</div>
			<div class="col-md-6 hidden-xs">
				<h4>Регистрируясь вы получаете доступ ко всем сервисам XCloud!</h4>
				XCloud - обширная сеть с огромными ресурсами в различных областях.<br>
				XMedia - Коллекция фильмов всех жанров.<br>
				XMusic - Музыка для души.<br>
				XBook - Сборник умных и интересные книжки.<br>
				XGame - Игры всех сортов.<br>
				XTutor - Интерактивное обучение с видеоматериалом.
			</div>


			<div class="col-md-3 text-center col-xs-12">
				<button id="reg" class="btn col-xs-12 btn-primary" type="button">Зарегестрироваться</button>
				<h3 id="reg-s">Вы успешно зарегистрированы!</h3>
				<div class="reg-wr">
					<input id="login" type="text" class="form-control" placeholder="Придумайте себе логин (ник)" />


					<div class="row"><span id="login-busy" class="col-xs-12 popup modal-err">
							Логин уже кем-то занят!
						</span></div>
					<div class="row"><span id="login-wrong" class="col-xs-12 popup modal-err">
							Логин может содержать только символы латинского алфавита и цифры,
							а также знак подчёркивания и тире и быть длиной не менее 3 символов
						</span></div>
					<br>

					<input id="pass1" type="password" class="form-control" placeholder="Пароль" />
					<div class="row"><span id="pass1-wrong" class="col-xs-12 popup modal-err">
							Пароль может содержать только символы латинского алфавита, цифры, знак подчёркивания и тире,
							а также символы !@#$%^&*()'+=" и быть длиной не менее 6 символов
						</span></div>
					<br>
					<input id="pass2" type="password" class="form-control" placeholder="Повторите пароль" />
					<div class="row"><span id="pass2-wrong" class="col-xs-12 popup modal-err">Пароли не совпадают!</span></div>
					<br>
						<button id="register" class="btn col-xs-12 btn-primary" type="button">Зарегистрироваться</button>
				</div>

			</div>

		</div>
	</div>



	<script src="asset/js/guest_reg.js"></script>
	<script src="asset/js/guest_auth.js"></script>
