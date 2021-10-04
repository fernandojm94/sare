<?php
	include("../../controller/solicitud/funciones_update_solicitud.php");
	
	$etapa = $_POST['etapa'];
	$parametros= $_POST['parametros'];//0:persona_fisica; 1:persona_moral
	switch ($etapa) {
		case 'dg':			
			if($parametros[0] == 1)
			{
				if(update_pmoral($parametros))
				{
					$mensaje = "correcto";
				}else{
					$mensaje = "error1";
				}
			}else{
				if(update_pfisica($parametros))
				{
					$mensaje = "correcto";
				}else{
					$mensaje = "error1";
				}
			}
			break;
		case 'de':
			if(update_dg_establecimiento($parametros))
			{
				$mensaje = "correcto";
			}else{
				$mensaje = "error2";
			}
			break;
		case 'dim':
				if(update_dimensiones($parametros))
			{
				$mensaje = "correcto";
			}else{
				$mensaje = "error3";
			}
			break;
		case 're':
			if(reinicia_expediente($parametros))
			{
				$mensaje = "correcto";
			}else{
				$mensaje = "error4";
			}
			break;
	}


	echo $mensaje;