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

function fill_pfisica_rfc($rfc)
{
	$result = get_pfisica_rfc($rfc);

	return $result;
}
?>