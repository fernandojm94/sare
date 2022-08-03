<?php

	var_dump($_FILES); 
	var_dump($_POST); 
		exit();

	include('../../controller/solicitud/funciones_solicitud.php');
	
	//VARIABLE DEL CHECK PARA SOLICITAR NÚMERO OFICIAL A SEDATUM
	//$check = $_POST['checkNumOficial'];//Manda la variable solo si está checada, de lo contrario no manda nada.
	//POSICIÓN DEL POST PARA EL COMPROBANTE --> $_POST['cp_no'];
	
	$folio = "SARE/".date("Y/m/d H:m:s");
	$docs =str_replace(' ', '-', str_replace(':', '-',str_replace('/', '-', $folio)));	
	$data = explode(",", $_POST['img_map']);	
	$data_64 = base64_decode($data[1]);	
	$data = getImageSizeFromString($data_64);
	$ruta_img = "../../assets/expedientes/".$docs."/docs/mapa.".substr($data['mime'], 6);	
	

	$id_persona = $_POST['id_per'];
	$id_dg = $_POST['id_dg'];
	$id_dimensiones = $_POST['id_dim'];
	$ruta = "../../assets/expedientes/".$docs."/docs/documentacion";
	$titulo = $ruta.'/'.basename($_FILES['titulo']['name']);
	$predia = $ruta.'/'.basename($_FILES['pred']['name']);
	$ine = $ruta.'/'.basename($_FILES['ine']['name']);
	$contrato = $ruta.'/'.basename($_FILES['contrato']['name']);
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
		$cp_no = $ruta_pago.'/'.basename($_FILES['cp_no']['name']);
	}
	$noficial = $ruta.'/'.basename($_FILES['no']['name']);
	$noficial = $id_expediente = 0; 
	if(isset($_POST['checkNumOficial']))
	{
		$noficial = 1;	
	}

	$tipo_persona = $_POST['tipo_persona'];

	if ($tipo_persona == 'p_moral') {
		$tipo_persona = 1;
	}else{
		$tipo_persona = 0;
	}

	if($tipo_persona == 1)
	{
		$acta = $ruta.'/'.basename($_FILES['acta']['name']);
		$poder = $ruta.'/'.basename($_FILES['poder']['name']);
		$solicitud = $ruta.'/'.basename($_FILES['solicitud']['name']);
	}

	if(!is_dir($ruta))
	{
		if(!mkdir($ruta,0777, true))
		{
			echo "Fallo la creacion de carpeta";
		}else{			
			move_uploaded_file($_FILES['titulo']['tmp_name'], $titulo);
			move_uploaded_file($_FILES['pred']['tmp_name'], $predia);
			move_uploaded_file($_FILES['ine']['tmp_name'], $ine);
			move_uploaded_file($_FILES['contrato']['tmp_name'], $contrato);
			move_uploaded_file($_FILES['no']['tmp_name'], $noficial);
			move_uploaded_file($_FILES['cp_no']['tmp_name'], $cp_no);
			file_put_contents($ruta_img, $data_64);

			if($tipo_persona == 1)
			{
				move_uploaded_file($_FILES['acta']['tmp_name'], $acta);
				move_uploaded_file($_FILES['poder']['tmp_name'], $poder);
				move_uploaded_file($_FILES['solicitud']['tmp_name'], $solicitud);
			}
		}
	}
	$id_expediente = create_expediente($docs, $tipo_persona, $id_persona, $id_dg, $id_dimensiones, $noficial);
	if($id_expediente)
	{
		if(create_ventanilla_id($id_expediente))
		{
		$mensaje = "correcto";
		}else{
			$mensaje = "error";
		}
	}else{
		$mensaje = "error";
	}

	echo $mensaje;