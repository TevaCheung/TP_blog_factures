<html>
	<header>
		<p id="bienvenue">Bienvenue <?php echo $_SESSION['pseudo']; ?> ! </p>
		
		<form action="deco.php" method="POST">
			<p>
				<input type="submit" value="Deconnexion" />
			</p>
		</form>
		
		<nav>
			<ul>
				<li><a href="main.php">Accueil</a></li>
				<li><a href="manip.php">Manipulation des données</a></li>
			</ul>
		</nav>		
	</header>
</html>