<?php
require_once("../model/menu_model.php");
$categories = getAllCategories();
$categories = json_decode($categories, true);

require_once '../view/afegir_producte.php';
?>