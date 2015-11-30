<?php
		$directori = "../resources/img/";
		$fitxer = $directori . basename($_FILES["img_producte"]["name"]);
	    $check = getimagesize($_FILES["img_producte"]["tmp_name"]);
	    if($check !== false) {
	        echo "El fitxer és una imatge - " . $check["mime"] . ".";
	        $correcte = 1;
	    } else {
	        echo "El fitxer no és una imatge.";
	        $correcte = 0;
	    }


	if ($_FILES["img_producte"]["size"] > 500000) { //Tamany màxim 500kb
	    echo "El fitxer és molt gran.";
	    $correcte = 0;
	}

	$imageFileType = pathinfo($fitxer, PATHINFO_EXTENSION);
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Només s'admeten fitxers .JPG, .PNG, .JPEG o .GIF.";
	    $correcte = 0;
	}

	if ($correcte == 0) {
	    echo "No s'ha pujat el fitxer.";
	// Si no hi ha problemes, que pugi el fitxer
	} else {
	    if (move_uploaded_file($_FILES["img_producte"]["tmp_name"], $fitxer)) {
	        echo "El fitxer ".$fitxer. " s'ha pujat correctament.";
	        //Ens connectem a la base de dades
			require_once '../db_connect.php';
			/*Creem la connexió*/
			$db = new DB_CONNECT();
			$con = $db->connect();
			$preuIVA = $_POST["pvp_producte"] + $_POST["pvp_producte"] * 0.21;
				if ($_POST["nom_producte"]!="" && $_POST["stock"]!="" && $_POST["descripcio_producte"]!="" && $_POST["pvp_producte"]!=""
					&& $_POST["EAN_producte"]) {
					$fitxer = substr($fitxer, 3, strlen($fitxer));
					$sql = "INSERT INTO nfc_producte VALUES ('null', ".$_POST["categoria"].", '".mysql_real_escape_string($fitxer)."', '".mysql_real_escape_string($_POST["nom_producte"])."', '"
						.mysql_real_escape_string($_POST["descripcio_producte"])."', ".$_POST["stock"].", ".$_POST["pvp_producte"].", '".mysql_real_escape_string($_POST["EAN_producte"])."', '".$preuIVA."');";
					$query=mysqli_query($con, $sql) or die(mysqli_error($con));
					if($query){
						header("Location: ../controller/afegir_producte.php");
						echo "S'ha afegit el producte.";
					}else{
						echo "Hi ha hagut un problema a l'hora d'afegir el producte'.";
					}
						
				}
			$db->close($con);
	    } else {
	        echo "Hi ha hagut un error pujant el fitxer.";
	    }
	}

?>