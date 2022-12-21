<?php
include_once("./includes/conexion.class.php");
ini_set("display_errors", "On");
$con = new Conexion();
if (isset($_POST["sku"])){
	
	$param = $_POST["sku"];
 	$sql = "SELECT * FROM material_raw 
	WHERE 
	folio = '$param' 
	";

	$q = $con->Query($sql);
	$rows = $con->Rows();


	echo $json = html_entity_decode(json_encode($rows));
}else{
	echo json_encode(Array("-1" => "ERROR"));
}