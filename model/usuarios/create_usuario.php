<?php
include('../../controller/usuarios/funciones_usuarios.php');
var_dump($_POST);
$nombre = $_POST['nombre_usuario'];
$usuario = $_POST['usuario'];
$psw = md5($_POST['password']);
$id_tipo_usuario = $_POST['id_tipo_usuario'];
// $secretaria = $_POST['id_dependencia'];
// $cargo = $_POST['id_cargo'];
// $status = $_POST['status'];
if(!compare_usuario($nombre))
{
	if(create_usuario($nombre, $usuario, $psw, $id_tipo_usuario))
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