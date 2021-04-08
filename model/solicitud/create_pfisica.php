<?php
	include('../../controller/pfisica/funciones_pfisica.php');

	$nombre = explode('-', $_POST['nombre']);
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
	$id = $_POST['id'];

	if(compare_pfisica($nombre[0], $rfc, $curp, $telefono))
	{
		$mensaje = "correcto,".$id;
	}else{
		$id = create_pfisica($nombre[0], $calle, $exterior, $interior, $colonia, $municipio, $localidad, $cp, $rfc, $curp, $telefono, $email);
		if($id)
		{
			$mensaje = "correcto,".$id;
		}else{
			$mensaje = "error2";
		}	
	}

	echo $mensaje;
?>