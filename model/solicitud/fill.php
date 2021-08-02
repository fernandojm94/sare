<?php
include('../../controller/solicitud/funciones_solicitud.php');
include('../../controller/giros/funciones_giros.php');

function fill_pfisica()
{
	$pfisicas = get_nombre_rfc_pfisica();
	
	$result = "[";
	foreach ($pfisicas as $pfisica) 
	{		
		$result.="'".$pfisica['nombre_completo']."-".$pfisica['rfc']."',";
	}
	$result.="]";
	$result = str_replace(',]', ']', $result);

	return $result;
}

function fill_pmoral()
{
	$pmorales = get_nombre_rfc_pmoral();

	$result = '[';
	foreach ($pmorales as $pmoral) 
	{		
		$result.="'".$pmoral['nombre_empresa']."-".$pmoral['rfc_empresa']."',";
	}
	$result.="]";
	$result = str_replace(",]", "]", $result);

	return $result;
}

function fill_pmoral_rfc($rfc)
{
	$result = get_pmoral_rfc($rfc);

	return $result;
}

function fill_pfisica_rfc($rfc)
{
	$result = get_pfisica_rfc($rfc);

	return $result;
}

function pendientes()
{
	$result = get_pendientes();

	return $result;
}

function atendidas()
{
	$result = get_atendidas();

	return $result;
}

function atendidas_etapa($etapa)
{
	switch ($etapa) {
		case '2':
			$tabla = "ventanilla";
			break;
		case '4':
			$tabla = "suelo";
			break;
		case '5':
			$tabla = "director";
			break;
		case '6':
			$tabla = "secretario";
			break;
	}
	$join = "JOIN ".$tabla." AS e ON e.id_expediente = r.id AND e.`status` != 0";
	$result = get_atendidas_etapa($join);

	return $result;
}

function pendientes_etapa($etapa)
{
	if($etapa == 2)
	{
		$etapa = "etapa = 2 OR etapa = 3";
	}elseif($etapa == 1){
		$etapa = $etapa;
	}elseif($etapa == 8){
		$etapa = "etapa BETWEEN 4 AND 7";
	}else{
		$etapa = "etapa = ".$etapa;
	}
	
	$result = get_pendientes_etapa($etapa);

	return $result;
}

function fill_solicitudes($solicitudes, $pantalla)
{	
	$tr_pendientes = $primero ="";

	foreach ($solicitudes as $solicitud) 
	{	
		$comprobante = "";
		$informe = "";
		$etapaa= $solicitud['status'];

		$info_btn = '<a class="btn btn-xs btn-info" '.$etapaa.' onclick="fill_modal_info('.$solicitud['id'].','.$solicitud['etapa'].')" role="button" data-toggle="modal">
						<i class="ace-icon fa fa-info-circle bigger-130"></i>
					</a>';
		if ($pantalla == 1 AND $solicitud['etapa'] == 3) 
		{
					$comprobante = '<a class="btn btn-xs btn-success" onclick="fill_modal_upcomprobante('.$solicitud['id'].')" role="button" data-toggle="modal">
									<i class="ace-icon fa fa-upload bigger-130"></i>
								</a>';	
		}

		if ($pantalla == 8 AND $solicitud['etapa'] != 1  AND $solicitud['status'] != 2)
		{
			$comprobante = '<a class="btn btn-xs btn-success" onclick="fill_modal_update_anexos('.$solicitud['id'].')" role="button" data-toggle="modal">
									<i class="ace-icon fa fa-upload bigger-130"></i>
								</a>';					
		}

		if ($solicitud['status'] == 1  && $pantalla != 1) 
		{
			$url = '../../pdf/sedatum/informe.php?id=';
			$id = $solicitud['id'];
			$informe= '<a title="Imprimir Informe" class="btn btn-xs btn-success" href="'.$url.$id.'" target="_blank" role="button">
						<i class="ace-icon fa fa-print bigger-130"></i>
					</a>';
		}

		if ($solicitud['status'] == 1  && $pantalla == 1) 
		{
			$url = '../../pdf/sare/licencia.php?id=';
			$id = $solicitud['id'];
			$informe= '<a title="Imprimir Informe" class="btn btn-xs btn-success" href="'.$url.$id.'" target="_blank" role="button">
						<i class="ace-icon fa fa-print bigger-130"></i>
					</a>';
		}

		switch ($solicitud['etapa']) 
		{
			case '2':

				$etapa = 'Ventanilla única';
				$label_e = "pink";
				break;
			
			case '3':
				$etapa = 'Pendiente de pago';
				$label_e = "warning";
				break;

			case '4':
				$etapa = 'Uso de suelo';
				$label_e = "yellow";
				break;

			case '5':
				$etapa = 'Dirección';
				$label_e = "primary";
				break;

			case '6':
				$etapa = 'Secretario';
				$label_e = "inverse";
				break;

			case '7':
				$etapa = 'Atendida';
				$label_e = "primary";
				break;

			default:
				$etapa = "Pendiente";
				$label_e = "danger";
				break;
		}
		
		if($solicitud['status'] == 0)
		{
			$status = "1. En Revisión";
			$label = "warning";			
		}
		if($solicitud['status'] == 1)
		{
			$status = "2. Aprobado";
			$label = "success";
		}
		if($solicitud['status'] == 2)
		{
			$status = "3. Rechazado";
			$label = "danger";
		}
		if($solicitud['etapa'] == 3)
		{
			valida_visto($solicitud['id'], $solicitud['etapa']);
			$primero.='
							<tr>
								<td>'.$solicitud['nombre_comercial'].'</td>
								<td>'.$solicitud['fecha_apertura'].'</td>
								<td class="hid_xs">
									'.$solicitud['domicilio'].'
								</td> 
								<td>'.$solicitud['telefono'].'</td>
								<td><span class="label label-'.$label_e.' arrowed-right">'.$etapa.'</span></td>
								<td class="center"><span class="label label-'.$label.' arrowed-right">'.$status.'</span></td>
								<td class="center">
									<div class="btn-group">
										'.$info_btn.'
										'.$comprobante.'
										'.$informe.'
									</div>
								</td>
							</tr>
						';

		}else{
			$tr_pendientes.='
							<tr>
								<td>'.$solicitud['nombre_comercial'].'</td>
								<td>'.$solicitud['fecha_apertura'].'</td>
								<td class="hid_xs">
									'.$solicitud['domicilio'].'
								</td> 
								<td>'.$solicitud['telefono'].'</td>
								<td><span class="label label-'.$label_e.' arrowed-right">'.$etapa.'</span></td>
								<td class="center"><span class="label label-'.$label.' arrowed-right">'.$status.'</span></td>
								<td class="center">
									<div class="btn-group">
										'.$info_btn.'
										'.$comprobante.'
										'.$informe.'
									</div>
								</td>
							</tr>
						';
		}	
	}
	return $primero.$tr_pendientes;
}

function fill_expediente($id)
{
	$expediente = get_expediente($id);

	return $expediente;
}

function fill_persona_moral($id)
{
	$persona_moral = get_pmoral($id);

	return $persona_moral;
}

function fill_persona_fisica($id)
{
	$persona_fisica = get_pfisica($id);

	return $persona_fisica;
}

function fill_establecimiento($id)
{
	$establecimiento = get_establecimiento($id);

	return $establecimiento;
}

function fill_dimensiones($id)
{
	$dimensiones = get_dimensiones($id);

	return $dimensiones;
}

function valida_visto($id, $etapa)
{	
	switch ($etapa) 
		{
			case '2':
				$tabla = "ventanilla";
				break;
			
			case '3':
				$tabla = "pagos";
				break;

			case '4':
				$tabla = "suelo";
				break;

			case '5':
				$tabla = "director";
				break;

			case '6':
				$tabla = "secretario";
				break;
		}
		$visto = get_visto($id, $tabla);
		
		if($visto)
		{
			update_visto($id, $tabla);
		}
}

function fill_giros()
{
	$giros = get_giros();
	return $giros;
}

function fill_options($giros)
{
	$options="";
	$options.="<option value=''></option>";
	foreach($giros as $giro){
		$options.= '<option value="'.$giro['giro'].'">'.$giro["giro"].'</option>';
	}

	return $options;
}

function fill_datos_generales($id_persona,$tipo_persona)
{
	if($tipo_persona)
	{
		$datos_generales = get_pmoral_separado($id_persona);
	}else{
		$datos_generales = get_pfisica_separado($id_persona);
	}
	return $datos_generales;
}

function fill_establecimiento_separado($id)
{
	$establecimiento = get_establecimiento_separado($id);

	return $establecimiento;
}
?>
