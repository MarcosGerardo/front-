<?php
include_once("./includes/conexion.class.php");
ini_set("display_errors", "On");
$con = new Conexion();

 	$sql = "SELECT * FROM productos";

	$q = $con->Query($sql);
	$rows = $con->Rows();


	echo $json = html_entity_decode(json_encode($rows));
	