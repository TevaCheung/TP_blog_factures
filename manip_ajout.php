<?php
	//ajout client
	if (!empty($_POST['upseudo'])  &&  isset($_POST['upseudo']) && !empty($_POST['umdp'])  &&  isset($_POST['umdp']) && !empty($_POST['uadresse']) && isset($_POST['uadresse'] )){
		echo "<strong class=\"ok\">Client ajouté à la base !</strong> <br/>";
		
		try{
		$upseudo=strval(htmlspecialchars($_POST['upseudo']));
		$umdp=strval(htmlspecialchars($_POST['umdp']));
		$uadresse=strval(htmlspecialchars($_POST['uadresse']));
		
		$sql = "INSERT INTO utilisateur(pseudo,mdp,adresse)
				VALUES ('{$upseudo}','{$umdp}','{$uadresse}')";
				


		$bdd->exec($sql) or die(print_r($bdd->errorInfo(), true));
		}
		
		catch(PDOException $e) { 
				echo "PDOException: " . $e->getMessage(); 
				exit();
		}
	}
	
	//ajout facture
	if (!empty($_POST['fidu']) && isset($_POST['fidu']) && !empty($_POST['fjour']) && isset($_POST['fjour']) && !empty($_POST['fmois']) && isset($_POST['fmois']) && !empty($_POST['fjour']) && isset($_POST['fjour'])){
		
		$idu=intval(htmlspecialchars($_POST['fidu']));		
		$annee=intval(htmlspecialchars($_POST['fannee']));
		$mois=intval(htmlspecialchars($_POST['fmois']));
		$jour=intval(htmlspecialchars($_POST['fjour']));

		//annee bissextile ?
		if(($annee%4==0 && $annee%100!==0) || $annee%400==0){
			//jour impossible selon le mois ?
			if (($mois==2 && $jour>29) || ($mois!=2 && $mois%2==0 && $jour>30)){
				echo "<strong class=\"ko\">ANNEE BISSEXTILE !</strong><br/>";
				echo "<strong class=\"ko\">Erreur : maximum de jours dépassé pour le mois choisi.</strong><br/>";
			}else{
				
				$annee=strval(htmlspecialchars($_POST['fannee']));
				$mois=strval(htmlspecialchars($_POST['fmois']));
				$jour=strval(htmlspecialchars($_POST['fjour']));
				
				$date=$annee . '-' . $mois . '-' .$jour;
				
				$sql = "INSERT INTO facture(idu,dateF)
				VALUES ('{$idu}','{$date}')";	
				
				$bdd->exec($sql) or die(print_r($bdd->errorInfo(), true));		
				
				echo "<strong class=\"ok\">Facture ajoutée à la base !</strong> <br/>";
			}
		}else{
			if (($mois==2 && $jour>28) || ($mois!=2 && $mois%2==0 && $jour>30)){
				echo "<strong class=\"ko\">Erreur : maximum de jours dépassé pour le mois choisi.</strong><br/>";
			}else{
				
				$annee=strval(htmlspecialchars($_POST['fannee']));
				$mois=strval(htmlspecialchars($_POST['fmois']));
				$jour=strval(htmlspecialchars($_POST['fjour']));
				
				$date=$annee . '-' . $mois . '-' .$jour;
				
				$sql = "INSERT INTO facture(idu,dateF)
				VALUES ('{$idu}','{$date}')";	
				
				$bdd->exec($sql) or die(print_r($bdd->errorInfo(), true));	

				echo "<strong class=\"ok\">Facture ajoutée à la base !</strong> <br/>";
			}	
		}	
	}
	
	//ajout produit	
	if (isset($_POST['pnom']) && !empty($_POST['pnom']) && isset($_POST['pdes']) && !empty($_POST['pdes']) && isset($_POST['pprix']) && !empty($_POST['pprix']) && isset($_POST['pstock']) && !empty($_POST['pstock'])){
			$nom=strval(htmlspecialchars($_POST['pnom']));
			$des=strval(htmlspecialchars($_POST['pdes']));
			$prix=floatval(htmlspecialchars($_POST['pprix']));
			$stock=intval(htmlspecialchars($_POST['pstock']));	

			if ($prix<0) $prix=0;
			if ($stock<0) $stock=0;

			$sql = "INSERT INTO produit(nom,des,prix,stock)
			VALUES ('{$nom}','{$des}','{$prix}','{$stock}')";	
				
			$bdd->exec($sql) or die(print_r($bdd->errorInfo(), true));	

			echo "<strong class=\"ok\">Produit ajouté à la base ! </strong><br/>";		
	}


?>