<?php
include('../../controller/solicitud/funciones_solicitud.php');

$frente = $_POST['frente'];
$fondo = $_POST['fondo'];
$derecho = $_POST['derecho'];
$izquierdo = $_POST['izquierdo'];
$delterreno = $_POST['terreno'];
$dellocal = $_POST['local'];
$predial = $_POST['predial'];
$id_dimensiones = 0;
$id_dimensiones = create_dimensiones_establecimiento($frente, $fondo, $derecho, $izquierdo, $delterreno, $dellocal, $predial);
if($id_dimensiones)
{
	$mensaje = "corecto, ".$id_dimensiones;
}else{
	$mensaje = "error1";
}

echo $mensaje;