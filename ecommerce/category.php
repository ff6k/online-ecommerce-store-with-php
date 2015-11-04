<?php

//Ens connectem a la base de dades
require_once __DIR__ . '/db_connect.php';
/*Creem la connexió*/
$db = new DB_CONNECT();
$con = $db->connect();

//Agafem la categoria
$id = $_GET['id'];

if(isset($_GET['id'])){

$sql = "SELECT * FROM nfc_producte WHERE Id_categoria='$id'";
		
		$query = mysqli_query($con,$sql);

		$prov = "<table>";

		$i = 1;
    
		while($producte=mysqli_fetch_assoc($query)){

			if($i % 3 == 1){
				$prov.="<tr>";
			}

			$urlImatge = $producte["URL_imatge"];
			$nomProducte = $producte["Nom"];
			$preuPVP = $producte["PVP"];

			$prov.="<td>
			<div id=\"product_cell\">
			<img id=\"product_image\" src=\"".$urlImatge."\" />
			<h3>$nomProducte</h3>
			<p>El preu d'aquest producte és de: $preuPVP €</p>
			<button class=\"product_cell_button\">Afegir al carret</button>
			</div>
			</br>
			</td>";

    		if($i % 3 == 0){
    			$prov.="</tr>";
			}
			$i++;

			
		}

		$prov.="</table>";

		echo $prov;

	}


$db->close($con);

?>