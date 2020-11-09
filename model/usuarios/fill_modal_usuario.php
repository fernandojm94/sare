<?php
date_default_timezone_set('America/Monterrey');


function fill_modal_usuario($usuarios)
{
	$fecha_actual = date("Y-m-d");
	$modal_editar='';
	foreach ($usuarios as $usuario) 
	{
	  $modal_editar.='
  				<div id="modal-editar-'.$usuario['id_usuario'].'" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="blue bigger">Editar Usuario "'.$usuario['nombre_usuario'].'"</h4>
							</div>

							<div class="modal-body">
								<div class="row">
									<div class="col-xs-12 col-sm-12">
										<form class="form-horizontal"   method="get">

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-4 no-padding-right">Nombre completo <FONT COLOR="red">*</FONT></label>

												<div class="col-xs-12 col-sm-8">
													<div class="input-group">
														<span class="input-group-addon">	<i class="fa fa-user"></i></span>
														<input name="nombre_usuario-'.$usuario['id_usuario'].'" id="nombre_usuario-'.$usuario['id_usuario'].'" placeholder="Número de suscritos" class="col-xs-12 col-sm-10" type="text" value="'.$usuario['nombre_usuario'].'" required minlength="5" />
													</div>
												</div>
											</div>

											<div class="space-2"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-4 no-padding-right">Nombre de usuario <FONT COLOR="red">*</FONT></label>

												<div class="col-xs-12 col-sm-8">
													<div class="input-group">
														<span class="input-group-addon">	<i class="fa fa-user"></i></span>
														<input name="usuario-'.$usuario['id_usuario'].'" id="usuario-'.$usuario['id_usuario'].'" placeholder="Nombre de usuario " class="col-xs-12 col-sm-10" type="text" value="'.$usuario['usuario'].'" required minlength="5" />
													</div>
												</div>
											</div>

											<div class="space-2"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-4 no-padding-right">Contraseña <FONT COLOR="red">*</FONT></label>

												<div class="col-xs-12 col-sm-8">
													<div class="input-group">
														<span class="input-group-addon">	<i class="fa fa-key"></i></span>
														<input name="password-'.$usuario['id_usuario'].'" id="password-'.$usuario['id_usuario'].'" placeholder="Contraseña" class="col-xs-12 col-sm-10" type="password" value="" required minlength="5" />
													</div>
												</div>
											</div>

											<div class="space-2"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-4 no-padding-right">Repetir Contraseña <FONT COLOR="red">*</FONT></label>

												<div class="col-xs-12 col-sm-8">
													<div class="input-group">
														<span class="input-group-addon">	<i class="fa fa-key"></i></span>
														<input name="re_password-'.$usuario['id_usuario'].'" id="re_password-'.$usuario['id_usuario'].'" placeholder="Repetir Contraseña" class="col-xs-12 col-sm-10" type="password" value="" required minlength="5" />
													</div>
												</div>
											</div>

											<div class="space-2"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-4 no-padding-right">Tipo de Usuario <FONT COLOR="red">*</FONT></label>

												<div class="col-xs-12 col-sm-8">
													<div class="input-group">
														<span class="input-group-addon">	<i class="fa fa-users"></i></span>
														<select name="id_tipo_usuario-'.$usuario['id_usuario'].'" id="id_tipo_usuario-'.$usuario['id_usuario'].'" placeholder="Tipo de Usuario" class="col-xs-12 col-sm-10" type="text" required>
															<option value="'.$usuario['id_tipo_usuario'].'">'.$usuario['id_tipo_usuario'].'</option>
															
														</select>
													</div>
												</div>
											</div>

											<div class="space-2"></div>

											<input type="hidden" name="id_usuario-'.$usuario['id_usuario'].'" id="id_usuario-'.$usuario['id_usuario'].'" value="'.$usuario['id_usuario'].'">

										</form>
									</div>
								</div>
							</div>

							<div class="modal-footer">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									<i class="ace-icon fa fa-times"></i>
									Cancelar
								</button>

								<button onclick="update_usuario($(\'#id_usuario-'.$usuario['id_usuario'].'\').val(),$(\'#nombre_usuario-'.$usuario['id_usuario'].'\').val(),$(\'#usuario-'.$usuario['id_usuario'].'\').val(),$(\'#password-'.$usuario['id_usuario'].'\').val(),$(\'#re_password-'.$usuario['id_usuario'].'\').val(),$(\'#id_tipo_usuario-'.$usuario['id_usuario'].'\').val(),$(\'#id_secretaria-'.$usuario['id_usuario'].'\').val(),$(\'#nivel_cargo-'.$usuario['id_usuario'].'\').val());return false;" class="btn btn-sm btn-primary" id="btn_guardar">
									<i class="ace-icon fa fa-floppy-o"></i>
									Actualizar
								</button>
							</div>
							
						</div>
					</div>
				</div>
	  ';
	}
	return $modal_editar;
}
?>