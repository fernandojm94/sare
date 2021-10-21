<?php
$expediente = $_POST['id_expediente'];
$ruta = "../../assets/expedientes/".$_POST['folio']."/docs/documentacion/";
$documento = $ruta.'/'.basename($_FILES['dropFileInput']['name']);

if(!is_dir($ruta)){
	mkdir($ruta);
}
if(move_uploaded_file($_FILES['dropFileInput']['tmp_name'], $documento))
{
	$mensaje = "correcto";
}else{
	$mensaje = "error6";
}




echo $mensaje;