<?php
include('../../controller/exe.php');

function get_pfisica_rfc($rfc)
{
	$sql = "SELECT id, nombre_completo, calle, no_exterior, no_interior, colonia, municipio, localidad, estado, c_p, rfc, curp, telefono, email
				FROM personas_fisicas
				WHERE 1";
	$result = querys($sql);

	return $result;
}

function get_nombre_rfc_pfisica()
{
	$sql = "SELECT nombre_completo, rfc
				FROM personas_fisicas
				WHERE 1";
	$result = querys($sql);

	return $result;
}

function compare_pfisica($nombre, $rfc, $curp, $telefono)
{
	$sql = "SELECT id
				FROM personas_fisicas
			WHERE nombre_completo = '".$nombre."' AND rfc = '".$rfc."' AND curp = '".$curp."'";

	$result = query_num_rows($sql);

	return $result;
}

function create_pfisica($nombre, $calle, $exterior, $interior, $colonia, $municipio, $localidad, $estado, $cp, $rfc, $curp, $telefono, $email)
{
		$sql = "INSERT INTO personas_fisicas (nombre_completo, calle, no_exterior, no_interior, colonia, municipio, localidad, estado, c_p, rfc, curp, telefono, email)
										VALUES('".$nombre."', '".$calle."', '".$exterior."', '".$interior."', '".$colonia."', '".$municipio."', '".$localidad."', '".$estado."', '".$cp."', '".$rfc."', '".$curp."', '".$telefono."', '".$email."')";
		$result = query_last_id($sql);

		return $result;
}

function update_pfisica( $calle, $exterior, $interior, $colonia, $municipio, $localidad, $estado, $cp, $telefono, $email, $id)
{
	$sql = "UPDATE personas_fisicas SET calle = '".$calle."', no_exterior = '".$exterior."', no_interior = '".$interior."', colonia = '".$colonia."', municipio = '".$municipio."', localidad = '".$localidad."', estado = '".$estado."', c_p = '".$cp."', telefono = '".$telefono."', email = '".$email."' WHERE id = $id";

	$result = querys($sql);

	return $result;
}