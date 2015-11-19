<?php


function getProductes($id){
	//Ens connectem a la base de dades
	require_once '../db_connect.php';
	/*Creem la connexió*/
	$db = new DB_CONNECT();
	$con = $db->connect();

	$productes = array();

	$sql = "SELECT * FROM nfc_producte WHERE Id_categoria='$id'";
			
			$query = mysqli_query($con,$sql);
	    
			while($producte=mysqli_fetch_assoc($query)){

				$productes[] = $producte;
		
			}

		return json_encode($productes);

		$db->close($con);
}

?>