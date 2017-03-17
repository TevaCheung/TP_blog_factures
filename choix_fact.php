<?php	
	if (isset($_POST['annee']) && isset($_POST['mois']) && !empty($_POST['annee']) && !empty($_POST['mois'])){
		if ($_POST['annee']==-1){ //tous les ans
			if ($_POST['mois']==-1){ //tous les mois
				$reponse=$bdd->query("SELECT pseudo, facture.idF as nomfacture, nom, prix, qte, dateF
							FROM utilisateur, produit, facture, detailfacture
							WHERE utilisateur.idU = facture.idU
							AND facture.idF = detailfacture.idF
							AND detailfacture.idP = produit.idP
							ORDER BY pseudo ASC"); 
				$nb_lignes=$reponse->rowCount();
							
				echo '<table>';					
					echo '<tr>';
					echo '<th>Acheteur</th>';
					echo '<th>Numéro de facture</th>';
					echo '<th>Produit</th>';
					echo '<th>Prix unitaire</th>';
					echo '<th>Quantité</th>';
					echo '<th>Date d\'achat</th>';
					echo'</tr>';

					while ($res = $reponse->fetch()){
						echo '<tr>';
						echo'<td>' .  $res['pseudo'] . '</td>';
						echo'<td>' . $res['nomfacture'] .'</td>';
						echo'<td>' . $res['nom'] .'</td>';
						echo'<td>' . $res['prix'] .'</td>';
						echo'<td>' . $res['qte'] .'</td>';
						echo'<td>' . $res['dateF'] .'</td>';
						echo'</tr>';			
					}
				echo '</table>';
				
				if ($nb_lignes==0){
					echo "Aucun résultat";
				}
				

				$reponse->closeCursor();
			}else if($_POST['mois']!=-1){ //un mois en particulier
				$reponse=$bdd->query("SELECT pseudo,facture.idF as nomfacture,nom,prix,qte,dateF
							FROM utilisateur,produit,facture,detailfacture
							WHERE utilisateur.idU=facture.idU
							AND facture.idF=detailfacture.idF
							AND detailfacture.idP=produit.idP
							AND MONTH(dateF)={$_POST['mois']}
							ORDER BY pseudo ASC"); 
				$nb_lignes=$reponse->rowCount();
				
				echo '<table>';
					echo '<tr>';
					echo '<th>Acheteur</th>';
					echo '<th>Numéro de facture</th>';
					echo '<th>Produit</th>';
					echo '<th>Prix unitaire</th>';
					echo '<th>Quantité</th>';
					echo '<th>Date d\'achat</th>';
					echo'</tr>';

					while ($res = $reponse->fetch()){
						echo '<tr>';
						echo'<td>' .  $res['pseudo'] . '</td>';
						echo'<td>' . $res['nomfacture'] .'</td>';
						echo'<td>' . $res['nom'] .'</td>';
						echo'<td>' . $res['prix'] .'</td>';
						echo'<td>' . $res['qte'] .'</td>';
						echo'<td>' . $res['dateF'] .'</td>';
						echo'</tr>';			
					}
				echo '</table>';
				
				if ($nb_lignes==0){
					echo "Aucun résultat";
				}
		
				$reponse->closeCursor();	
			 }
		}else if ($_POST['annee']!=-1){ //une annee en particulier
			if ($_POST['mois']==-1){ //tous les mois	
				$reponse=$bdd->query("SELECT pseudo, facture.idF as nomfacture, nom, prix, qte, dateF
								FROM utilisateur, produit, facture, detailfacture
								WHERE utilisateur.idU = facture.idU
								AND facture.idF = detailfacture.idF
								AND detailfacture.idP = produit.idP
								AND YEAR(dateF)={$_POST['annee']}
								ORDER BY pseudo ASC"); 
				$nb_lignes=$reponse->rowCount();
								
					echo '<table>';						
						echo '<tr>';
						echo '<th>Acheteur</th>';
						echo '<th>Numéro de facture</th>';
						echo '<th>Produit</th>';
						echo '<th>Prix unitaire</th>';
						echo '<th>Quantité</th>';
						echo '<th>Date d\'achat</th>';
						echo'</tr>';

						while ($res = $reponse->fetch()){				
							echo '<tr>';
							echo'<td>' .  $res['pseudo'] . '</td>';
							echo'<td>' . $res['nomfacture'] .'</td>';
							echo'<td>' . $res['nom'] .'</td>';
							echo'<td>' . $res['prix'] .'</td>';
							echo'<td>' . $res['qte'] .'</td>';
							echo'<td>' . $res['dateF'] .'</td>';
							echo'</tr>';			
						}
					echo '</table>';
					
				if ($nb_lignes==0){
					echo "Aucun résultat";
				}

					$reponse->closeCursor();
				
				}else if ($_POST['mois']!=-1){ // un mois en particulier
					$reponse=$bdd->query("SELECT pseudo, facture.idF as nomfacture, nom, prix, qte, dateF
									FROM utilisateur, produit, facture, detailfacture
									WHERE utilisateur.idU = facture.idU
									AND facture.idF = detailfacture.idF
									AND detailfacture.idP = produit.idP
									AND YEAR(dateF)={$_POST['annee']}
									AND MONTH(dateF)={$_POST['mois']}
									ORDER BY pseudo ASC"); 
					$nb_lignes=$reponse->rowCount();
									
						echo '<table>';							
							echo '<tr>';
							echo '<th>Acheteur</th>';
							echo '<th>Numéro de facture</th>';
							echo '<th>Produit</th>';
							echo '<th>Prix unitaire</th>';
							echo '<th>Quantité</th>';
							echo '<th>Date d\'achat</th>';
							echo'</tr>';

							while ($res = $reponse->fetch()){
					
							echo '<tr>';
							echo'<td>' . $res['pseudo'] . '</td>';
							echo'<td>' . $res['nomfacture'] .'</td>';
							echo'<td>' . $res['nom'] .'</td>';
							echo'<td>' . $res['prix'] .'</td>';
							echo'<td>' . $res['qte'] .'</td>';
								echo'<td>' . $res['dateF'] .'</td>';
							echo'</tr>';			
							}
						echo '</table>';
					
					if ($nb_lignes==0){
						echo "Aucun résultat";
					}
				}
		}			
		$reponse->closeCursor();	
			
	}	
?>