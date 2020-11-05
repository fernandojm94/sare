<?php
include('../../controller/funciones_solicitud.php');

$frente = $_POST['frente'];
$fondo = $_POST['fondo'];
$derecho = $_POST['derecho'];
$izquierdo = $_POST['izquierdo'];
$delterreno = $_POST['delterreno'];
$dellocal['dellocal'];

if(create_dimensiones_establecimiento($frentel, $fondo, $derecho, $izquierdo, $delterreno, $dellocal))
{
	$mensaje = "corecto";
}else{
	$mensaje = "error1";
}

echo $mensaje;