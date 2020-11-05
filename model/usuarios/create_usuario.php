<?php
include('../../controller/usuarios/funciones_usuarios.php');
$nombre = $_POST['nombre_usuario'];
$usuario = $_POST['usuario'];
$psw = md5($_POST['password']);
$tipo_usuario = $_POST['id_tipo_usuario'];
$secretaria = $_POST['id_dependencia'];
$cargo = $_POST['id_cargo'];
$status = $_POST['status'];
if(!compare_usuario($nombre, $secretaria))
{
	if(create_usuario($nombre, $usuario, $psw, $tipo_usuario, $secretaria, $cargo, $status))
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