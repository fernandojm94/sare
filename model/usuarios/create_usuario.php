<?php
include('../../controller/usuarios/funciones_usuarios.php');

$nombre = $_POST['nombre_usuario'];
$usuario = $_POST['usuario'];
$psw = md5($_POST['password']);
$id_tipo_usuario = $_POST['id_tipo_usuario'];
$status = 1;

if(!compare_usuario($nombre))
{
	if(create_usuario($nombre, $usuario, $psw, $id_tipo_usuario, $status))
	{
		$mensaje = "correcto";
	}else{
		$mensaje = "error2";
	}
}else{
	$mensaje = "error1";
}
echo $mensaje;
?>