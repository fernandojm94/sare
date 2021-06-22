<?php

$ruta = "../../assets/expedientes/".$_POST['folio']."/docs/anexos/";
$anexo = $ruta.'/'.basename($_FILES['anexo']['name']);
if(!is_dir($ruta))
{
	mkdir($ruta,0777, true);
}
	
if(move_uploaded_file($_FILES['anexo']['tmp_name'], $anexo))
{
	$mensaje = "correcto";
}else{
	$mensaje = "error6";
}

echo $mensaje;