<?php
	include('../../controller/usuarios/funciones_usuarios.php');
	$id_usuario=$_POST['id_usuario'];
	$nombre = $_POST['nombre_usuario'];
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$tipo_usuario = $_POST['id_tipo_usuario'];
	$secretaria = $_POST['id_secretaria'];
	$cargo = $_POST['id_cargo'];
	$status = $_POST['status'];

	if ($password!="") {
 		$pass=",password = '".md5($password)."',";
 	} else {
 		$pass=",";
 	}

	if(update_user($id_usuario, $nombre, $usuario, $pass, $tipo_usuario, $secretaria, $cargo))
	{
		$mensaje = "correcto";
	}else{
		$mensaje = "error1";
	}
	echo $mensaje;
?>