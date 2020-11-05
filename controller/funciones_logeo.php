<?php
///PARA VER LOS ERRORES DE PHP COMENTAR LA SIGUIENTE LINEA
//error_reporting(0);
include('funciones.php');
$nick = $_POST['nick'];
$psw = $_POST['pass'];
$_SESSION='';
$query = "SELECT id_usuario, nombre_usuario, usuario, password, status FROM usuarios WHERE usuario ='".$nick."'";
$result=mysqli_query($conexion,$query);
 	$row = mysqli_fetch_assoc($result) ;
	if(mysqli_num_rows($result))
	{
		if(($row['password'] == md5($psw))&&($row['status'] == NULL))
	    {  
	        $_SESSION['id_usuario']=      $row["id_usuario"];
	        $_SESSION['usuario']=         $row["usuario"];
	        $_SESSION['nombre_completo']= $row["nombre_usuario"];
	        $respuesta= 'correcto';
	    }else{
	    	$mensaje = "Error en Usuario: ".$nick." Contraseña: ".$psw;
	    	registro_log_error($mensaje);
	    	$respuesta = "error";
	    }	
	}else{
	    $mensaje = "Error en Usuario: ".$nick." Contraseña: ".$psw;
	    $id_usuario = "0";
	    registro_log_error($mensaje);
	    $respuesta = "error1";
	}
	echo $respuesta;

?>