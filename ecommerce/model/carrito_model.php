<?php

function getTaulaProductsCarrito(){

	session_start();

	$productes_afegits = array();
	$carrito ="<table id=\"taula_carrito\">";

	$array_productes=explode(",", $_SESSION['carro']);
	foreach($array_productes as $producte) {
		$id_producte = substr($producte, 0, strpos($producte, "/"));
		$id_producte = trim($id_producte, "[");	
		if(!in_array($id_producte, $productes_afegits)){
			$carrito .= "<tr>";
			$carrito .= "<td id=\"fila_carrito\">";
			$nom_producte=substr($producte, strpos($producte, "/")+1, strpos($producte, "]"));
			$nom_producte = trim($nom_producte, "]");			
			$carrito.=	"<p>".$nom_producte." (x".count(preg_grep($producte, $array_productes)).")</p>";
			$productes_afegits[] = $id_producte;
			$carrito.="</td>";
			$carrito .= "<td id=\"fila_carrito\">";
			$carrito .="<img src=\"../resources/img/delete-product.png\" onclick=\"removeFromCart(".$id_producte.")\"/>";
			$carrito.="</td>";
			$carrito .= "</tr>";
		}
	}
	$carrito .="</table>";
	
	return $carrito;
}
?>