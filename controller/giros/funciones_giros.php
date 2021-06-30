<?php
require_once('../../controller/exe.php');

function get_giros()
{
	$sql = "SELECT *
			FROM giros
			WHERE 1";

	$result = querys($sql);

	return $result;
}