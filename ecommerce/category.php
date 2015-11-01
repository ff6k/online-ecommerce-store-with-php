<?php

//Ens connectem a la base de dades
require_once __DIR__ . '/db_connect.php';
/*Creem la connexió*/
$db = new DB_CONNECT();
$con = $db->connect();

//Agafem la categoria
$id = $_GET['id'];
echo "Categoria: ".$id."<br>";

$sql = "SELECT * FROM nfc_producte WHERE Id_categoria='$id'";
if($query = mysqli_query($con,$sql)){
		$resultat = mysqli_num_rows($query);
		while ($producte = mysqli_fetch_array($resultat)) {
			echo "<div>";
			echo "<img src=".$producte['URL_imatge']."/>";
			echo "<h3>".$producte['Nom']."</h3>";
			echo "<p>El preu d'aquest producte és de: ".$producte['PVP']."</p>";
			echo "</div>";
		}
}

$db->close($con);

?>