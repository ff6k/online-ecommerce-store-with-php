<script src="resources/js/scripts.js"></script>
<span id="header_section"> 
	<a href="index.html"><img id="logo" src="resources/img/logotip.png" /> </a>
</span>
<span id="menu_section"> 
	<nav>
		<ul>
			<li>
				<a href="index.html">Inici</a>
			</li>
			<li>
				<a id="products_option" href="productes.html">Productes</a>
				<ul>
					<li>
						<a href="producte_categoria.html?id=1">Pulseres</a>
					</li>
					<li>
						<a href="producte_categoria.html?id=2">Rellotges</a>
					</li>
					<li>
						<a href="producte_categoria.html?id=3">Tags</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="tecnologia-nfc.html">Tecnologia NFC</a>
				<ul>
					<li>
						<a href="tecnologia-nfc.html#QueEs">Què és?</a>
					</li>
					<li>
						<a href="tecnologia-nfc.html#Aplicacio">Aplicació</a>
					</li>
				</ul>
				<li>
					<input type="search" autocomplete="on" id="search" placeholder="Buscar" onkeypress="enter(event)"/>
					<button onclick="buscar()" id="search_button"><img height="20px" style="margin:auto;" src="resources/img/search_icon.png"></img></button>
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
		<a href="#close" title="Close" class="close"><img src="resources/img/close.png" height="30px" width="30px"/></a>
		<form method="POST" action="login.php">
			<h2>Accés usuari</h2>
			<p>Usuari</p>
			<input type="text" id="username_input" name="email" placeholder="Email"/>	
			<p>Password</p>
			<input type="password" id="password_input" name="password" placeholder="Contrasenya"/></br></br>
			<input type="submit" value="Entra" id="LoginButton" name="LoginButton"/>
			<p>Si no t'has registrat ho pots fer <a href="signup.html">aquí</a>.</p>
		</form>
	</div>
</div>

