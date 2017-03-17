<?php	
	//modif infos client
	if (isset($_POST['mod_psd']) && !empty($_POST['mod_psd'])){
		$psd=strval(htmlspecialchars($_POST['mod_psd']));
		$idu=intval($_POST['mod_cli']);
			
		$sql = "UPDATE utilisateur SET pseudo='{$psd}' WHERE idU={$idu}";	
				
		$bdd->exec($sql) or die(print_r($bdd->errorInfo(), true));

		echo "<strong class=\"ok\">Nouveau pseudo enregistré</strong><br/>";
	}
	 
	if (!empty($_POST['mod_mdp1']) && !empty($_POST['mod_mdp2']) && ($_POST['mod_mdp1']==$_POST['mod_mdp2'])){
		$mdp=strval(htmlspecialchars($_POST['mod_mdp1']));	
		$idu=intval($_POST['mod_cli']);		
		
		$sql = "UPDATE utilisateur SET mdp='{$mdp}' WHERE idU={$idu}";	
				
		$bdd->exec($sql) or die(print_r($bdd->errorInfo(), true));

		echo "<strong class=\"ok\">Nouveau mot de passe enregistré</strong><br/>";			
	}
	
	if (isset($_POST['mod_adr']) && !empty($_POST['mod_adr'])){
		$adr=strval(htmlspecialchars($_POST['mod_adr']));	
		$idu=intval($_POST['mod_cli']);		
		
		$sql = "UPDATE utilisateur SET adresse='{$adr}' WHERE idU={$idu}";	
				
		$bdd->exec($sql) or die(print_r($bdd->errorInfo(), true));

		echo "<strong class=\"ok\">Nouvelle adresse enregistrée</strong><br/>";			
	}
	
	//mod produit
	
	if (isset($_POST['mod_nom']) && !empty($_POST['mod_nom'])){
		$nom=strval(htmlspecialchars($_POST['mod_nom']));
		$idp=intval($_POST['mod_pro']);
			
		$sql = "UPDATE produit SET nom='{$nom}' WHERE idP={$idp}";	
				
		$bdd->exec($sql) or die(print_r($bdd->errorInfo(), true));

		echo "<strong class=\"ok\">Nouveau nom de produit enregistré</strong><br/>";
	}	
	
	if (isset($_POST['mod_des']) && !empty($_POST['mod_des'])){
		$des=strval(htmlspecialchars($_POST['mod_des']));
		$idp=intval($_POST['mod_pro']);
			
		$sql = "UPDATE produit SET des='{$des}' WHERE idP={$idp}";	
				
		$bdd->exec($sql) or die(print_r($bdd->errorInfo(), true));

		echo "<strong class=\"ok\">Nouvelle description enregistrée</strong><br/>";
	}	

	if (isset($_POST['mod_prix']) && !empty($_POST['mod_prix'])){
		$prix=floatval(htmlspecialchars($_POST['mod_prix']));
		$idp=intval($_POST['mod_pro']);
			
		$sql = "UPDATE produit SET prix='{$prix}' WHERE idP={$idp}";	
				
		$bdd->exec($sql) or die(print_r($bdd->errorInfo(), true));

		echo "<strong class=\"ok\">Nouveau prix enregistré</strong><br/>";
	}	
	
	if (isset($_POST['mod_stk']) && !empty($_POST['mod_stk'])){
		$stk=intval(htmlspecialchars($_POST['mod_stk']));
		$idp=intval($_POST['mod_pro']);
			
		$sql = "UPDATE produit SET stock='{$stk}' WHERE idP={$idp}";	
				
		$bdd->exec($sql) or die(print_r($bdd->errorInfo(), true));

		echo "<strong class=\"ok\">Stock mis à jour</strong><br/>";
	}
?>	