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
	$id_tipo='';
	foreach ($usuarios as $usuario) 
	{
		$id_tipo = $usuario['id_tipo_usuario'];
		
		switch ($id_tipo){
			case 1: $id_tipo = "Administrador";
			break;

			case 2: $id_tipo = "Sare";
			break;

			case 3: $id_tipo = "Ventanilla Única";
			break;

			case 4: $id_tipo = "Uso de Suelo";
			break;

			case 5: $id_tipo = "Director";
			break;

			case 6: $id_tipo = "Secretario";
			break;
		}

		$tr_usuarios.=' <tr>
							<td>'.$usuario['nombre_usuario'].'</td>
							<td>'.$usuario['usuario'].'</td>
							<td>'.$id_tipo.'</td>
								<td>
									<div class="hidden-sm hidden-xs btn-group">
										<a onclick="fill_modal_update_user('.$usuario['id_usuario'].');" role="button" class="btn btn-xs btn-info" data-toggle="modal" title="Editar Usuario">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
										</a>
										
										<button title="Borrar Usuario" class="btn btn-xs btn-danger" onclick="delete_usuario('.$usuario['id_usuario'].');">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</button>
									</div>
								</td>
						</tr>';
	}
	return $tr_usuarios;
}
?>