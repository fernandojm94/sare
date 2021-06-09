<?php
	include('../../controller/solicitud/funciones_solicitud.php');
	$expediente = $_POST['id'];
	//echo $usuario = $_POST['usuario'];
	$adicional_1 = $_POST['adicional_1'];
	$adicional_2 = $_POST['adicional_2'];
	$etapa = $_POST['etapa'];
	$status = $_POST['status'];
	$tipo_usuario = $_POST['tipo_usuario'];
	$id_usuario = $_POST['id_usuario'];
	$director = $_POST['director'];
	$ruta = "../../assets/expedientes/".$_POST['ruta']."/docs/";
	$resuelto = $recibe = "";

	switch ($etapa) {			
			case '2':
				$resuelto = "ventanilla";
				$recibe = "pagos";
				$etapa = 3;
				if(create_historico_pago($expediente, $adicional_2))
				{
					$mensaje = "correcto";
				}else{
					$mensaje = "error5";
				}
				break;
			case '4':
				$resuelto = "suelo";
				$recibe = "director";
				$etapa = 5;
				create_html($ruta, $adicional_1, $adicional_2, $resuelto);
				break;
			case '5':
				$resuelto = "director";
				$recibe = "secretario";
				$etapa = 6;
				create_html($ruta, $adicional_1, $adicional_2, $resuelto);
				if($director)
				{
					$resuelto = "secretario";
					$recibe = "";
					$etapa = 7;
					if(aprobar_expediente($expediente, $status, $id_usuario, $tipo_usuario))
					{
						$mensaje = "correcto";
					}else{
						$mensaje = "error4";
					}
				}
				break;
			case '6':
				$resuelto = "secretario";
				$recibe = "";
				$etapa = 7;
				create_html($ruta, $adicional_1, $adicional_2, $resuelto);
				if(aprobar_expediente($expediente, $status, $id_usuario, $tipo_usuario))
				{
					$mensaje = "correcto";
				}else{
					$mensaje = "error4";
				}
				break;
		}	

		if($status)
		{
			if(update_expediente($expediente, $etapa))
			{
				$mensaje = "correcto";
			}else{
				$mensaje = "error1";
			}
		}else{
			if(rechaza_expediente($expediente, $status))
			{
				$mensaje = "correcto";
			}else{
				$mensaje = "error1";
			}
		}

		if($resuelto != "")
		{
			if(update_resuelto_etapa($status, $resuelto, $expediente))
			{
				$mensaje = "correcto";
			}else{
				$mensaje = "error2";
			}	
		}

		if($recibe != "")
		{
			if(create_etapa($recibe, $expediente))
			{
				$mensaje = "correcto";
			}else{
				$mensaje = "error3";
			}	
		}


echo $mensaje;

function create_html($ruta, $adicional_1, $adicional_2, $nombre)
{
	if (file_exists($ruta.$nombre.".txt"))
	{
		$archivo = fopen($ruta.$nombre.".txt", "a");		
	}else{
		$archivo = fopen($ruta.$nombre.".txt", "w");
	}
	 fwrite($archivo, PHP_EOL ."$adicional_1");
	fclose($archivo);

	if (file_exists($ruta."observaciones.txt"))
	{
		$archivo = fopen($ruta."observaciones.txt", "a");		
	}else{
		$archivo = fopen($ruta."observaciones.txt", "w");
	}
	 fwrite($archivo, PHP_EOL ."$adicional_2");
	fclose($archivo);
}