<?php
include('../../controller/usuarios/funciones_usuarios.php');

$id_usuario = $_POST['id_usuario'];
$status = $_POST['status'];
if(delete_usuario($id_usuario, $status))
{
	$mensaje = "correcto";
}else{
	$mensaje = "error";
}
echo $mensaje;
?>