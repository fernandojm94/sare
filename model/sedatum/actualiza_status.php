<?php
	include('../../controller/solicitud/funciones_solicitud.php');
	$expediente = $_POST['id'];
	$usuario = $_POST['usuario'];
	$adicional_1 = $_POST['adicional_1'];
	$adicional_2 = $_POST['adicional_2'];
	$etapa = $_POST['etapa'];
	$status = $_POST['status'];

	switch ($etapa) {
			case '1':
				$resuelto = "pagos";
				$recibe = "suelo";
				$etapa = 4;
				break;
			case '2':
				$resuelto = "ventanilla";
				$recibe = "pagos";
				$etapa = 3;
				break;
			case '4':
				$resuelto = "suelo";
				$recibe = "director";
				$etapa = 5;
				break;
			case '5':
				$resuelto = "director";
				$recibe = "secretario";
				$etapa = 6;
				break;
			case '6':
				$resuelto = "secretario";
				$recibe = "";
				$etapa = 7;
				break;
		}	
