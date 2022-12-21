<?php
header("Access-Control-Allow-Origin: *");
include_once("../includes/conexion.class.php");

$con = new Conexion();

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data["user"]) && isset($data["password"])){
	$email = $data["user"];
	$password = $data["password"];

	$sql = "select * from usuarios where nombre ='$email' and contrasena=md5('$password')";
	$r = $con->Query($sql);
	if ($con->NumRows() == 1){
		session_start();
		$rows = $con->Rows();
		$row=$rows[0];
		$_SESSION["id"] = $row["id"];
		
		
		$_SESSION["acceso"] = "true";
		echo json_encode(Array("concedido"=>"true"));
	}else{
		echo json_encode(Array("concedido"=>"no"));
	}
}else{
	echo json_encode(Array("concedido"=>"no"));
}