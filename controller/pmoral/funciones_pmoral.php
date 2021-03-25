<?php
include('../../controller/exe.php');

function get_nombre_rfc_pmoral()
 {
 	$sql = "SELECT nombre_empresa, rfc_empresa
 				FROM personas_morales
 			WHERE 1";

 	$result = querys($sql);

 	return $result;
 }

 function get_pmoral_rfc($rfc)
{
	$sql = "SELECT id, nombre_empresa, fecha_constitucion, rfc_empresa, email_empresa, telefono_empresa, nombre_rl, rfc_rl, curp, calle, no_exterior, no_interior, colonia, estado, municipio, localidad, cp, telefono_rl, email_rl
				FROM personas_morales
				WHERE  rfc_empresa = '".$rfc."'";
	$result = query_row_id($sql);

	return $result;
}
 
function compare_pmoral($nombre_empresa, $rfc_pm)
{
	$sql = "SELECT id 
				FROM personas_morales
				WHERE nombre_empresa = '".$nombre_empresa."' AND rfc_empresa = '".$rfc_pm."'";

	$result = query_num_rows($sql);

	return $result;
}

function create_pmoral($nombre_empresa, $fecha_constitucion, $rfc_pm, $telefono_pm, $email_pm, $nombre_rl, $rfc_rl, $curp_rl, $calle_rl, $no_ex_rl, $no_int_rl, $colonia_rl, $estado_rl, $municipio_rl, $localidad_rl, $cp_rl, $telefono_rl, $email_rl)
{
	$sql = "INSERT INTO personas_morales(nombre_empresa, fecha_constitucion, rfc_empresa, telefono_empresa, email_empresa, nombre_rl, rfc_rl, curp, calle, no_exterior, no_interior, colonia, estado, municipio, localidad, cp, telefono_rl, email_rl) 
	VALUES('".$nombre_empresa."', '".$fecha_constitucion."','".$rfc_pm."', '".$telefono_pm."', '".$email_pm."', '".$nombre_rl."', '".$rfc_rl."', '".$curp_rl."', '".$calle_rl."', ".$no_ex_rl.", ".$no_int_rl.", '".$colonia_rl."', '".$estado_rl."', '".$municipio_rl."', '".$localidad_rl."', ".$cp_rl.", '".$telefono_rl."', '".$email_rl."')";

	$result = querys($sql);

	return $result;
}
 
 