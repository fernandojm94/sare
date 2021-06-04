<?php
include('../../model/usuarios/fill.php');

	$id = $_POST['id_usuario'];
	$usuarios = get_id_usuario($id);

	switch($usuarios['id_tipo_usuario']){
		case 1: $nombre_tipo_usuario = "Administrador";
		break;

		case 2: $nombre_tipo_usuario = "SARE";
		break;

		case 3: $nombre_tipo_usuario = "Ventanilla";
		break;

		case 4: $nombre_tipo_usuario = "Uso de Suelo";
		break;

		case 5: $nombre_tipo_usuario = "Director";
		break;

		case 6: $nombre_tipo_usuario = "Secretario";
		break; 
	}

?>

<div id="modal_update_user" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Editar Usuario</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12 col-sm-12">
						<form class="form-horizontal" id="form_update_usuario" name="form_update_usuario" method="POST">

							<input type="hidden" name="id_usuario" id="id_usuario" value="<?= $usuarios['id_usuario'];?>">

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-4 no-padding-right">Nombre completo <FONT COLOR="red">*</FONT></label>

								<div class="col-xs-12 col-sm-8">
									<div class="input-group">
										<span class="input-group-addon">	<i class="fa fa-user"></i></span>
										<input name="nombre_usuario" id="nombre_usuario" placeholder="Nombre completo del Usuario" class="col-xs-12 col-sm-10" type="text" value="<?= $usuarios['nombre_usuario']; ?>" required minlength="5" />
									</div>
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-4 no-padding-right">Nombre de usuario <FONT COLOR="red">*</FONT></label>

								<div class="col-xs-12 col-sm-8">
									<div class="input-group">
										<span class="input-group-addon">	<i class="fa fa-user"></i></span>
										<input name="usuario" id="usuario" placeholder="Nombre de Usuario " class="col-xs-12 col-sm-10" type="text" value="<?= $usuarios['usuario'] ?>" required minlength="5" />
									</div>
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-4 no-padding-right">Contraseña <FONT COLOR="red">*</FONT></label>

								<div class="col-xs-12 col-sm-8">
									<div class="input-group">
										<span class="input-group-addon">	<i class="fa fa-key"></i></span>
										<input name="password" id="password" placeholder="Contraseña" class="col-xs-12 col-sm-10" type="password" value="" required minlength="5" />
									</div>
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-4 no-padding-right">Repetir Contraseña <FONT COLOR="red">*</FONT></label>

								<div class="col-xs-12 col-sm-8">
									<div class="input-group">
										<span class="input-group-addon">	<i class="fa fa-key"></i></span>
										<input name="repassword" id="repassword" placeholder="Repetir Contraseña" class="col-xs-12 col-sm-10" type="password" value="" required minlength="5" />
									</div>
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-4 no-padding-right">Tipo de Usuario <FONT COLOR="red">*</FONT></label>

								<div class="col-xs-12 col-sm-8">
									<div class="input-group">
										<span class="input-group-addon">	<i class="fa fa-users"></i></span>
										<select name="id_tipo_usuario" id="id_tipo_usuario" class="col-xs-12 col-sm-10" type="text" required>
											<option value="<?= $usuarios['id_tipo_usuario'] ?>"><?= $nombre_tipo_usuario; ?></option>
											<option value="1">Administrador</option>
											<option value="2">SARE</option>
											<option value="3">Ventanilla</option>
											<option value="4">Uso de Suelo</option>
											<option value="5">Director</option>
											<option value="6">Secretario</option>
										</select>
									</div>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button class="btn btn-sm btn-secondary" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Cancelar
				</button>

				<button form="form_update_usuario" class="btn btn-sm btn-success">
					<i class="ace-icon fa fa-floppy-o"></i>
					Actualizar
				</button>
			</div>
			
		</div>
	</div>
</div>