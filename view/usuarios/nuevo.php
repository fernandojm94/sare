<?php 
	include('../../controller/funciones.php'); 
	include('../../model/usuarios/fill_selects.php'); 
	// $option_tipo = fill_tipo_usuarios();
	// $option_secretarias = fill_secretarias();
	// $option_cargos = fill_cargos_select();

?>
 
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="inicio.php">Inicio</a>
		</li>
		<li>
			<a href="#">Usuarios</a>
		</li>

		<li class="active">Registro de Usuarios</li>
	</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
	

	<div class="page-header">
		<h1>Usuarios
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Registro de Usuarios
			</small>
		</h1>
		
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->


			<div class="container">
				<form class="well form-horizontal" method="post"  id="form_usuarios">
					<fieldset>

						<!-- Form Name -->
						<legend>Registro de Usuarios</legend>

						<!-- Text input-->
						<div class="form-group">
						  	<label class="col-md-4 control-label">Nombre completo<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input  name="nombre_usuario" id="nombre_usuario" placeholder="Nombre Completo" class="form-control" type="text" required/>
								</div>
						  	</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  	<label class="col-md-4 control-label">Nombre de usuario<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input  name="usuario" id="usuario" placeholder="Nombre de usuario (para entrar al sistema)" class="form-control" type="text" required/>
								</div>
						  	</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  	<label class="col-md-4 control-label">Contraseña<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key"></i></span>
									<input name="password" id="password" placeholder="Contraseña" class="form-control" type="password" required/>
								</div>
						  	</div>
						</div>

						<div class="form-group">
						  	<label class="col-md-4 control-label">Confirmar contraseña<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key"></i></span>
									<input name="repassword" id="repassword" placeholder="Confirmar contraseña" class="form-control" type="password" required/>
								</div>
						  	</div>
						</div>

						

						<div class="form-group">
						  	<label class="col-md-4 control-label">Tipo de Usuario<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<select name="id_tipo_usuario" id="id_tipo_usuario" class="form-control selectpicker" required>
										<option value="">Seleccione una opción</option>
										<option value="1">Administrador</option>
										<option value="2">Cajero</option>
										<option value="3">Verificador</option>
									</select>
								</div>
						  	</div>
						</div>

						<!-- Button -->
						<div class="form-group">
						  	<label class="col-md-4 control-label"></label>
						  	<div class="col-md-4">
								<button type="submit" class="btn btn-success"> <i class="ace-icon fa fa-floppy-o"></i> &nbsp Guardar </button>
							</div>
						</div>
					</fieldset>
				</form>
			</div><!-- /.row -->

			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
				
<script>
	$('#form_usuarios').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			nombre_usuario: {
				required: true,
				minlength: 5
			},
			usuario: {
				required: true,
				minlength: 5
			},
			password: {
				required: true,
				minlength: 6
			},
			repassword: {
				required: true,
				equalTo: "#password"
			},
			id_tipo_usuario: {
				required: true
			}
		},

		messages: {
			nombre_usuario: {
				required: "Ingresar su nombre completo.",
				minlength: "Nombre demasiado corto."
			},
			usuario: {
				required: "Ingresar el nombre de usuario para entrar al sistema.",
				minlength: "Nombre de usuario muy corto."
			},
			
			password: {
				required: "Ingresar una contraseña para entrar al sistema.",
				minlength: "La contraseña es muy corta."
			},
			
			repassword: {
				required: "Repetir la contraseña.",
				equalTo: "Las contraseñas no coinciden."
			},
			id_tipo_usuario: "Seleccionar el tipo de usuario."
		},


		highlight: function (e) {
			$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
		},

		success: function (e) {
			$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
			$(e).remove();
		},

		errorPlacement: function (error, element) {
			if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
				var controls = element.closest('div[class*="col-"]');
				if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
				else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
			}
			else if(element.is('.select2')) {
				error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
			}
			else if(element.is('.chosen-select')) {
				error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
			}
			else error.insertAfter(element.parent());
		},

		submitHandler: function (form) {
			var parametros = {		               
				"nombre_usuario" : $('#nombre_usuario').val(),
				"usuario" : $('#usuario').val(),
				"password" : $('#password').val(),
				"id_tipo_usuario" : $('#id_tipo_usuario').val(),
			};
			
			$.ajax({
					data:  parametros,
					url:   './model/usuarios/create_usuario.php',
					type:  'post',
					
					success:  function (data) {
															
							if (data==='correcto'){
								swal({
								  title: "¡Datos guardados correctamente!",
								  timer: 3000,
								  type: "success",
								  confirmButtonText: "Aceptar"
								});

								cambiarcont('view/usuarios/listado.php');
							}
							
							if (data==='error2'){
								swal({
								  title: "¡Error Grave!",
								  text: "¡Ocurrio algo al guardar!",
								  timer: 3000,
								  type: "error",
								  confirmButtonText: "Aceptar"
								});
							}

							if (data==='error1'){
								swal({
								  title: "¡Error!",
								  text: "¡Este usuario ya registró con anterioridad!",
								  timer: 3000,
								  type: "warning",
								  confirmButtonText: "Aceptar"
								});
							}
					}
			});
		}
	
	});


</script>