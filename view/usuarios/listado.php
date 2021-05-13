<?php 
	include('../../controller/funciones.php'); 
	include('../../model/usuarios/fill_table_usuario.php');
	include('../../model/usuarios/fill_modal_usuario.php');

	$usuarios = fill_usuarios();
	$tr_usuarios = fill_tabla_usuarios($usuarios);
	$modal_usuarios = fill_modal_usuario($usuarios);
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
						<!-- INICIA LLENADO DE TABLA-->
						<?php echo $tr_usuarios;?>
						<!-- FINALIZA LLENADO DE TABLA-->
						</tbody>
					</table>

					<!-- COMIENZA CREACION DE MODALES-->
					<?php echo $modal_usuarios ;?>
					<!-- FINALIZA CREACION DE MODALES-->
				</div>
			</div>
	</div>
		
	</div><!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
	
<script>

function update_usuario(id_usuario, nombre_usuario, usuario, password, repassword, id_tipo_usuario, id_secretaria, id_cargo){
	if (password===repassword)
	{
		var parametros = {		               
			"id_usuario" : id_usuario,
			"nombre_usuario" : nombre_usuario,
			"usuario" : usuario,
			"password" : password,
			"repassword" : repassword,
			"id_tipo_usuario" : id_tipo_usuario,
			"id_secretaria" : id_secretaria,
			"id_cargo" : id_cargo,
			"status" : 0
		};
		
		
		$.ajax({
				data:  parametros,
				url:   './model/usuarios/update_usuario.php',
				type:  'post',
				
				success:  function (data) {
														
					if (data==='correcto'){
						swal({
						  title: "¡Datos actualizados correctamente!",
						  timer: 3000,
						  type: "success",
						  confirmButtonText: "Aceptar"
						});
						setTimeout('cambiarcont("view/usuarios/listado.php")',1000);
						$("#modal-editar-"+id_usuario).modal("hide");
					}
					
					if (data==='error1'){
						swal({
						  title: "¡Error!",
						  text: "¡Favor de ingresar todos los datos obligatorios!",
						  timer: 3000,
						  type: "warning",
						  confirmButtonText: "Aceptar"
						});
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
						
				}
		});
	}
	else{
		
		swal({
		  	title: "¡Error!",
		  	text: "¡Las contraseñas no coinciden!",
		  	type: "error",
		  	confirmButtonText: "Aceptar"
		});
	}
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
						  title: "¡Datos eliminados correctamente!",
						  icon: "success",
						});
						cambiarcont('view/usuarios/listado.php');
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