<?php
	include('../../controller/pmoral/funciones_pmoral.php');
	$nombre_empresa = $_POST['nombre_empresa'];
	$fecha_constitucion = $_POST['fecha_constitucion'];	
	$telefono_pm = $_POST['telefono_pm'];
	$email_pm = $_POST['email_pm'];
	$nombre_rl = $_POST['nombre_rl'];
	$calle_rl = $_POST['calle_rl'];
	$no_ex_rl = $_POST['no_ex_rl'];
	$no_int_rl = $_POST['no_int_rl'];
	$colonia_rl = $_POST['colonia_rl'];
	$estado_rl = $_POST['estado_rl'];
	$municipio_rl = $_POST['municipio_rl'];
	$localidad_rl = $_POST['localidad_rl'];
	$cp_rl = $_POST['cp_rl'];
	$telefono_rl = $_POST['telefono_rl'];
	$email_rl = $_POST['email_rl'];
	$id = $_POST['id'];
		
	if(update_pmoral($fecha_constitucion, $telefono_pm, $email_pm, $nombre_rl, $calle_rl, $no_ex_rl, $no_int_rl, $colonia_rl, $estado_rl, $municipio_rl, $localidad_rl, $cp_rl, $telefono_rl, $email_rl, $id))
	{
		$mensaje = "correcto, ".$id;
	}else{
		$mensaje = "error2";
	}
	
	echo $mensaje;