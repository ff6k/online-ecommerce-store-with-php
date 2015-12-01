<!DOCTYPE html>
<html lang="ca">
<head>
	<meta charset="utf-8">
	<title>NFC - Cistella</title>
	<meta name="description" content="La millor botiga de la xarxa.">
	<meta name="author" content="Grup TDIW-D10">

	<script src="../resources/js/jquery-1.11.3.min.js"></script>

	<link type="text/css" href="../resources/css/style.css" rel="stylesheet">
	<script src="../resources/js/scripts.js"></script>
  
	<link rel="shortcut icon" href="../resources/img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../resources/img/favicon.ico" type="image/x-icon">

	<script> 
	$(function(){
		$("#header").load("../view/header.php"); 
		$("#footer").load("../view/footer.html");
	});
	</script> 
</head>

<body>

<header id="header"></header>
<section id="container">
	<h1>Carret</h1>

<?php 
	echo $taulaProductesCarrito;
?>

</section>

<footer id="footer"></footer>

</body>
</html>