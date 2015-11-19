<?php
//Ens connectem a la base de dades
require_once '../db_connect.php';
/*Creem la connexió*/
$db = new DB_CONNECT();
$con = $db->connect();

if(isset($_GET["id"])){
	$item = $_GET["id"];
	if(isset($_COOKIE["isLogged"])){
		$user = $_COOKIE["isLogged"];
		$sql = "INSERT into nfc_comanda values ('', ".$user.",'', '', 0, 0)";
		$query = mysqli_query($con,$sql);
	}

	$_SESSION['carro']  = $item;
}

$db->close($con);
?>