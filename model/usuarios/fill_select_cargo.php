<?php
	include('../../controller/cargo/funciones_cargos.php');
	$id_secretaria = $_POST['id_secretaria'];
	$cargos = get_cargos_secretaria($id_secretaria);
	$option_cargo.='<option value="0">Selecciona una opción</option>';
	foreach ($cargos as $cargo) 
	{
		$option_cargo.='<option value="'.$cargo['id_cargo'].'">'.$cargo['cargo'].'</option>';
	}
	echo $option_cargo;
?>