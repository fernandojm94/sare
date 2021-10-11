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
	$sql = "UPDATE dg_establecimiento SET nombre_comercial = '".$parametros[2]."', calle = '".$parametros[3]."', no_exterior = '".$parametros[4]."', no_interior = '".$parametros[5]."', colonia = '".$parametros[6]."', municipio = '".$parametros[7]."', horario_trabajo = '".$parametros[10]."', uso_actual = '".$parametros[11]."', telefono = '".$parametros[12]."', cuenta_catastral = '".$parametros[13]."', manzana = '".$parametros[14]."', lote = '".$parametros[14]."', servicios_existentes = '".$parametros[15]."' WHERE id = $parametros[1]";

	$result = querys($sql);

	return $result;
}

function update_dimensiones($parametros)
{
	$sql = "UPDATE dimensiones_establecimiento SET frente = '".$parametros[2]."', fondo = '".$parametros[3]."', derecho = '".$parametros[4]."', izquierdo = '".$parametros[5]."',sup_terreno = '".$parametros[6]."', sup_local = '".$parametros[7]."', cuenta_predial = '".$parametros[8]."' WHERE id = $parametros[1]";

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