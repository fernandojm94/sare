<?php
include('../../controller/pfisica/funciones_pfisica.php');
	
	$calle = $_POST['calle'];
	$exterior = $_POST['no_ex'];
	$interior = $_POST['no_int'];
	$colonia = $_POST['colonia'];
	$municipio = $_POST['municipio'];
	$localidad = $_POST['localidad'];
	$estado = $_POST['estado'];
	$cp = $_POST['cp'];	
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
	$id = $_POST['id'];

	if(update_pfisica($calle, $exterior, $interior, $colonia, $municipio, $localidad, $estado, $cp, $telefono, $email, $id))
	{
		$mensaje = "correcto, ".$id;
	}else{
		$mensaje = "error2";
	}	
	

	echo $mensaje;