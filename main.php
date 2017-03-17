<?php
	session_start();
	
	if (!isset($_SESSION['pseudo'])){
		header('Location: connexion.php');
	}
?>

<html>
	<head>
		<meta charset="utf-8" />
		<title>TP : Informations générales</title>
		<link rel="stylesheet" type="text/css" href="ecran.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="impression.css" media="print"/>
	</head>
	
	<body>
		<?php include('header.php');  ?>
		
		<section id="rech">
			<fieldset>
			
				<legend>Recherche personnalisée</legend>	
				
				<h3>Consultation de factures</h3>
				
				<form action="choix.php" method="POST">	
					<p>
						<label for="annee">Voir les factures de quelle année ?</label>
							<select name="annee" id="annee">
								<option value="-1">Depuis l'inscription sur le site</option>
								<?php  for ($i=date('Y');$i>date('Y')-50;$i--){ 
									echo '<option value="'.$i.'"/>' . $i . '</option>';								
								} 
								?>				
							</select>
						<br/>
						<label for="mois">Voir toutes les factures de quel mois ?</label>
							<select name="mois" id="mois">
								<option value="-1">Tous les mois de l'année</option>
								<option value="1">1 - Janvier</option>
								<option value="2">2 - Février</option>
								<option value="3">3 - Mars</option>
								<option value="4">4 - Avril</option>
								<option value="5">5 - Mai</option>
								<option value="6">6 - Juin</option>
								<option value="7">7 - Juillet</option>
								<option value="8">8 - Août</option>
								<option value="9">9 - Septembre</option>
								<option value="10">10 - Octobre</option>
								<option value="11">11 - Novembre</option>
								<option value="12">12 - Décembre</option>								
							</select>
						<br/>
						<input type="submit" value="Rechercher"/>
					</p>
				</form>		
				
				<h3>Recherche d'un produit</h3>
				
				<form action="choix.php" method="POST">	
					<p>
						<label for="rech_prod">Nom du produit</label>
						<input name="rech_prod" type="text"/>
						<br/>
						<label for="prix_prod">Budget maximal (euros)</label>
						<input name="prix_prod" type="text"/>
					</p>
					<p>
						Note : vous pouvez combiner les deux paramètres<br/>
						<input type="submit" value="Rechercher"/>
					</p>
				</form>

			</fieldset>
		</section>
		
		<h1>Rapide aperçu de la base</h1>
		
		<h2>Clients</h2>

		<section>
			<table>
				<tr>
					<th>Pseudonymes des clients</th>
					<th>Adresse</th>
				</tr>
<?php
		try 
		{
			$bdd = new PDO('mysql:host=localhost;dbname=tp_factures','root','',array(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION));
		}

		catch (Exception $e) 
		{
				die('Erreur : ' . $e->getMessage()); 
		}

		$reponse = $bdd->query('SELECT pseudo, adresse
								FROM utilisateur'); 
		while (($res = $reponse->fetch())){
?>
		<tr>
			<td><?php echo $res['pseudo']; ?></td>
			<td><?php echo $res['adresse']; ?></td>
		</tr>
		
<?php	
		}
		$reponse->closeCursor();
?>
			</table>
		</section>
		
		<h2>Produits</h2>

		<section>
			<table>
					<tr>
						<th>Référence du produit</th>
						<th>Nom du produit</th>
						<th>Descriptif</th>
						<th>Prix en euros (€)</th>
					</tr>
<?php
		$reponse = $bdd->query('SELECT idP,nom,des,prix
								FROM produit'); 
		while (($res = $reponse->fetch())){
?>
					<tr>
						<td><?php echo $res['idP'];?></td>
						<td><?php echo $res['nom'];?></td>
						<td><?php echo $res['des'];?></td>
						<td><?php echo $res['prix'];?></td>						
					</tr>

<?php	
		}
		$reponse->closeCursor();
		
?>
			</table>
		</section>	

		<h2>Factures</h2>
		
		<section>
			<table>
					<tr>
						<th>Acheteur</th>
						<th>Numéro de la facture</th>
						<th>Date de la facture</th>
					</tr>
<?php
		$reponse = $bdd->query('SELECT pseudo,idF,dateF
								FROM utilisateur,facture
								WHERE utilisateur.idU=facture.idU
								ORDER BY pseudo DESC'); 
		while (($res = $reponse->fetch())){
?>
					<tr>
						<td><?php echo $res['pseudo'];?></td>
						<td><?php echo $res['idF'];?></td>
						<td><?php echo $res['dateF'];?></td>					
					</tr>

<?php	
		}
		$reponse->closeCursor();
		
?>
			</table>
		</section>	

		<br/><br/>
	</body>
</html>

