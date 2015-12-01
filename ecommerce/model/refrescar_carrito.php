	<?php 


	session_start();

	$productes_afegits = array();
	$carrito ="<table id=\"taula_carrito\">";

	$array_productes=explode(",", $_SESSION['carro']);

	$carrito .= "<tr>";
	$carrito .= "<td id=\"fila_carrito\">";
	$carrito .=	"<p class=\"element_taula header_taula\">IMATGE</p>";
	$carrito .="</td>";
	$carrito .= "<td id=\"fila_carrito\">";
	$carrito .=	"<p class=\"element_taula header_taula\">NOM</p>";
	$carrito .="</td>";
	$carrito .= "<td id=\"fila_carrito\">";
	$carrito .=	"<p class=\"element_taula header_taula\">PREU (c/u)</p>";
	$carrito .="</td>";
	$carrito .= "<td id=\"fila_carrito\">";
	$carrito .=	"<p class=\"element_taula header_taula\">PREU TOTAL</p>";
	$carrito .="</td>";
	$carrito .= "<td id=\"fila_carrito\">";
	$carrito .=	"<p class=\"element_taula header_taula\">MODIFICAR</p>";
	$carrito .="</td>";

	$quantitat_productes = 0;
	$preu_total = 0;


	foreach($array_productes as $producte) {
		if($producte != ""){
		$id_producte = substr($producte, 0, strpos($producte, "/"));
		$id_producte = trim($id_producte, "[");	
		if(!in_array($id_producte, $productes_afegits)){

			//Ens connectem a la base de dades
			require_once '../db_connect.php';
			/*Creem la connexió*/
			$db = new DB_CONNECT();
			$con = $db->connect();
					$sql = "SELECT * FROM nfc_producte WHERE id_producte = ".$id_producte.";";
					$query=mysqli_query($con, $sql) or die(mysqli_error($con));
					$row = mysqli_fetch_array($query);

			$carrito .= "<tr>";
			$carrito .= "<td id=\"fila_carrito\">";
			$carrito .="<img class=\"element_taula\" width=\"100\" height=\"100\" src=\"../".$row["URL_imatge"]."\" onclick=\"removeFromCart(".$id_producte.")\"/>";
			$carrito.="</td>";

			$carrito .= "<td id=\"fila_carrito\">";
			$nom_producte=substr($producte, strpos($producte, "/")+1, strpos($producte, "]"));
			$nom_producte = trim($nom_producte, "]");			
			$carrito.=	"<p class=\"element_taula\">".$nom_producte." (x".count(preg_grep($producte, $array_productes)).")</p>";
			$productes_afegits[] = $id_producte;
			$carrito.="</td>";

			$quantitat_productes+= count(preg_grep($producte, $array_productes));

			$carrito .= "<td id=\"fila_carrito\">";
			$carrito.=	"<p class=\"element_taula\">".$row["Preu_IVA"]."</p>";
			$carrito.="</td>";

			$carrito .= "<td id=\"fila_carrito\">";
			$carrito.=	"<p class=\"element_taula\">".$row["Preu_IVA"]*count(preg_grep($producte, $array_productes))."</p>";
			$carrito.="</td>";

			$preu_total += $row["Preu_IVA"]*count(preg_grep($producte, $array_productes));

			$carrito .= "<td id=\"fila_carrito\">";
			$carrito .="<img class=\"element_taula\" src=\"../resources/img/delete-product.png\" onclick=\"borrar(".$id_producte."); refrescarResumCarrito();\"/>";
			$carrito.="</td>";
			$carrito .= "</tr>";
		}
	}
	}

		$carrito .= "<tr>";
	$carrito .= "<td id=\"fila_carrito\">";
	$carrito .=	"<p class=\"element_taula header_taula\">TOTAL</p>";
	$carrito .="</td>";
	$carrito .= "<td id=\"fila_carrito\">";
	$carrito .=	"<p class=\"element_taula\">".$quantitat_productes." unitats</p>";
	$carrito .="</td>";
	$carrito .= "<td>";
	$carrito .="</td>";
	$carrito .= "<td id=\"fila_carrito\">";
	$carrito .=	"<p class=\"element_taula\">".$preu_total." euros</p>";
	$carrito .="</td>";
	$carrito .= "<td id=\"fila_carrito\">";
	$carrito .=	"<button class=\"element_taula\">CONFIRMAR</button>";
	$carrito .="</td>";


	$carrito .="</table>";
	
	echo $carrito;

	?>