<script src="../resources/js/scripts.js" >

</script>

<?php

session_start();

require_once("../model/menu_model.php");
$categories = getAllCategories();
$categories = json_decode($categories, true);
?>
<span id="header_section"> 
	<a href="../index.php" ><img id="logo" src="../resources/img/logotip.png"; /> </a>
</span>
<span id="menu_section"> 
	<nav>
		<ul>
			<li>
				<a href="../index.php">Inici</a>
			</li>
			<li>
				<a id="products_option" href="../view/productes.html"; >Productes</a>
				<ul>

					<?php foreach($categories as $categoria){
						$id = $categoria["Id_categoria"];
						$nom = $categoria["Nom_categoria"];
						?>
						<li>	
							<a href=<?php echo "\"../controller/producte_categoria_controller.php?id=".$id."\""; ?>  >
								<?php echo $nom; ?>
								</a>
						</li>
					<?php
						}
					?>
										
				</ul>
			</li>
			<li>
				<a href="../view/tecnologia-nfc.html">Tecnologia NFC</a>
				<ul>
					<li>
						<a href="../view/tecnologia-nfc.html#QueEs">Què és?</a>
					</li>
					<li>
						<a href="../view/tecnologia-nfc.html#Aplicacio">Aplicació</a>
					</li>
				</ul>
				<li>
					<input type="search" autocomplete="on" id="search" placeholder="Buscar" onkeypress="enter(event)"/>
					<button onclick="buscar()" id="search_button"><img height="20px" style="margin:auto;" src="../resources/img/search_icon.png"></img></button>
				</li>
				<?php
				if(isset($_COOKIE['isLogged'])) { ?>
				<li>
			    	<p>Usuari: <?php echo $_COOKIE['isLogged'];?></p>
			    	<input id="login" type="submit" onclick="logout()" value="Sortir" />

			    </li>
			    <?php }else{ ?>
				<li>
					<a href="#openModal" id="login">Login</a>
				</li>
				<?php
					}
				?>
			</li>
		</ul>
	</nav>
</span> 

<div id="openModal" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close"><img src="../resources/img/close.png" height="30px" width="30px"/></a>
		<form method="POST" action="../controller/login.php">
			<h2>Accés usuari</h2>
			<p>Usuari</p>
			<input type="text" id="username_input" name="email" placeholder="Email"/>	
			<p>Password</p>
			<input type="password" id="password_input" name="password" placeholder="Contrasenya"/></br></br>
			<input type="submit" value="Entra" id="LoginButton" name="LoginButton"/>
			<p>Si no t'has registrat ho pots fer <a href="../view/signup.html">aquí</a>.</p>
		</form>
	</div>
</div>

<div id="carrito">
	<img id="c_img" src="../resources/img/carrito.png" width="30px" height="30px"/>
	<div id="carrito_container">
		<?php
		if(isset($_SESSION['carro'])) {?>
			<ul>
			<?php
		
			$array_productes = unserialize($_SESSION['carro'])
			//foreach($array_productes as $producte) {
				?>
					<li><?php echo $array_productes;?></li>
				
			<?php //} ?>
			</ul>
			<?php 
		}else{
			echo "No hi ha cap producte";
		}
		?>
	</div>
</div>