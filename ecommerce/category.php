<?php

//Ens connectem a la base de dades
require_once __DIR__ . '/db_connect.php';
/*Creem la connexió*/
$db = new DB_CONNECT();
$con = $db->connect();

//Agafem la categoria
$id = $_GET['id'];

echo "<p>Hola</p>";

$sql = "SELECT * FROM nfc_producte WHERE Id_categoria='$id'";
if($query = mysqli_query($con,$sql)){
		$resultat = mysqli_num_rows($query);
		while ($resultat>0) {
			$producte=$query->fetch_array(MYSQLI_ASSOC);
			echo "<div>";
			echo "<img src=".$producte['URL_imatge']."/>";
			echo "<h3>".$producte['Nom']."</h3>";
			echo "<p>El preu d'aquest producte és de: ".$producte['PVP']."€</p>";
			echo "</div>";
			$resultat-=1;
		}
}

$db->close($con);

?>