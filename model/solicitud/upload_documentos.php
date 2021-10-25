<?php

$expediente = $_POST['folio_docs'];
$ruta = "../../assets/expedientes/".$expediente."/docs/documentacion";

if(!is_dir($ruta)){
	mkdir($ruta);
}

foreach($_FILES as $key => $doc)
{		
	$documento = $ruta.'/'.basename($doc['name']);
	if(move_uploaded_file($doc['tmp_name'], $documento))
	{
		$mensaje = "correcto";
	}else{
		$mensaje = "error";
	}
}

echo $mensaje;