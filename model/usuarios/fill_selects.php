<?php
include ('../../controller/usuarios/funciones_usuarios.php');
// include ('../../controller/secretarias/funciones_secretarias.php');
// include ('../../controller/cargo/funciones_cargos.php');

function fill_tipo_usuarios()
{
	$tipos_usuarios = get_tipos_usuarios();
	$option_usuarios ='';
	foreach ($tipos_usuarios as $usuarios) 
	{
		$option_usuarios.= '<option value ="'.$usuarios['id_tipo_usuario'].'">'.$usuarios['tipo_usuario'].'</option>';;
	}
	return $option_usuarios;
}

function fill_secretarias()
{
	$secretarias = get_secretarias();
	$option_secretaria='';
	foreach ($secretarias as $secretaria) 
	{
		$option_secretaria.='<option value="'.$secretaria['id_secretaria'].'">'.$secretaria['secretaria'].'</option>';
	}
	return $option_secretaria;
}


function fill_cargos_select()
{
	$cargos = get_cargos();
	$option_cargo='';
	foreach ($cargos as $cargo) 
	{
		$option_cargo.='<option value="'.$cargo['nivel'].'">'.$cargo['cargo'].'</option>';
	}
	return $option_cargo;
}

?>