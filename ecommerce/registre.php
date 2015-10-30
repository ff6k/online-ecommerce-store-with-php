<?php

echo "Registrant-te...<br>";
/*Agafem el connect*/
require_once __DIR__ . '/db_connect.php';
/*Creem la connexió*/
$db = new DB_CONNECT();
$con = $db->connect();

echo "Ja ens hem connectat a la base de dades, registrant-te<br>";

echo "Mirant els camps<br>";
//Ens assegurem que els camps obligatoris hi siguin
if(isset($_POST['nom'])||isset($_POST['email'])||isset($_POST['password'])||isset($_POST['cognoms'])||isset($_POST['direccio'])||isset($_POST['DNI'])||isset($_POST['telefon'])||isset($_POST['mobil']))
	echo "Siusplau omple tots els camps obligatoris.<br>";
else{
	echo "Creant la consulta...<br>";
	$nom ="";
	if(isset($_POST["nom"]))
		$nom = $_POST["nom"];
	echo $nom."<br>";
	$sql="insert into nfc_client(Nom,Cognoms,Direccio,DNI,Telefon,Mobil,Email,Password) values('".$_POST['nom']."', '".$_POST['cognoms']."', '".$_POST['direccio']."', '".$_POST['DNI']."','".$_POST['telefon']."','".$_POST['mobil']."','".$_POST['email']."','".$_POST['password']."')";
	echo "Feta la consulta sql.<br>";
	echo "Enviant la consulta.<br>";
	$res=mysqli_query($con,$sql);
	if($res)
		echo "T'has registrat correctament.";
	else
		echo "Hi ha hagut un problema a l'hora de registrar-te.";
}

$db->close($con);
?>