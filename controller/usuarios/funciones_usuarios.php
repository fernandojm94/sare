<?php
include('../../controller/exe.php');

function get_tipos_usuarios()
{
	
	$sql = "SELECT id_tipo_usuario, tipo_usuario
			FROM tipo_usuario
			WHERE status IS NULL";

	$result = querys($sql);
	return($result);
}
function compare_usuario($nombre, $secretaria)
{
	
	$sql ="SELECT nombre_usuario
			FROM usuarios
			WHERE nombre_usuario LIKE '%".$nombre."%' AND id_secretaria = $secretaria";
	
	$result = query_num_rows($sql);
	return $result;
}
function create_usuario($nombre, $usuario, $psw, $tipo_usuario, $secretaria, $cargo, $status)
{
	
	$sql ="INSERT INTO usuarios(nombre_usuario, usuario, password, id_tipo_usuario, nivel_cargo, status, id_secretaria)
			VALUES('$nombre', '$usuario', '$psw', $tipo_usuario, $cargo, $status, $secretaria)";
	$result = querys($sql);

	return $result;
}

function get_usuarios()
{
	
	$sql = "SELECT DISTINCT u.id_usuario, u.nombre_usuario, u.usuario, tu.tipo_usuario, u.id_tipo_usuario
				FROM usuarios AS u
				JOIN tipo_usuario AS tu ON tu.id_tipo_usuario = u.id_tipo_usuario
			WHERE u.status IS NULL";

	$result = querys($sql);

	return $result;
}

function get_id_usuario($usuario)
{
	
	$sql = "SELECT id_usuario, nivel_cargo, id_secretaria
				FROM usuarios
				WHERE nombre_usuario = $usuario";
	
	$result= query_row_id($sql);

	return $result;
}

function update_user($id_usuario, $nombre, $usuario, $psw, $tipo_usuario, $secretaria, $cargo)
{
	
	$sql ="UPDATE usuarios SET nombre_usuario = '$nombre', usuario = '$usuario'".$psw." id_tipo_usuario = '$tipo_usuario', nivel_cargo = '$cargo', id_secretaria = '$secretaria' WHERE id_usuario = $id_usuario";

	$result = querys($sql);

	return $result;
}

function delete_usuario($id_usuario, $status)
{
	
	$sql ="UPDATE usuarios SET status = '$status' WHERE id_usuario = $id_usuario";

	$result=querys($sql);

	return $result;
}

function get_id_secretarios($id_secretaria)
{
	
	$sql = "SELECT id_usuario 
				FROM usuarios
				WHERE nivel_cargo = 1 AND id_secretaria = $id_secretaria";
	

	$result= query_row_id($sql);

	return $result;
}

function get_asistentes($id_usuario)
{
	

	$sql = "SELECT id_asistente
				FROM asigna_asistente
				WHERE id_jefe = $id_usuario AND status is NULL";

	$result = query_num_rows($sql);
	
	if($result)
	{
		return $result;
	}else{
		return 0;
	}
}
function get_suplentes($id_usuario)
{
	

	$sql = "SELECT id_suplente
				FROM asigna_suplente
				WHERE id_jefe = $id_usuario AND status IS NULL";

	
	$result = query_num_rows($conexion, $sql);

	if($result)
	{
		return $result;
	}else{
		return 0;
	}
}
?>