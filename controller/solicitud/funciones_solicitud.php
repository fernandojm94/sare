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
	$sql = "SELECT id, nombre_completo, calle, no_exterior, no_interior, colonia, municipio, localidad, estado, c_p, rfc, curp, telefono, email
				FROM personas_fisicas
				WHERE  rfc = '".$rfc."'";
	$result = query_row_id($sql);

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

function create_dg_establecimiento($nombre_comercial, $horario_trabajo, $calle_dg, $no_ex_dg, $no_int_dg, $colonia_dg, $entre_calles, $municipio_dg, $localidad_dg, $cp_dg, $latlong, $telefono_dg, $uso, $uso_sol, $scian, $catastral, $manzana, $lote, $distancia_esquina, $cajones, $inversion, $personal_ocupado, $servicios_chosen)
{
$sql= "INSERT INTO dg_establecimiento(nombre_comercial, horario_trabajo, calle, no_exterior, no_interior, colonia, entre_calles, municipio, localidad, cp, latitud_longitud, telefono, uso_actual, uso_solicitado, giro_scian, cuenta_catastral, manzana, lote, distancia_esquina, cajones_estacionamiento, monto_inversion, pesonal_ocupado, servicios_existentes) 
			VALUES ('".$nombre_comercial."', '".$horario_trabajo."', '".$calle_dg."', ".$no_ex_dg.", '".$no_int_dg."', '".$colonia_dg."', '".$entre_calles."', '".$municipio_dg."', '".$localidad_dg."', ".$cp_dg.", '".$latlong."', '".$telefono_dg."', '".$uso."', '".$uso_sol."', '".$scian."', '".$catastral."', '".$manzana."', '".$lote."', '".$distancia_esquina."', '".$cajones."', '".$inversion."', '".$personal_ocupado."', '".$servicios_chosen."')";

	$result = query_last_id($sql);

	return $result;
}

function create_dimensiones_establecimiento($frentel, $fondo, $derecho, $izquierdo, $delterreno, $dellocal, $predial)
{
	$sql = "INSERT INTO dimensiones_establecimiento(frente, fondo, derecho, izquierdo, sup_terreno, sup_local, cuenta_predial) 
				VALUES('".$frentel."', '".$fondo."', '".$derecho."', '".$izquierdo."', '".$delterreno."', '".$dellocal."', '".$predial."')";

	$result = query_last_id($sql);

	return $result;
}
function create_expediente($folio, $tipo_persona, $id_persona, $id_dg, $id_dimensiones, $noficial)
{
	$sql = "INSERT INTO expedientes(folio, fecha_apertura, tipo_persona, id_persona, id_dg_establecimiento, id_dimensiones_establecimiento, etapa, status, solicita_noficial)
					VALUES('".$folio."',now(),".$tipo_persona.", ".$id_persona.", ".$id_dg.", ".$id_dimensiones.", 2, 0, ".$noficial.")";
	$result = query_last_id($sql);

	return $result;
}

function get_atendidas()
{
	$sql ="SELECT id, fecha_apertura, nombre_comercial, domicilio, telefono, status, etapa
				FROM resueltas
			WHERE 1 ORDER BY id DESC";

	$result = querys($sql);

	return $result;
}

function get_atendidas_etapa($join)
{
	 $sql ="SELECT r.id, r.fecha_apertura, r.nombre_comercial, r.domicilio, r.telefono, e.status, r.etapa
				FROM resueltas AS r
			".$join."
			WHERE 1 ORDER BY id DESC";

	$result = querys($sql);

	return $result;
}

function get_pendientes()
{
	$sql = "SELECT id, fecha_apertura, nombre_comercial, domicilio, telefono, status
				FROM pendientes
			WHERE 1";

	$result = querys($sql);

	return $result;
}

function get_pendientes_etapa($etapa)
{
	$sql = "SELECT id, fecha_apertura, nombre_comercial, domicilio, telefono, status, etapa
				FROM pendientes
			WHERE ".$etapa;

	$result = querys($sql);

	return $result;
}

function get_expediente($id)
{
	$sql = "SELECT folio,folio_sedatum, fecha_apertura, tipo_persona, id_persona, id_dg_establecimiento, id_dimensiones_establecimiento, solicita_noficial, status
					FROM expedientes
			WHERE id = $id";

	$result = query_row_id($sql);

	return $result;
}

function get_pmoral($id)
{
	$sql = "SELECT id, nombre_empresa AS nombre, fecha_constitucion, rfc_empresa, email_empresa, telefono_empresa, nombre_rl, rfc_rl AS rfc, curp, CONCAT(calle, ' ',  no_exterior, ' ', no_interior, ' ', colonia, ' ', estado) AS domicilio,  municipio, localidad, cp, telefono_rl As telefono, email_rl AS email
				FROM personas_morales
				WHERE  id = '".$id."'";
	$result = query_row_id($sql);

	return $result;
}

function  get_pfisica($id)
{
	$sql = "SELECT id, nombre_completo AS nombre,CONCAT(calle, ' ', no_exterior, ' ', no_interior, ' ', colonia, ' ', municipio, ' ', localidad, ' ') AS domicilio, c_p, rfc, curp, telefono, email
				FROM personas_fisicas
				WHERE  id = '".$id."'";
	$result = query_row_id($sql);

	return $result;
}

function get_establecimiento($id)
{
	$sql = "SELECT nombre_comercial, horario_trabajo, CONCAT(calle, ' ', no_exterior, ' ', no_interior, ' ', colonia) AS domicilio, entre_calles, municipio, localidad, cp, latitud_longitud, telefono, uso_actual, giro_scian, cuenta_catastral, manzana, lote, distancia_esquina, cajones_estacionamiento, monto_inversion, pesonal_ocupado, servicios_existentes
				FROM dg_establecimiento
			WHERE id = $id";

	$result = query_row_id($sql);

	return $result;
}

function get_dimensiones($id)
{
	$sql = "SELECT frente, fondo, derecho, izquierdo, sup_terreno, sup_local, cuenta_predial
				FROM dimensiones_establecimiento
			WHERE id = $id";

	$result = query_row_id($sql);

	return $result;
}

function update_expediente($id, $etapa)
{
	$sql = "UPDATE expedientes SET etapa = $etapa 
				WHERE id = $id";

	$result = querys($sql);

	return $result;
}

function create_etapa($etapa, $id_expediente)
{
	$sql = "INSERT INTO ".$etapa." (id_expediente, recibido)
					VALUES ($id_expediente, now())";
	
	$result = querys($sql);
	
	return $result;	
}

function update_visto_etapa($etapa, $id_expediente)
{
	$sql = "UPDATE ".$etapa." SET visto = now()
			WHERE id_expediente = $id_expediente";

	$result = querys($sql);

	return$result;
}

function update_resuelto_etapa($status, $etapa, $id_expediente)
{
	$sql = "UPDATE ".$etapa." SET status = ".$status.", resuelto = now()
			WHERE id_expediente = $id_expediente";

	$result = querys($sql);

	return $result;
}

function rechaza_expediente($id, $status)
{
	$sql = "UPDATE expedientes SET status = ".$status." 
			WHERE id = $id";

	$result = querys($sql);

	return $result;
}

function aprobar_expediente($id, $status, $id_usuario, $tipo_usuario)
{
	$sql = "UPDATE expedientes SET status = $status, id_usuario = $id_usuario, tipo_usuario = $tipo_usuario
			WHERE id = $id";

	$result = querys($sql);

	return $result;
}

function create_historico_pago($id_expediente, $pago)
{
	$sql = "INSERT INTO historico (id_expediente, pago, fecha)
					VALUES(".$id_expediente.", ".$pago.", now())";

	$result = querys($sql);

	return $result;
}

function get_visto($id, $tabla)
{
	$sql = "SELECT id 
				FROM ".$tabla."
			WHERE id_expediente = $id AND visto IS NULL";

	$result = query_num_rows($sql);

	return $result;

}

function update_visto($id, $tabla)
{
	$sql = "UPDATE ".$tabla." SET visto = now() WHERE id_expediente = ".$id;

	$result = querys($sql);

	return $result; 
}

function get_pmoral_separado($id_persona)
{
	$sql = "SELECT id, nombre_empresa AS nombre, fecha_constitucion, rfc_empresa, email_empresa, telefono_empresa, nombre_rl, rfc_rl AS rfc, curp, calle, no_exterior, no_interior, colonia, estado, municipio, localidad, cp AS c_p, telefono_rl As telefono, email_rl AS email
				FROM personas_morales
				WHERE  id = '".$id_persona."'";
	$result = query_row_id($sql);

	return $result;
}

function get_pfisica_separado($id)
{
	$sql = "SELECT id, nombre_completo AS nombre, calle, no_exterior, no_interior, colonia, municipio, localidad, estado, c_p, rfc, curp, telefono, email
				FROM personas_fisicas
				WHERE  id = '".$id."'";
	$result = query_row_id($sql);

	return $result;
}

function get_establecimiento_separado($id)
{
	$sql = "SELECT nombre_comercial, horario_trabajo, calle, no_exterior, no_interior, colonia, entre_calles, municipio, localidad, cp, latitud_longitud, telefono, uso_actual, uso_solicitado, giro_scian, cuenta_catastral, manzana, lote, distancia_esquina, cajones_estacionamiento, monto_inversion, pesonal_ocupado, servicios_existentes
				FROM dg_establecimiento
			WHERE id = $id";

	$result = query_row_id($sql);

	return $result;
}


function get_ventanilla_id($id)
{
	$sql = " SELECT recibido
				FROM ventanilla
			 WHERE id_expediente = $id AND status = 1";

	$result = query_row_id($sql);

	return $result;
}

function create_ventanilla_id($id)
{
	$sql = "INSERT INTO ventanilla (id_expediente, recibido)
				VALUES ($id, NOW())";

	$result = querys($sql);

	return $result;
}

function creater_folio_sedatum($expediente, $folio_sedatum)
{
	$sql = "UPDATE expedientes SET folio_sedatum = '".$folio_sedatum."' WHERE id = ".$expediente;
	$result = querys($sql);
	return $result;
}