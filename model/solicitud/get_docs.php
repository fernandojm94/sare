<?php
	include('../../model/solicitud/fill.php');
	$id = $_POST['id']; 
	$archivos = $documentos = "";
	$expediente = fill_expediente($id);
	$folio_str= str_replace(array("/", " ",":"),array("-","-","-"),$expediente['folio']);
	$ruta = '../../assets/expedientes/'.$folio_str.'/docs';

	if(is_dir($ruta))
	{
		$archivos = scandir($ruta);
		echo json_encode($archivos);
	}
?>