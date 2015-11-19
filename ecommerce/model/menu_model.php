<?php

function getAllCategories(){
	//Ens connectem a la base de dades
	require_once 'db_connect.php';
	/*Creem la connexió*/
	$db = new DB_CONNECT();
	$con = $db->connect();

	$categories = array();

	$sql = "SELECT * FROM nfc_categoria ORDER BY id_categoria";
			
			$query = mysqli_query($con,$sql);
	    
			while($categoria=mysqli_fetch_assoc($query)){

				$categories[] = $categoria;
		
			}

		return json_encode($categories);

		$db->close($con);
}

?>