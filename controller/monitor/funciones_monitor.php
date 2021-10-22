<?php
include('../../controller/exe.php');

function fill_pendientes($buscar)
{
	$sql = "SELECT id 
				FROM ".$buscar." 
			WHERE visto IS NULL";

	$result = query_num_rows($sql);

	return $result;
}