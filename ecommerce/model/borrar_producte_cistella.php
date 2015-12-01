<?php
//Ens connectem a la base de dades
require_once '../db_connect.php';
/*Creem la connexió*/
$db = new DB_CONNECT();
$con = $db->connect();

session_start();

if(isset($_GET["id_producte"])) {
	$item = $_GET["id_producte"];

	$array_productes=explode(",", $_SESSION['carro']);
	unset($_SESSION['carro']);
	$_SESSION['carro'] = "";

	foreach($array_productes as $producte){
		$id_producte = substr($producte, 0, strpos($producte, "/"));
		$id_producte = trim($id_producte, "[");	

		if($id_producte != $item){
			if($_SESSION['carro'] === ""){
				$_SESSION['carro'] = $producte;
			}else{
				$_SESSION['carro']  = $_SESSION['carro'].",".$producte;
			}
		}
	}
	$productes_afegits = array();

	$carrito = "<ul>";
	$array_productes=explode(",", $_SESSION['carro']);
	foreach($array_productes as $producte) {
		if($producte != ""){
		$id_producte = substr($producte, 0, strpos($producte, "/"));
		$id_producte = trim($id_producte, "[");	
		if(!in_array($id_producte, $productes_afegits)){
			$nom_producte=substr($producte, strpos($producte, "/")+1, strpos($producte, "]"));
			$nom_producte = trim($nom_producte, "]");	
			$carrito.=	"<li>".$nom_producte." (x".count(preg_grep($producte, $array_productes)).")</li>";
			$productes_afegits[] = $id_producte;
		}
	}
	}
	$carrito.="</ul>";
	$carrito.="<a href=\"../controller/carrito.php\"><button id=\"button_comprar\">Comprar</button></a>";

	echo $carrito;
}

$db->close($con);
?>