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
	$sql = "UPDATE dg_establecimiento SET nombre_comercial = '".$parametros[2]."', calle = '".$parametros[3]."', no_exterior = '".$parametros[4]."', no_interior = '".$parametros[5]."', colonia = '".$parametros[6]."', municipio = '".$parametros[7]."', horario_trabajo = '".$parametros[8]."', latitud_longitud = '".$parametros[9]."', uso_actual = '".$parametros[10]."', telefono = '".$parametros[11]."', cuenta_catastral = '".$parametros[12]."', manzana = '".$parametros[13]."', lote = '".$parametros[14]."', servicios_existentes = '".$parametros[15]."' WHERE id = $parametros[1]";

	$result = querys($sql);

	return $result;
}

function update_dimensiones($parametros)
{
	$sql = "UPDATE dimensiones_establecimiento SET frente = '".$parametros[1]."', fondo = '".$parametros[2]."', derecho = '".$parametros[3]."', izquierdo = '".$parametros[4]."', sup_local = '".$parametros[5]."', cuenta_predial = '".$parametros[6]."', WHERE id = $parametros[0]";

	$result = querys($sql);

	return $result;
}

function reinicia_expediente($parametros)
{
	$sql = "UPDATE expedientes SET fecha_apertura = now(), etapa = 2, status = 0 WHERE id = $parametros[0]";
	$sql.= "UPDATE director  SET status IS NULL, recibido IS NULL, visto IS NULL, resuelto IS NULL WHERE id_expediente = $parametros[0]";
	$sql.= "UPDATE pagos  SET status IS NULL, recibido IS NULL, visto IS NULL, resuelto IS NULL WHERE id_expediente = $parametros[0]";
	$sql.= "UPDATE secretario  SET status IS NULL, recibido IS NULL, visto IS NULL, resuelto IS NULL WHERE id_expediente = $parametros[0]";
	$sql.= "UPDATE suelo  SET status IS NULL, recibido IS NULL, visto IS NULL, resuelto IS NULL WHERE id_expediente = $parametros[0]";
	$sql.= "UPDATE ventanilla  SET status IS NULL, recibido IS NULL, visto IS NULL, resuelto IS NULL WHERE id_expediente = $parametros[0]";

	$result = querys($sql);

	return $result;
}