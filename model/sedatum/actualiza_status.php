<?php
	include('../../controller/')
	$expediente = $_POST['id'];
	$usuario = $_POST['usuario'];
	$adicional_1 = $_POST['adicional_1'];
	$adicional_2 = $_POST['adicional_2'];
	$etapa = $_POST['etapa'];
	$status = $_POST['status'];

	switch ($etapa) {
			case '2':
				$tabla = "pagos"

				break;
			
			default:
				// code...
				break;
		}	
