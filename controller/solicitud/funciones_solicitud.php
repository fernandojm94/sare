<?php
include('../../controller/exe.php');
function get_nombre_rfc_pfisica()
{
	$sql = "SELECT nombre_completo, rfc
				FROM personas_fisicas
				WHERE 1";
	$result = querys($sql);

	return $result;
}

function get_nombre_rfc_pmoral()
 {
 	$sql = "SELECT nombre_empresa, rfc_empresa
 				FROM personas_morales
 			WHERE 1";

 	$result = querys($sql);

 	return $result;
 }

function get_pfisica_rfc($rfc)
{
	$sql = "SELECT id, nombre_completo, calle, no_exterior, no_interior, colonia, municipio, localidad, c_p, rfc, curp, telefono, email
				FROM personas_fisicas
				WHERE  rfc = '".$rfc."'";
	$results = query_row_id($sql);

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

function create_dg_establecimiento($nombre_comercial, $horario_trabajo, $calle_dg, $no_ex_dg, $no_int_dg, $colonia_dg, $entre_calles, $municipio_dg, $localidad_dg, $cp_dg, $latlong, $telefono_dg, $uso, $scian, $catastral, $manzana, $lote, $distancia_esquina, $cajones, $inversion, $personal_ocupado, $servicios_chosen)
{
	$sql= "INSERT INTO dg_establecimiento(nombre_comercial, horario_trabajo, calle, no_exterior, no_interior, colonia, entre_calles, municipio, localidad, cp, latitud_longitud, telefono, uso_actual, giro_scian, cuenta_catastral, manzana, lote, distancia_esquina, cajones_estacionamiento, monto_inversion, pesonal_ocupado, servicios_existentes) 
			VALUES ('".$nombre_comercial."', '".$horario_trabajo."', '".$calle_dg."', ".$no_ex_dg.", ".$no_int_dg.", '".$colonia_dg."', '".$entre_calles."', '".$municipio_dg."', '".$localidad_dg."', ".$cp_dg.", '".$latlong."', '".$telefono_dg."', '".$uso."', '".$scian."', '".$catastral."', '".$manzana."', '".$lote."', '".$distancia_esquina."', '".$cajones."', '".$inversion."', '".$personal_ocupado."', '".$servicios_chosen."')";

	$result = querys($sql);

	return $result;
}

function create_dimensiones_establecimiento($frentel, $fondo, $derecho, $izquierdo, $delterreno, $dellocal)
{
	$sql = "INSERT INTO dimensiones_establecimiento(frente, fondo, derecho, izquierdo, sup_terreno, sup_local, cuenta_predial) 
				VALUES('".$frentel."', '".$fondo."', '".$derecho."', '".$izquierdo."', '".$delterreno."', '".$dellocal."')";

				$result = querys($sql);

	return $result;
}