<?php
require_once("../model/carrito_model.php");
/*$categories = getAllCategories();
$categories = json_decode($categories, true);*/
$taulaProductesCarrito = getTaulaProductsCarrito();

require_once '../view/carrito.php';
?>