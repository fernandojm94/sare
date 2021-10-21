<?php
$expediente = $_POST['folio_docs'];
$ruta = "../../assets/expedientes/".$expediente."/docs/documentacion";
$documento = $ruta.'/'.basename($_FILES['dropFileInput']['name']);

if(!is_dir($ruta)){
	mkdir($ruta);
}
if(move_uploaded_file($_FILES['dropFileInput']['tmp_name'], $documento))
{
	$mensaje = "correcto";
}else{
	$mensaje = "error";
}




echo $mensaje;