<?php
//Ens connectem a la base de dades
require_once '../db_connect.php';
/*Creem la connexió*/
$db = new DB_CONNECT();
$con = $db->connect();

session_start();

if(isset($_GET["id_producte"]) && isset($_GET["nom_producte"])){
	$item = $_GET["id_producte"];
	$nom_item = $_GET["nom_producte"];
	
	if(isset($_SESSION['carro'])){
		$_SESSION['carro']  = $_SESSION['carro'].",[".$item."/".$nom_item."]";
	}else{
		$_SESSION['carro']  = "[".$item."/".$nom_item."]";
	}

	$carrito = "<ul>";
	$array_productes=explode(",", $_SESSION['carro']);
	foreach($array_productes as $producte) {
		$nom_producte=substr($producte, strpos($producte, "/")+1, strpos($producte, "]"));
		$nom_producte = trim($nom_producte, "]");			
		$carrito.=	"<li>".$nom_producte."</li>";
	}
	$carrito.="</ul>";

	echo $carrito;
}

$db->close($con);
?>