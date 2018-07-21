<div class="container">
	<div class="row center-block">
		<div class="col-md-6 col-md-offset-3 center-block" style="margin-top: 10%;">
			<div class="jumbotron" id="divLogin">
				<h2 class="text-center">Iniciar Sesión</h2><hr>
				  <?= form_open(base_url().'usuarios/validar_login','id="formLogin"'); ?>
					  <div class="form-group" id="formEmailLog">
					    <label for="emailLogin">Correo Electrónico:</label>
					    <input type="email" class="form-control" id="emailLogin" name="emailLogin" placeholder="nombre@ejemplo.com">
					    <div class="invalid-feedback" id="errorEmailLogin"></div>
					  </div>
					  <div class="form-group" id="formPassLog">
					    <label for="passLogin">Contraseña:</label>
					    <input type="password" class="form-control" id="passLogin" name="passLogin" placeholder="***********">
					    <div class="invalid-feedback" id="errorPassLogin"></div>
					  </div>
					  <div class="form-group">
					    <button type="submit" class="btn btn-primary btn-lg btn-block" name="btnLogin">Iniciar Sesión</button>
					    <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="changeRegister();">Crear una cuenta</button>
					  </div>
					<?= form_close(); ?>
					<?php if(isset($_SESSION['EMAIL_USER'])){
						echo $_SESSION['EMAIL_USER'];
					} ?>
			</div>
		</div>
	</div>
</div>