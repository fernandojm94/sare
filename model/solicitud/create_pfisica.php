<?php
	include('../../controller/pfisica/funciones_pfisica.php');
	
	$nombre = $_POST['nombre'];
	$calle = $_POST['calle'];
	$exterior = $_POST['no_ex'];
	$interior = $_POST['no_int'];
	$colonia = $_POST['colonia'];
	$municipio = $_POST['municipio'];
	$localidad = $_POST['localidad'];
	$cp = $_POST['cp'];
	$rfc = $_POST['rfc'];
	$curp = $_POST['curp_fis'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];

	if(compare_pfisica($nombre, $rfc, $curp, $telefono))
	{
		$mensaje = "correcto";
	}else{
		if(create_pfisica($nombre, $calle, $exterior, $interior, $colonia, $municipio, $localidad, $cp, $rfc, $curp, $telefono, $email))
		{
			$mensaje = "correcto";
		}else{
			$mensaje = "error2";
		}	
	}

	echo $mensaje;
?>