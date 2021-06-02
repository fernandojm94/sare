<?php
require_once('../../controller/exe.php');

function get_giros($id_giro)
{
	$sql = "SELECT giro, precio
			FROM giros
			WHERE id = $id_giro";

	$result = query_row_id($sql);

	return $result;
}