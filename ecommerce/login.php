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
		# codi de login...
	}
}