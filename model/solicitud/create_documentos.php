<?php
	
		$folio = "SARE/".date("Y/m/d H:m:s");	
	
	
	$docs =str_replace(' ', '-', str_replace(':', '-',str_replace('/', '-', $folio)));	
	$ruta = "../../assets/expedientes/".$docs."/docs/documentacion";
	if(!is_dir($ruta))
	{
		if(!mkdir($ruta,0777, true))
		{
			echo "Fallo la creacion de carpeta";
		}		
	}
	if(isset($_FILES['titulo']))
	{
		$archivo = $ruta.'/'.basename($_FILES['titulo']['name']);
		$origi = $_FILES['titulo']['tmp_name'];		
	}
	if(isset($_FILES['pred']))
	{
		$archivo = $ruta.'/'.basename($_FILES['pred']['name']);
		$origi = $_FILES['pred']['tmp_name'];		
	}
	if(isset($_FILES['ine']))
	{
		$archivo = $ruta.'/'.basename($_FILES['ine']['name']);
		$origi = $_FILES['ine']['tmp_name'];
	}
	if(isset($_FILES['contrato']))
	{
		$archivo = $ruta.'/'.basename($_FILES['contrato']['name']);
		$origi = $_FILES['contrato']['tmp_name'];
	}
	if(isset($_FILES['no']))
	{
		$archivo = $ruta.'/'.basename($_FILES['no']['name']);
		$origi = $_FILES['no']['tmp_name'];
	}
	if(isset($_FILES['cp_no']))
	{
		$ruta_pago = "../../assets/expedientes/".$docs."/docs/pagos";
		if(!is_dir($ruta_pago))
		{
			if(!mkdir($ruta_pago,0777, true))
			{
				echo "Fallo la creacion de carpeta";
			}		
		}
		$archivo = $ruta_pago.'/'.basename($_FILES['cp_no']['name']);
		$origi = $_FILES['cp_no']['tmp_name'];
	}
	if(isset($_FILES['acta']))
	{
		$archivo = $ruta.'/'.basename($_FILES['acta']['name']);
		$origi = $_FILES['acta']['tmp_name'];
	}
	if(isset($_FILES['poder']))
	{
		$archivo = $ruta.'/'.basename($_FILES['poder']['name']);
		$origi = $_FILES['poder']['tmp_name'];
	}
	if(isset($_FILES['solicitud']))
	{
		$archivo = $ruta.'/'.basename($_FILES['solicitud']['name']);
		$origi = $_FILES['solicitud']['tmp_name'];
	}
	if(move_uploaded_file($origi, $archivo))
		{
			$mensaje = "correcto";
		}else{
			$mensaje = "error";
		}

echo $mensaje.",".$folio;