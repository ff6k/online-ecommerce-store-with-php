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
		$pass = $_POST['password'];
		$sql = "SELECT * FROM nfc_client WHERE Email='$user' AND Password='".md5($pass)."'";
		if($query = mysqli_query($con,$sql)){
			$resultat = mysqli_num_rows($query);
			$row = mysqli_fetch_assoc($query);
			if($resultat == 1){
				$cookie_name = "isLogged";
				$cookie_value = $row["Nom"];
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
				header("Location: index.html");
			}else{
				echo "Email o contrasenya incorrectes";
			}
		}
	}
}

$db->close($con);

?>