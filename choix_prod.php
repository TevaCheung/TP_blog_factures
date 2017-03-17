<?php
	// recherche par champ uniquement
	if (isset($_POST['rech_prod']) && !empty($_POST['rech_prod']) && empty($_POST['prix_prod'])){
		$reponse=$bdd->query("SELECT idP,nom,des,prix
							FROM produit
							WHERE nom LIKE '%{$rech_prod}%'
							OR upper(nom) LIKE upper( '%{$rech_prod}_')
							OR upper(nom) LIKE upper( '_{$rech_prod}%')
							OR upper(nom) LIKE upper( '_{$rech_prod}_')
							OR upper(nom) LIKE upper( '{$rech_prod}%')
							OR upper(nom) LIKE upper( '{$rech_prod}_')
							OR upper(nom) LIKE upper( '{$rech_prod}')
							OR upper(nom) LIKE upper( '_{$rech_prod}')
							OR upper(nom) LIKE upper( '%{$rech_prod}')
							OR upper(nom) LIKE upper( '%{$rech_prod}_')
							ORDER BY prix DESC");
		$nb_lignes=$reponse->rowCount();
		
		echo '<table>';					
		echo '<tr>';
		echo '<th>Code du produit</th>';
		echo '<th>Nom du produit</th>';
		echo '<th>Description</th>';
		echo '<th>Prix unitaire</th>';
		echo'</tr>';

		while ($res = $reponse->fetch()){			
			echo '<tr>';
			echo'<td>' .  $res['idP'] . '</td>';					
			echo'<td>' .  $res['nom'] . '</td>';
			echo'<td>' . $res['des'] .'</td>';
			echo'<td>' . $res['prix'] .'</td>';
			echo'</tr>';			
		}
		
		echo '</table>';		
		
		if ($nb_lignes==0){		
			echo "Aucun résultat pour la recherche de produit";
		}
				
		$reponse->closeCursor();
	}
	
	//recherche par prix uniquement
	if (!empty($_POST['prix_prod']) && empty($_POST['rech_prod'])){
		$reponse=$bdd->query("SELECT idP,nom,des,prix
							FROM produit
							WHERE prix<={$prix_prod}
							AND( nom LIKE '%{$rech_prod}%'
							OR nom LIKE '%{$rech_prod}_'
							OR nom LIKE '_{$rech_prod}%'
							OR nom LIKE '_{$rech_prod}_'
							OR nom LIKE '{$rech_prod}%'
							OR nom LIKE '{$rech_prod}_'
							OR nom LIKE '{$rech_prod}'
							OR nom LIKE '_{$rech_prod}'
							OR nom LIKE '%{$rech_prod}'
							OR nom LIKE '%{$rech_prod}_')
							ORDER BY prix DESC");
	
		$nb_lignes=$reponse->rowCount();
		
		echo '<table>';					
		echo '<tr>';
		echo '<th>Code du produit</th>';
		echo '<th>Nom du produit</th>';
		echo '<th>Description</th>';
		echo '<th>Prix unitaire</th>';
		echo'</tr>';

		while ($res = $reponse->fetch()){			
			echo '<tr>';
			echo'<td>' . $res['idP'].'</td>';
			echo'<td>' . $res['nom'] . '</td>';
			echo'<td>' . $res['des'] .'</td>';
			echo'<td>' . $res['prix'] .'</td>';
			echo'</tr>';						
		}
		
		echo '</table>';		
		
		if ($nb_lignes==0){		
			echo "Aucun produit n'est en dessous de " . $_POST['prix_prod'] . " euro(s) <br/>";
		}
				
		$reponse->closeCursor();
	
	//recherche par prix ET par champ de recherche
	}else if (!empty($_POST['prix_prod']) && !empty($_POST['rech_prod'])){
		$reponse=$bdd->query("SELECT idP,nom,des,prix
							FROM produit
							WHERE prix<={$prix_prod}
							ORDER BY prix DESC");
	
		$nb_lignes=$reponse->rowCount();
		
		echo '<table>';			
		echo '<tr>';
		echo '<th>Code du produit</th>';
		echo '<th>Nom du produit</th>';
		echo '<th>Description</th>';
		echo '<th>Prix unitaire</th>';
		echo'</tr>';
		
		while ($res = $reponse->fetch()){			
			echo '<tr>';
			echo'<td>' .  $res['idP'] . '</td>';						
			echo'<td>' .  $res['nom'] . '</td>';
			echo'<td>' . $res['des'] .'</td>';
			echo'<td>' . $res['prix'] .'</td>';
			echo'</tr>';			
		}
		
		echo '</table>';		
		
		if ($nb_lignes==0){		
			echo "Aucun produit ne correspond au prix et au nom cherchés <br/>";
		}
				
		$reponse->closeCursor();
		
	}
?>