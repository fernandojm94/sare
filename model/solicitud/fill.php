<?php
include('../../controller/solicitud/funciones_solicitud.php');

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

function fill_pendientes($solicitudes)
{
	$tr_pendientes = "";

	foreach ($solicitudes as $solicitud) 
	{	
		$comprobante = "";
		if($solicitud['status'] == 0)
		{
			$status = "1. Pendiente de pago";
			$comprobante = '<a class="btn btn-xs btn-success" onclick="fill_modal_upcomprobante('.$solicitud['id'].')" role="button" data-toggle="modal">
														<i class="ace-icon fa fa-upload bigger-130"></i>
													</a>';
		}
		if($solicitud['status'] == 1)
		{
			$status = "2. En revisión";
		}
		if($solicitud['status'] == 3)
		{
			$status = "3. Rechazado";
		}
		$tr_pendientes.='
							<tr>
											<td class="hidden"></td>
											<td>'.$solicitud['fecha_apertura'].'</td>
											<td>'.$solicitud['nombre_comercial'].'</td>
											<td class="hid_xs">
												'.$solicitud['domicilio'].'
											</td> 
											<td class="hid_xs">'.$solicitud['telefono'].'</td>
											<td class="center"><span class="label label-warning arrowed-right">'.$status.'</span></td>
											<td class="center">
												<div class="btn-group">
													<a class="btn btn-xs btn-info" onclick="fill_modal_info('.$solicitud['id'].')" role="button" data-toggle="modal">
														<i class="ace-icon fa fa-info-circle bigger-130"></i>
													</a>
													'.$comprobante.'
												</div>
											</td>
										</tr>
						';
	}
	return $tr_pendientes;
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
?>