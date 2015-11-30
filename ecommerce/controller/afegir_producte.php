<?php
require_once '../model/afegir_producte.php';
require_once '../view/afegir_producte.html';

function insertar(){
	$directori = "../resources/img/";
	$fitxer = $directori.basename($_FILES["img_producte"]["name"]);
	$correcte = 1;
	$tipusFitxer = pathinfo($fitxer, PATHINFO_EXTENSION);
	comprovarImatge();
	existeix();
	mida();
	format();
	pujatcorrectament();
}
?>