<div class="container">
	<div class="row center-block">
		<div class="col-md-6 col-md-offset-3 center-block" style="margin-top: 10%;">
			<div class="jumbotron" id="divRegister">
				<h2 class="text-center">Crear nueva cuenta</h2><hr>
				  <?= form_open(base_url().'usuarios/validar_registro','id="formRegister"'); ?>
				  	  <div class="form-group" id="formNomReg">
					    <label for="nombreReg">Nombre:</label>
					    <input type="text" class="form-control" id="nombreReg" name="nombreReg">
					    <div class="invalid-feedback" id="errorNombre"></div>
					  </div>
					  <div class="form-group" id="formNomUserReg">
					    <label for="nombreUserReg">Nombre de usuario:</label>
					    <input type="text" class="form-control" autocomplete="off" id="nombreUserReg" name="nombreUserReg">
					   	 <div class="invalid-feedback" id="existUser"></div>
					   	 <div class="valid-feedback" id="noexistUser"></div>
					    <div class="invalid-feedback" id="errorNombreUser"></div>

					  </div>
					  <div class="form-group" id="formNaciReg">
					    <label for="diaNaciReg">Fecha nacimiento:</label>
					    <div class="input-group">
						    <select name="diaNaciReg" id="diaNaciReg" class="form-control">
							  	<option value="">«Dia»</option>
							  	<?php for ($i=1; $i < 32; $i++) { 
							  		echo '<option value="'.$i.'">'.$i.'</option>';
							  	} ?>
							</select>
						    <select name="mesNaciReg" id="mesNaciReg" class="form-control">
						    	<option value="">«Mes»</option>
						    	<option value="01">Enero</option>
						    	<option value="02">Febrero</option>
						    	<option value="03">Marzo</option>
						    	<option value="04">Abril</option>
						    	<option value="05">Mayo</option>
						    	<option value="06">Junio</option>
						    	<option value="07">Julio</option>
						    	<option value="08">Agosto</option>
						    	<option value="09">Septiembre</option>
						    	<option value="10">Octubre</option>
						    	<option value="11">Noviembre</option>
						    	<option value="12">Diciembre</option>
						    </select>
						    <select name="anioNaciReg" id="anioNaciReg" class="form-control">
						    	<option value="">«Año»</option>
						    	<?php for ($i=1920; $i < 2019; $i++) { 
							  		echo '<option value="'.$i.'">'.$i.'</option>';
							  	} ?>
						    </select>
						    <div class="invalid-feedback" id="errorNaci"></div>
						</div>
					  </div>
					  <div class="form-group" id="formSexReg">
					    <label for="sexoReg">Sexo:</label>
					    <select name="sexoReg" id="sexoReg" class="form-control">
					    	<option value="">«Seleccione»</option>
					    	<option value="1">Mujer</option>
					    	<option value="2">Hombre</option>
					    </select>
					    <div class="invalid-feedback" id="errorSexo"></div>
					  </div>
					  <div class="form-group" id="formEmail1Reg">
					    <label for="emailReg">Correo Electrónico:</label>
					    <input type="email" class="form-control" id="emailReg" name="emailReg" placeholder="nombre@ejemplo.com">
					    <div class="invalid-feedback" id="errorEmail1Reg"></div>
					  </div>
					  <div class="form-group" id="formEmail2Reg">
					    <label for="emailReg">Repetir Correo Electrónico:</label>
					    <input type="email" class="form-control" id="email2Reg" name="email2Reg" placeholder="nombre@ejemplo.com">
					    <div class="invalid-feedback" id="errorEmail2Reg"></div>
					  </div>
					  <div class="form-group" id="formPass1Reg">
					    <label for="passwordReg">Contraseña:</label>
					    <input type="password" class="form-control" id="passwordReg" name="passwordReg" placeholder="***********">
						<div class="invalid-feedback" id="errorPass1Reg"></div>
					  </div>
					  <div class="form-group" id="formPass2Reg">
					    <label for="password2Reg">Repetir Contraseña:</label>
					    <input type="password" class="form-control" id="password2Reg" name="password2Reg" placeholder="***********" autocomplete="off">
					    <div class="invalid-feedback" id="errorPass2Reg"></div>
					  </div>
					  <div class="form-group">
					    <button type="submit" class="btn btn-primary btn-lg btn-block" name="btnRegistrar" id="btnRegistrar">Registrarme</button>
					    <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="changeLogin();">Iniciar Sesión</button>
					  </div>
					<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>