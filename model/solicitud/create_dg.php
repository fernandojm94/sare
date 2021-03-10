<?php
	include('../../controller/solicitud/funciones_solicitud.php');
	
	$nombre_comercial = $_POST['nombre_comercial'];
	$horario_trabajo = $_POST['horario_trabajo'];
	$calle_dg = $_POST['calle_dg'];
	$no_ex_dg = $_POST['no_ex_dg'];
	$no_int_dg = $_POST['no_int_dg'];
	$colonia_dg = $_POST['colonia_dg'];
	$entre_calles = $_POST['entre_calles'];
	$municipio_dg = $_POST['municipio_dg'];
	$localidad_dg = $_POST['localidad_dg'];
	$cp_dg = $_POST['cp_dg'];
	$latlong = $_POST['latlong'];
	$telefono_dg = $_POST['telefono_dg'];
	$uso = $_POST['uso'];
	$scian = $_POST['scian'];
	$catastral = $_POST['catastral'];
	$manzana = $_POST['manzana'];
	$lote = $_POST['lote'];
	$distancia_esquina = $_POST['distancia_esquina'];
	$cajones = $_POST['cajones'];
	$inversion = $_POST['inversion'];
	$personal_ocupado = $_POST['personal_ocupado'];
	$servicios_chosen = $_POST['servicios'];
	if(create_dg_establecimiento($nombre_comercial, $horario_trabajo, $calle_dg, $no_ex_dg, $no_int_dg, $colonia_dg, $entre_calles, $municipio_dg, $localidad_dg, $cp_dg, $latlong, $telefono_dg, $uso, $scian, $catastral, $manzana, $lote, $distancia_esquina, $cajones, $inversion, $personal_ocupado, $servicios_chosen))
	{
		$mensaje = "correcto";
	}else{
		$mensaje = "error1";
	}

	echo $mensaje;
?>