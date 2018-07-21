function changeRegister(){
	window.location.href="usuarios/registrar";
}
function changeLogin(){
	window.location.href="../";
}
$(document).ready(function() {
	$("#formRegister").submit(function(event) {
		event.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: $(this).attr("method"),
			data: $(this).serialize(),
			success: function(data){
				$("#errorNombre,#errorNombreUser, #errorNaci, #errorSexo, #errorEmail1Reg, #errorEmail2Reg, #errorPass1Reg, #errorPass2Reg").html("").css('display', 'none');
				var json = JSON.parse(data);
				if(json.status=="false"){
					if(json.nombreReg){
						$("#errorNombre").append(json.nombreReg).css('display','block');
						$("#formNomReg").addClass('has-danger');
						$("#nombreReg").addClass('is-invalid');
					}
					if(json.nombreUserReg){
						$("#errorNombreUser").append(json.nombreUserReg).css('display','block');
						$("#formNomUserReg").addClass('has-danger');
						$("#nombreUserReg").addClass('is-invalid');
					}
					if(json.diaNaciReg){
						$("#errorNaci").append(json.diaNaciReg).css('display','block');
						$("#formNaciReg").addClass('has-danger');
						$("#diaNaciReg").addClass('is-invalid');
					}
					if(json.mesNaciReg){
						$("#errorNaci").append(json.mesNaciReg).css('display','block');
						$("#formNaciReg").addClass('has-danger');
						$("#mesNaciReg").addClass('is-invalid');
					}
					if(json.anioNaciReg){
						$("#errorNaci").append(json.anioNaciReg).css('display','block');
						$("#formNaciReg").addClass('has-danger');
						$("#anioNaciReg").addClass('is-invalid');
					}
					if(json.sexoReg){
						$("#errorSexo").append(json.sexoReg).css('display','block');
						$("#formSexReg").addClass('has-danger');
						$("#sexoReg").addClass('is-invalid');
					}
					if(json.emailReg){
						$("#errorEmail1Reg").append(json.emailReg).css('display','block');
						$("#formEmail1Reg").addClass('has-danger');
						$("#emailReg").addClass('is-invalid');
					}
					if(json.email2Reg){
						$("#errorEmail2Reg").append(json.email2Reg).css('display','block');
						$("#formEmail2Reg").addClass('has-danger');
						$("#email2Reg").addClass('is-invalid');
					}
					if(json.passwordReg){
						$("#errorPass1Reg").append(json.passwordReg).css('display','block');
						$("#formPass1Reg").addClass('has-danger');
						$("#passwordReg").addClass('is-invalid');
					}
					if(json.password2Reg){
						$("#errorPass2Reg").append(json.password2Reg).css('display','block');
						$("#formPass2Reg").addClass('has-danger');
						$("#password2Reg").addClass('is-invalid');
					}
					
				}else{
					window.location.href="../";
				}
			}
		});
		
	});
});
$(document).ready(function() {
	$("#nombreReg").keyup(function(event) {
		if($(this).val()!=""){
			$("#formNomReg > .invalid-feedback").fadeOut();
			$("#formNomReg").removeClass('has-danger');
			$("#nombreReg").removeClass('is-invalid');
		}
	});
	$("#nombreUserReg").keyup(function(event) {
		//alert($("#nombreUserReg").val());
		if($("#nombreUserReg").val()!=""){
			$("#formNomUserReg > .invalid-feedback").fadeOut();
			$("#formNomUserReg").removeClass('has-danger');
			$("#nombreUserReg").removeClass('is-invalid');
			$.ajax({
					url: 'buscarNombreUsuario',
					type: 'POST',
					data: {nombreUser: $("#nombreUserReg").val()},
					success: function(response){
						if(response){//ya existe usuario
							$("#existUser").empty();
							$("#noexistUser").empty();
							$("#formNomUserReg").removeClass('has-success');
							$("#nombreUserReg").removeClass('is-valid');

							$("#formNomUserReg").addClass('has-danger');
							$("#nombreUserReg").addClass('is-invalid');
							$("#existUser").append("Ya existe el usuario: "+$("#nombreUserReg").val()).css('display','block');
						}else{//no existe
							$("#existUser").empty();
							$("#noexistUser").empty();
							$("#formNomUserReg").removeClass('has-danger');
							$("#nombreUserReg").removeClass('is-invalid');

							$("#formNomUserReg").addClass('has-success');
							$("#nombreUserReg").addClass('is-valid');
							$("#noexistUser").append("Nombre de usuario correcto").css('display','block');
						}
					}
				});
		}
		
	});
	$("#diaNaciReg, #mesNaciReg, #anioNaciReg").change(function(event) {
		if($(this).val()!=""){
			$("#errorNaci").fadeOut();
			$("#formNaciReg").removeClass('has-danger');
			$("#diaNaciReg, #mesNaciReg, #anioNaciReg").removeClass('is-invalid');
		}
	});
	$("#sexoReg").change(function(event) {
		if($(this).val()!=""){
			$("#formSexReg > .invalid-feedback").fadeOut();
			$("#formSexReg").removeClass('has-danger');
			$("#sexoReg").removeClass('is-invalid');
		}
	});
	$("#emailReg").keyup(function(event) {
		if($(this).val()!=""){
			$("#formEmail1Reg > .invalid-feedback").fadeOut();
			$("#formEmail1Reg").removeClass('has-danger');
			$("#emailReg").removeClass('is-invalid');
		}
	});
	$("#emai2Reg").keyup(function(event) {
		if($(this).val()!=""){
			$("#formEmail2Reg > .invalid-feedback").fadeOut();
			$("#formEmail2Reg").removeClass('has-danger');
			$("#emai2Reg").removeClass('is-invalid');
		}
	});
	$("#emai2Reg").keyup(function(event) {
		if($(this).val()==$("#emailReg").val()){
			$("#formEmail2Reg > .invalid-feedback").fadeOut();
			$("#formEmail2Reg").removeClass('has-danger');
			$("#emai2Reg").removeClass('is-invalid');
		}
	});
	$("#passwordReg").keyup(function(event) {
		if($(this).val()!=""){
			$("#formPass1Reg > .invalid-feedback").fadeOut();
			$("#formPass1Reg").removeClass('has-danger');
			$("#passwordReg").removeClass('is-invalid');
		}
	});
	$("#password2Reg").keyup(function(event) {
		if($(this).val()!=""){
			$("#formPass2Reg > .invalid-feedback").fadeOut();
			$("#formPass2Reg").removeClass('has-danger');
			$("#password2Reg").removeClass('is-invalid');
		}
	});
	$("#password2Reg").keyup(function(event) {
		if($(this).val()==$("#password2Reg").val()){
			$("#formPass2Reg > .invalid-feedback").fadeOut();
			$("#formPass2Reg").removeClass('has-danger');
			$("#password2Reg").removeClass('is-invalid');
		}
	});
});
$(document).ready(function() {
	$("#formLogin").submit(function(event) {
		event.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: $(this).attr("method"),
			data: $(this).serialize(),
			success: function(data){
				$("#errorEmailLogin, #errorPassLogin").html("").css('display', 'none');
				var json = JSON.parse(data);
				if(json.status=="false"){
					if(json.emailLogin){
						$("#errorEmailLogin").append(json.emailLogin).css('display','block');
						$("#formEmailLog").addClass('has-danger');
						$("#emailLogin").addClass('is-invalid');
					}
					if(json.passLogin){
						$("#errorPassLogin").append(json.passLogin).css('display','block');
						$("#formPassLog").addClass('has-danger');
						$("#passLogin").addClass('is-invalid');
					}
					
				}else{
					if(json.status=="nologin"){
						$("#emailLogin").val("");
						$("#passLogin").val("");
						
						$("#formLogin").after('<div class="alert alert-dismissible alert-primary">'+
  							'<button type="button" class="close" data-dismiss="alert">&times;</button>Datos ingresados incorrectos.</div>');
					}else if(json.status=="login"){
						window.location.href="../";
					}
				}
			}
		});
		
	});
});