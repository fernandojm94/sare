<?php

	$archivo = $_POST['nombre_archivo'];
	$expediente = $_POST['nivel-1'];
	$carpeta = $_POST['nivel-3'];
	$ruta = "../../assets/expedientes/".$expediente."/docs/".$carpeta."/".$archivo;
	if(unlink($ruta))
	{
		$mensaje = "correcto";
	}else{
		$mensaje = "error";
	}

	echo $mensaje;
?>