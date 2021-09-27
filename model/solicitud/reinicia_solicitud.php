<?php
	include("../../controller/solicitud/funciones_update_solicitud.php");
	$etapa = $_POST['etapa'];
	$parametros[]= $_POST['parametros'];
	switch ($etapa) {
		case 'dg':			
			if($parametros[0] == 1)
			{
				if(update_pmoral($parametros[]))
				{
					$mensaje = "correcto";
				}else{
					$mensaje = "error1";
				}
			}else{
				if(update_pfisica($parametros[]))
				{
					$mensaje = "correcto";
				}else{
					$mensaje = "error1";
				}
			}
		case 'de':
			if(update_dg_establecimiento($parametros[]))
			{
				$mensaje = "correcto";
			}else{
				$mensaje = "error2";
			}
			break;
		case 'dim':
				if(update_dimensiones($parametros[]))
			{
				$mensaje = "correcto";
			}else{
				$mensaje = "error3";
			}
			break;
	}

	echo $mensaje;