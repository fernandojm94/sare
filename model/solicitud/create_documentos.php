<?php
	include('../../controller/solicitud/funciones_solicitud.php');

	$folio = "SARE/".date("Y/m/d");
	$tipo_persona = $_POST['tipo_persona'];
	$id_persona = $_POST['id_persona'];
	$id_dg = $_POST['id_dg'];
	$id_dimensiones = $_POST['id_dimensiones'];
	var_dump($_FILES);