<?php
include('../../controller/exe.php');

function compare_suplente($id_suplente)
{
	$sql = "SELECT id 
				FROM suplente 
			WHERE id_suplente =".$id_suplente;
	$result = query_num_rows($sql);

	return $result;
}

function create_suplente($id_suplente)
{
	$sql = "INSERT INTO suplente(id_suplente, status)
				VALUES('".$id_suplente."', 1)";

	$result = querys($sql);

	return $result;
}

function update_suplente($id_suplente, $status)
{
	$sql = "UPDATE suplente SET status = '".$status."'
				WHERE id_suplente = '".$id_suplente."'";

	$result = querys($sql);

	return $result;
}

function get_suplente_activo($id_suplente)
{
	$sql = "SELECT id 
				FROM suplente
			WHERE id_suplente = '".$id_suplente."' AND status = 1";

	$result = query_num_rows($sql);

	return $result; 
}

function get_suplente()
{
	$sql = "SELECT id_usuario
				FROM usuarios
			WHERE id_tipo_usuario = 5 AND status = 1";

	$result = query_row_id($sql);

	return $result;
}