<?php 
	session_start();
	
	if (!isset($_SESSION['pseudo'])){
		header('Location: connexion.php');
	}
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>TP : Manipulation des données</title>
		<link rel="stylesheet" type="text/css" href="ecran.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="impression.css" media="print"/>
	</head>
	<body>
		
<?php
	try {
			$bdd = new PDO('mysql:host=localhost;dbname=tp_factures','root','');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		
	catch(PDOException $e){
		echo $e->getMessage();
    }
	
	include('header.php');

	include('manip_ajout.php');
	
	include('manip_suppression.php');
	
	include('manip_modif.php');
?>
		<section class="att_uti">
			<h1>Ajouter des données</h1>
			
			<h2>Nouveau client</h2>
			
			<form action="manip.php" method="POST">
				<p>
					<label for="upseudo">Pseudonyme</label>
					<input name="upseudo" type="text"/>
					<label for="umdp">Mot de passe</label>
					<input name="umdp" type="password"/>
					<label for="uadresse">Adresse</label>
					<textarea name="uadresse" rows="3" col="20"></textarea>
					<input type="submit" value="Ajouter"/>
				</p>
			</form>
			
			<h2>Nouvelle facture</h2>
			
			<form action="manip.php" method="POST" >
				<p>
					<label for="fidu">Acheteur</label>
					<select name="fidu" id="fidu">
					<?php
							$reponse = $bdd->query('SELECT idU,pseudo FROM utilisateur'); 
							while ($res = $reponse->fetch()){
									echo '<option value="'.$res['idU'].'">'.$res['pseudo'].'</option>';
							}
							$reponse->closeCursor();										
					?>		
					</select> 
					
					<label for="fjour">Jour</label>
					<select name="fjour" id="fjour">
					<?php  for ($i=0;$i<31;$i++){ 
								echo '<option value="'. ($i+1) .'"/>' . ($i+1) . '</option>';								
							} 
					?>		
					</select>
					
					<label for="fmois">Mois</label>
					<select name="fmois" id="fmois">
					<?php  for ($i=0;$i<12;$i++){ 
								echo '<option value="'. ($i+1) .'"/>' . ($i+1) . '</option>';								
							} 
					?>		
					</select>					
					
					<label for="fannee">Année</label>
					<select name="fannee">
					<?php  for ($i=date('Y');$i>date('Y')-50;$i--){ 
								echo '<option value="'.$i.'"/>' . $i . '</option>';								
							} 
					?>		
					</select>	
					<input type="submit" value="Ajouter"/>				
				</p>
			</form>
			
			<h2>Nouveau produit</h2>
			
			<form action="manip.php" method="POST">
				<p>
					<label for="pnom">Nom du produit</label>
					<input name="pnom" type="text"/>
					<label for="pdes">Description</label>
					<textarea name="pdes" rows="4" col="30"></textarea>
					<label for="pprix">Prix unitaire</label>
					<input name="pprix" type="text"/>
					<label for="pstock">Stock</label>
					<input name="pstock" type="text"/>	
					<input type="submit" value="Ajouter"/>
				</p>			
			</form>
		</section>
		
		<section class="att_uti">		
			<h1>Supprimer des données</h1>
			
			<h2>Supprimer un client</h2>
			
			<form action="manip.php" method="POST">
				<p>
					<select name="supp_cli" id="supp_cli">
					<?php
							$reponse = $bdd->query('SELECT idU,pseudo FROM utilisateur'); 
							while ($res = $reponse->fetch()){
									echo '<option value="'.$res['idU'].'">'.$res['pseudo'].'</option>';
							}
							$reponse->closeCursor();										
					?>		
					</select>
					<input type="submit" value="Supprimer"/>					
				</p>
			</form>
		
			<h2>Supprimer une facture</h2>
			
			<form action="manip.php" method="POST">
				<p>
					<select name="supp_fac" id="supp_fac">
					<?php
							$reponse = $bdd->query("SELECT idF,pseudo,dateF 
													FROM facture,utilisateur
													WHERE facture.idU=utilisateur.idU"); 
							while ($res = $reponse->fetch()){
									echo '<option value="'.$res['idF'].'">'.$res['idF'].' - '. $res['pseudo'] . ' - '. $res['dateF'] . '</option>';
							}
							$reponse->closeCursor();										
					?>		
					</select>
					<input type="submit" value="Supprimer"/>					
				</p>
			</form>
			
			<h2>Supprimer un produit</h2>

			<form action="manip.php" method="POST">
				<p>
					<select name="supp_prod" id="supp_prod">
					<?php
							$reponse = $bdd->query('SELECT idP,nom FROM produit'); 
							while ($res = $reponse->fetch()){
									echo '<option value="'.$res['idP'].'">' . 'Ref : ' . $res['idP'] . ' --- ' . $res['nom'] . '</option>';
							}
							$reponse->closeCursor();										
					?>		
					</select>
					<input type="submit" value="Supprimer"/>					
				</p>
			</form>		
		</section class="att_uti">
		
		<section class="att_uti">
			<h1>Modifier des données</h1>
			
			<h2>Modifier les informations d'un client</h2>
			
			<form action="manip.php" method="POST">
				<p>
					<label for="mod_cli">Infos client à modifier</label>
					<select name="mod_cli" id="mod_cli">
							<?php
									$reponse = $bdd->query('SELECT idU,pseudo,mdp,adresse FROM utilisateur'); 
									while ($res = $reponse->fetch()){
											echo '<option value="'.$res['idU'].'">'.$res['pseudo'].' - '.$res['mdp'].' - '. $res['adresse'] . '</option>';
									}
									$reponse->closeCursor();										
							?>		
					</select>	
					<br/><br/>
					<label for="mod_psd">Nouveau pseudo</label>
					<input name="mod_psd" type="text"/>
					<br/><br/>
					<label for="mod_mdp1">Nouveau mot de passe</label>
					<input name="mod_mdp1" type="password"/>
					<br/><br/>
					<label for="mod_mdp2">Réécrire le nouveau mot de passe</label>
					<input name="mod_mdp2" type="password"/>
					<br/><br/>
					<label for="mod_adr">Nouvelle adresse</label>
					<textarea name="mod_adr" rows="4" col="35"></textarea>
					
					<br/>	
					<input type="submit" value="Modifier"/>	
				</p>
			</form>
			
			<h2>Modifier un produit</h2>
			
			<form action="manip.php" method="POST">	
				<p>
					<label for="mod_pro">Produit à modifier</label>
					<select name="mod_pro" id="mod_pro">
						<?php
							$reponse = $bdd->query('SELECT idP,nom,des,prix,stock FROM produit'); 
							while ($res = $reponse->fetch()){
								echo '<option value="'.$res['idP'].'">'.$res['nom'].' - '.$res['des'].' - '. $res['prix'] . ' - ' . $res['stock'] . '</option>';
							}
							$reponse->closeCursor();										
						?>		
					</select>	
					<br/><br/>
					<label for="mod_nom">Nouveau nom</label>
					<input name="mod_nom" type="text"/>
					<br/><br/>
					<label for="mod_des">Nouvelle description</label>
					<textarea name="mod_des" rows="4" col="35"></textarea>
					<br/><br/>
					<label for="mod_pri">Nouveau prix</label>
					<input name="mod_pri" type="text"/>
					<br/><br/>
					<label for="mod_stk">En stock</label>
					<input name="mod_stk" type="text"/>		
					<br/><br/>
					<input type="submit" value="Modifier"/>	
					
				</p>
			</form>
		</section>
	</body>
</html>
