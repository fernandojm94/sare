<?php
	include('../../model/solicitud/fill.php');
	$id = $_POST['id']; 
	$documentos[] = "";
	$complentento = "";
	$expediente = fill_expediente($id);
	$folio_str= str_replace(array("/", " ",":"),array("-","-","-"),$expediente['folio']);
	$rutas[0] = '../../assets/expedientes/'.$folio_str.'/docs/documentacion';
	$rutas[1] = '../../assets/expedientes/'.$folio_str.'/docs/pagos';
	$rutas[2] = '../../assets/expedientes/'.$folio_str.'/docs/anexos';
	$i = 0;
	$tipo =0;
	foreach ($rutas as $ruta)
	{		
		if(is_dir($ruta))
		{
			$archivos = scandir($ruta);
			foreach ($archivos as $archivo ) 
			{
				if($archivo !== "." AND $archivo !== "..")
				{	
					switch ($tipo) 
					{
						case '0':
							$complentento = "d,";
							break;

						case '1':
							$complentento = "p,";
							break;

						case '2':
							$complentento = "a,";
							break;										
					}				
					
					$documentos[$i] = $complentento.$archivo;
					$i++;
				}			
			}
		}
		$tipo++;
	}
	echo json_encode($documentos);