<?php
//Ens connectem a la base de dades
require_once '../db_connect.php';
/*Creem la connexió*/
$db = new DB_CONNECT();
$con = $db->connect();

session_start();

if(isset($_GET["id_producte"]) && isset($_GET["nom_producte"]) && isset($_GET["stock"])){
	$item = $_GET["id_producte"];
	$nom_item = $_GET["nom_producte"];
	$stock = $_GET["stock"];
	
	$array_productes_old=explode(",", $_SESSION['carro']);
	if(isset($_SESSION['carro'])){
		if(count(preg_grep("[".$item."/".$nom_item."]", $array_productes_old)) < $stock){ /* Comprovem que no s'hagi afegit mes cops que stock hi ha! */
			$_SESSION['carro']  = $_SESSION['carro'].",[".$item."/".$nom_item."]";
		}
	}else{
		$_SESSION['carro']  = "[".$item."/".$nom_item."]";
	}

	$productes_afegits = array();

	$carrito = "<ul>";
	$array_productes=explode(",", $_SESSION['carro']);
	foreach($array_productes as $producte) {
		$id_producte = substr($producte, 0, strpos($producte, "/"));
		if(!in_array($id_producte, $productes_afegits)){
			$nom_producte=substr($producte, strpos($producte, "/")+1, strpos($producte, "]"));
			$nom_producte = trim($nom_producte, "]");			
			$carrito.=	"<li>".$nom_producte." (x".count(preg_grep($producte, $array_productes)).")</li>";
			$productes_afegits[] = $id_producte;
		}

	}
	$carrito.="</ul>";

	echo $carrito;
}

$db->close($con);
?>