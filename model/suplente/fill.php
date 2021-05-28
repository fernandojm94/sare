<?php
include('../../controller/suplente/funciones_suplente.php');

function fill_suplente_activo($id_suplente)
{
	$suplente = get_suplente_activo($id_suplente);

	return $suplente;
}

function fill_suplente()
{
	$suplente = get_suplente();

	return $suplente;
}