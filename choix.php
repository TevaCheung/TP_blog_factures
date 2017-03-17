<?php
	session_start();
	
	if (!isset($_SESSION['pseudo'])){
		header('Location: connexion.php');
	}
?>

<html>
	<head>
		<meta charset="utf-8" />
		<title>TP : Résultat de la recherche</title>
		<link rel="stylesheet" type="text/css" href="ecran.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="impression.css" media="print"/>
	</head>
	
	<body>
<?php
		
	include('header.php');

	if (!isset($_POST['rech_prod']) && !isset($_POST['prix_prod']) && !isset($_POST['annee']) && !isset($_POST['mois']) ){
		header('Location: main.php');		
	}

	if (!empty($_POST['rech_prod']) && isset($_POST['rech_prod'])){ 
		$rech_prod=strval(htmlspecialchars($_POST['rech_prod']));
	}

	if (!empty($_POST['prix_prod']) && isset($_POST['prix_prod'])){
		$prix_prod=floatval(htmlspecialchars($_POST['prix_prod']));
	}

	try 
	{
		$bdd = new PDO('mysql:host=localhost;dbname=tp_factures','root','',array(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION));
	}

	catch (Exception $e) 
	{
			die('Erreur : ' . $e->getMessage()); 
	}
	
	include('choix_fact.php');
	
	include('choix_prod.php')

?>
	</body>

</html>