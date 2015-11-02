<?php

echo "Registrant-te...<br>";
/*Agafem el connect*/
require_once __DIR__ . '/db_connect.php';
/*Creem la connexió*/
$db = new DB_CONNECT();
$con = $db->connect();

if(isset($_POST['submit'])){
	//Ens assegurem que els camps obligatoris hi siguin
	if(isset($_POST['nom'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['cognoms'])&&isset($_POST['direccio'])&&isset($_POST['DNI'])&&isset($_POST['telefon'])&&isset($_POST['mobil'])){
		$sql="INSERT INTO nfc_client
		VALUES('null', '".$_POST['nom']."', '".$_POST['cognoms']."', '".$_POST['direccio']."', '".$_POST['DNI']."','".$_POST['telefon']."','".$_POST['mobil']."','".$_POST['email']."','".md5($_POST['password'])."');";
		$query=mysqli_query($con, $sql) or die(mysqli_error($con));
		if($query)
			echo "T'has registrat correctament.";
		else
			echo "Hi ha hagut un problema a l'hora de registrar-te.";
	}
	else
		echo "Siusplau omple tots els camps.<br>";
}

$db->close($con);

?>