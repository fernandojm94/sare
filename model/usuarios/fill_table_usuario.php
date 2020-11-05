<?php
include('../../controller/usuarios/funciones_usuarios.php');
function fill_usuarios()
{
	$usuarios = get_usuarios();
	return $usuarios;
}
function fill_tabla_usuarios($usuarios)
{
	$tr_usuarios='';
	foreach ($usuarios as $usuario) 
	{
		$tr_usuarios.=' <tr>
							<td>'.$usuario['nombre_usuario'].'</td>
							<td>'.$usuario['usuario'].'</td>
							<td>'.$usuario['tipo_usuario'].'</td>
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<a href="#modal-editar-'.$usuario['id_usuario'].'" role="button" class="btn btn-xs btn-info" data-toggle="modal" title="Editar Usuario">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
										</a>
										<input type="hidden" name="id_usuario-'.$usuario['id_usuario'].'" id="id_usuario-'.$usuario['id_usuario'].'" value="'.$usuario['id_usuario'].'">
										
										<button title="Borrar Usuario" class="btn btn-xs btn-danger" onclick="delete_usuario($(\'#id_usuario-'.$usuario['id_usuario'].'\').val());return false;">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</button>
									</div>

									<div class="hidden-md hidden-lg">
										<div class="inline pos-rel">
											<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
												<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
											</button>

											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
												<li>
													<a href="#" class="tooltip-info show-details-btn" data-rel="tooltip" title="Ver detalles">
														<span class="blue">
															<i class="ace-icon fa fa-pencil bigger-120"></i>
														</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</td>
						</tr>';
	}
	return $tr_usuarios;
}
?>