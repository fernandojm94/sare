<?php
include('../../controller/solicitud/funciones_solicitud.php');
$expediente = $_POST['id_expediente'];
$ruta = "../../assets/expedientes/".$_POST['folio']."/docs";
$comprobante = $ruta.'/'.basename($_FILES['comprobante']['name']);
$status = 1;
$resuelto = "pagos";
$recibe = "suelo";
$etapa = 4;


if(update_expediente($expediente, $etapa))
{
	$mensaje = "correcto";
}else{
	$mensaje = "error1";
}

if($resuelto != "")
{
	if(update_resuelto_etapa($status, $resuelto, $expediente))
	{
		$mensaje = "correcto";
	}else{
		$mensaje = "error2";
	}	
}

if($recibe != "")
{
	if(create_etapa($recibe, $expediente))
	{
		$mensaje = "correcto";
	}else{
		$mensaje = "error3";
	}	
}

if(move_uploaded_file($_FILES['comprobante']['tmp_name'], $comprobante))
{
	echo "si";
	$mensaje = "correcto";
}else{
	$mensaje = "error6";
}




echo $mensaje;