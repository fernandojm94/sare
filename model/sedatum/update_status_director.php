<?php
	include('../../controller/suplente/funciones_suplente.php');
	
	$id = $_POST['id'];
	$status = $_POST['status'];

	if(compare_suplente($id))
	{
		if(update_suplente($id, $status))
		{
			$mensaje = "correcto";
		}else{
			$mensaje = "error1";
		}
	}else{
		if(create_suplente($id))
		{
			$mensaje = "correcto";
		}else{
			$mensaje = "error2";
		}
	}
	echo $mensaje
?>