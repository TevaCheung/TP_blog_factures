<?php
	session_start();

	$connexion=0;
	
	if (isset($_POST['pseudo']) and !empty($_POST['pseudo']) and isset($_POST['mdp']) and !empty($_POST['mdp'])){ 
		$connexion=0;
		
		try 
		{
			$bdd = new PDO('mysql:host=localhost;dbname=tp_factures','root','',array(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION));
		}

		catch (Exception $e) 
		{
				die('Erreur : ' . $e->getMessage()); 
		}
		
		$reponse = $bdd->query('SELECT pseudo,mdp FROM utilisateur'); 
		while (($res = $reponse->fetch())){
			$mdp_bdd=password_hash($res['mdp'],PASSWORD_BCRYPT);
			if (password_verify($_POST['mdp'],$mdp_bdd)){
				$_SESSION['pseudo']=$res['pseudo'];
				$_SESSION['mdp']=$res['mdp'];
				$connexion=1;
				echo 'OK<br/><br/>';
				break;
			}			
		}
		$reponse->closeCursor();
		
		if ($connexion==0) {
			echo 'Tentative de connexion échouée';
		}
		
	}else if (empty($_POST['pseudo']) && empty($_POST['mdp'])){ 
	
	}
	
	if ($connexion==1) {
		header('Location: main.php'); // ATTENTION PAS D'ESPACE ENTRE LE LOCATION ET LE D-POINT
	}
?>

<html>
	<head>
		<meta charset="utf-8" />
		<title>TP : Page de connexion</title>
	</head>
	
	<body>
		<fieldset>
			<legend>Connexion</legend>
			
			<form action="connexion.php" method="POST">
				<p>
					<label for="pseudo">Pseudo </label><input type="text" name="pseudo"/>
					<br/>
					<label for="mdp">Mot de passe </label><input type="password" name="mdp"/>
					<br/>
					<input type="submit" value="envoyer" />
				</p>
			</form>
		</fieldset>
	</body>
</html>