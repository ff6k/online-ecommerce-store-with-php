<?php

require_once("../model/producte_categoria_model.php");

$productes = getProductes($_GET["id"]);
require_once("../view/producte_categoria.html");
?>
