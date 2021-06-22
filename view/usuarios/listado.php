<?php 
	include('../../controller/funciones.php'); 
	include('../../model/usuarios/fill_table_usuario.php');

	$usuarios = fill_usuarios();
	$tr_usuarios = fill_tabla_usuarios($usuarios);
?>


<div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="inicio.php">Inicio</a>
		</li>
		<li>
			<a href="#">Usuarios</a>
		</li>
		<li class="active">Listado de Usuarios</li>
	</ul><!-- /.breadcrumb -->	
</div>

<div class="page-content">
	<div class="page-header">
		
		<h1>
			Usuarios
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Listado de Usuarios
			</small>
		</h1>
		</br><hr>
		<a href="javascript:cambiarcont('view/usuarios/nuevo.php');" class="btn btn-primary">
			<i class="ace-icon fa fa-user"></i>
			Registrar Nuevo Usuario
		</a>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
				<div id="resultado"></div>
					<table id="simple-table" class="table  table-bordered table-hover">
						<thead>
							<tr>													
								<th>Nombre Completo</th>
								<th>Usuario</th>
								<th>Tipo de Usuario</th>
								<th>Acciones</th>
							</tr>
						</thead>

						<tbody>
						
							<?= $tr_usuarios;?>
			
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</div>

	<div id="load_modal_update_user"></div>

</div>
	
<script>

	function fill_modal_update_user(id_usuario){
		var xmlhttp;

	    if (window.XMLHttpRequest){
	        // code for IE7+, Firefox, Chrome, Opera, Safari
	        xmlhttp=new XMLHttpRequest();
	    }
	    
	    else{// code for IE6, IE5
	        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	    }

	    xmlhttp.onreadystatechange=function(){
	        
	        if (xmlhttp.readyState==4 && xmlhttp.status==200){
	            document.getElementById("load_modal_update_user").innerHTML=xmlhttp.responseText;  
	            $('#modal_update_user').modal('show');
	            update_userl();
	        }
	    }

	    var datos_modal = "id_usuario="+id_usuario;

	    xmlhttp.open("POST","./view/usuarios/modal_update_user.php",true);
	    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	    xmlhttp.send(datos_modal);
	}

function update_userl(){
	$('#form_update_usuario').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			nombre_usuario: {
				required: true,
				minlength: 4
			},
			usuario: {
				required: true,
				minlength: 4
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
				required: "Ingresar el nombre de usuario del sistema.",
				minlength: "Nombre de usuario muy corto."
			},
			
			password: {
				required: "Ingresar la contraseña.",
				minlength: "La contraseña es muy corta."
			},
			
			repassword: {
				required: "Ingresar la contraseña.",
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

		submitHandler: function () {
			var myForm = document.getElementById('form_update_usuario');
 	 		var formData = new FormData(myForm);
			
			$.ajax({
					data:  formData,
					url:   './model/usuarios/update_usuario.php',
					type:  'post',
					processData: false,
            		contentType: false,
					
					success:  function (data) {
															
							if (data==='correcto'){
								swal({
								  title: "¡Datos guardados correctamente!",
								  icon: "success"								  
								}).then(() => {
									$('#modal_update_user').modal('hide');
									$('#modal_update_user').on('hidden.bs.modal', function (e) {
										cambiarcont('view/usuarios/listado.php');
									});
								});

							}
							
							if (data==='error2'){
								swal({
								  title: "¡Error Grave!",
								  text: "¡Ocurrio algo al guardar!",
								  icon: "error"								  
								});
							}

							if (data==='error1'){
								swal({
								  title: "¡Error!",
								  text: "¡Este usuario ya registró con anterioridad!",
								  icon: "warning"								  
								});
							}
					}
			});
		}
	
	});
}

function delete_usuario(id_usuario)
{
	var date = new Date();
	var formattedDate = moment(date).format('YYYY-MM-DD');

	swal({
		title: "¿Desea eliminar este usuario?",
		icon: "warning",
		dangerMode: true,
		buttons: ["Cancelar", "Borrar"],
	}).then((value) => {

        if(value){
			
			var parametros = {		               
				"id_usuario" : id_usuario,
				"status" : formattedDate,		
			};
						
			$.ajax({
				data:  parametros,
				url:   './model/usuarios/delete_usuario.php',
				type:  'post',

				success:  function (data) {
					if (data==='correcto'){
						swal({
						  title: "¡Usuario eliminado correctamente!",
						  icon: "success",
						}).then(() => {
							cambiarcont('view/usuarios/listado.php');
						});
					}
						
					if (data==='error'){
						swal({
							title: "¡Error!",
							text: "¡Ocurrio algo al eliminar!",
							icon: "error",
						});
					}

				}
			});

		}else{
			swal("Cancelado", "No hubo cambios en sus datos.", "success");
		}
    });
}
</script>