<?php

//Ens connectem a la base de dades
require_once __DIR__ . '/db_connect.php';
/*Creem la connexió*/
$db = new DB_CONNECT();
$con = $db->connect();

if(isset($_POST['LoginButton']))
{
	if(!isset($_POST['email']))
		echo "Introdueix un email<br>";
	elseif (!isset($_POST['password']))
		echo "Introdueix la contrasenya<br>";
	else{
		$user = $_POST['email'];
		$pass = md5($_POST['password']);
		$sql = "SELECT * FROM nfc_client WHERE Email='$user' AND Password='$pass'";
		if($query = mysqli_query($con,$sql)){
			$resultat = mysqli_num_rows($query);
			if($resultat == 1)
				echo "S'ha connectat";
			else
				echo "Email o contrasenya incorrectes";
		}
	}
}

$db->close($con);

?>