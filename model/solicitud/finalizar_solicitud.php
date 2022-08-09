<?php
include('../../controller/solicitud/funciones_solicitud.php');
$data = explode(",", $_POST['img_map']);	
$data_64 = base64_decode($data[1]);	
$data = getImageSizeFromString($data_64);
$docs =str_replace(' ', '-', str_replace(':', '-',str_replace('/', '-', $_POST['folio'])));	
$ruta_img = "../../assets/expedientes/".$docs."/docs/mapa.".substr($data['mime'], 6);
$id_persona = $_POST['id_per'];
$id_dg = $_POST['id_dg'];
$id_dimensiones = $_POST['id_dim'];
$noficial = $_POST['check_num'];
$tipo_persona = 0;
if ($_POST['tipo_persona'] == 'p_moral') 
{
		$tipo_persona = 1;
}

$id_expediente = create_expediente($docs, $tipo_persona, $id_persona, $id_dg, $id_dimensiones, $noficial);
if($id_expediente)
{
	if(create_ventanilla_id($id_expediente))
	{
	$mensaje = "correcto";
	}else{
		$mensaje = "error";
	}
}else{
	$mensaje = "error";
}
echo $mensaje;