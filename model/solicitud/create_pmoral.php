<?php
	include('../../controller/pmoral/funciones_pmoral.php');

	$nombre_empresa = $_POST['nombre_empresa'];
	$fecha_constitucion = $_POST['fecha_constitucion'];
	$rfc_pm = $_POST['rfc_pm'];
	$telefono_pm = $_POST['telefono_pm'];
	$email_pm = $_POST['email_pm'];
	$nombre_rl = $_POST['nombre_rl'];
	$rfc_rl = $_POST['rfc_rl'];
	$curp_rl = $_POST['curp_rl'];
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

	if(compare_pmoral($nombre_empresa, $rfc_pm))
	{
		$mensaje = "correcto";
	}else{
		if(create_pmoral($nombre_empresa, $fecha_constitucion, $rfc_pm, $telefono_pm, $email_pm, $nombre_rl, $rfc_rl, $curp_rl, $calle_rl, $no_ex_rl, $no_int_rl, $colonia_rl, $estado_rl, $municipio_rl, $localidad_rl, $cp_rl, $telefono_rl, $email_rl))
		{
			$mensaje = "correcto";
		}else{
			$mensaje = "error2";
		}
	}
	echo $mensaje;
?>