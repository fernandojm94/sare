<?php
include('../../controller/exe.php');

function update_pmoral($parametros)
{
	$sql = "UPDATE personas_morales SET nombre_empresa = '".$parametros[2]."', calle = '".$parametros[3]."', no_exterior = '".$parametros[4]."', no_interior = '".$parametros[5]."', municipio = '".$parametros[6]."', rfc_rl = '".$parametros[7]."', curp = '".$parametros[8]."', telefono_rl = '".$parametros[9]."', email_rl = '".$parametros[10]."' WHERE id = $parametros[1]";

 	$result = querys($sql);

 	return $result;
}

function update_pfisica($parametros)
{
	$sql = "UPDATE personas_fisicas SET nombre_completo = '".$parametros[2]."', calle = '".$parametros[3]."', no_exterior = '".$parametros[4]."', no_interior = '".$parametros[5]."', municipio = '".$parametros[6]."', rfc = '".$parametros[7]."', curp = '".$parametros[8]."', telefono = '".$parametros[9]."', email = '".$parametros[10]."' WHERE id = $parametros[1]";

 	$result = querys($sql);

 	return $result;
}

function update_dg_establecimiento($parametros)
{
	$sql = "UPDATE dg_establecimiento SET nombre_empresa = '".$parametros[1]."', calle = '".$parametros[2]."', no_exterior = '".$parametros[3]."', no_interior = '".$parametros[4]."', colonia = '".$parametros[5]."', municipio = '".$parametros[6]."', horario_trabajo = '".$parametros[7]."', latitud_longitud = '".$parametros[8]."', uso_actual = '".$parametros[9]."', telefono = '".$parametros[10]."', cuenta_catastral = '".$parametros[11]."', manzana = '".$parametros[12]."', lote = '".$parametros[13]."', servicios_existentes = '".$parametros[14]."' WHERE id = $parametros[0]";

	$result = querys($sql);

	return $result;
}

function update_dimensiones($parametros)
{
	$sql = "UPDATE dimensiones_establecimiento SET frente = '".$parametros[1]."', fondo = '".$parametros[2]."', derecho = '".$parametros[3]."', izquierdo = '".$parametros[4]."', sup_local = '".$parametros[5]."', cuenta_predial = '".$parametros[6]."', WHERE id = $parametros[0]";

	$result = querys($sql);

	return $result;
}