<?php
	include('../../controller/solicitud/funciones_solicitud.php');

	$folio = "SARE/".date("Y/m/d H:m:s");
	$docs =str_replace(' ', '-', str_replace(':', '-',str_replace('/', '-', $folio)));
	$tipo_persona = $_POST['tipo_persona'];
	$id_persona = $_POST['id_persona'];
	$id_dg = $_POST['id_dg'];
	$id_dimensiones = $_POST['id_dimensiones'];
	$ruta = "../../assets/expedientes/".$docs."/docs";
	$titulo = $ruta.basename($_FILES['titulo']['name']);
	$predia = $ruta.basename($_FILES['pred']['name']);
	$ine = $ruta.basename($_FILES['ine']['name']);
	$contrato = $ruta.basename($_FILES['contrato']['name']);
	$noficial = $ruta.basename($_FILES['no']['name']);
	if($tipo_persona == 2)
	{
		$acta = $ruta.basename($_FILES['acta']['name']);
		$poder = $ruta.basename($_FILES['poder']['name']);
		$solicitud = $ruta.basename($_FILES['solicitud']['name']);
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
			if($tipo_persona == 2)
			{
				move_uploaded_file($_FILES['acta']['tmp_name'], $acta);
				move_uploaded_file($_FILES['poder']['tmp_name'], $poder);
				move_uploaded_file($_FILES['solicitud']['tmp_name'], $solicitud);
			}
		}
	}

	if(create_expediente($folio, $tipo_persona, $id_persona, $id_dg, $id_dimensiones))
	{


	}else{
		$mensaje = "error";
	}