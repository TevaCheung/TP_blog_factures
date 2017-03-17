<?php
	//supprimer client 
	if (isset($_POST['supp_cli']) && !empty($_POST['supp_cli'])){
		$supp_cli=$_POST['supp_cli'];
			
		$sql = "DELETE FROM utilisateur WHERE idU={$supp_cli}";	
				
		$bdd->exec($sql) or die(print_r($bdd->errorInfo(), true));		

		echo "<strong class=\"ok\">Client supprimé. </strong><br/>";
	}
	
	//supprimer facture
	if (isset($_POST['supp_fac']) && !empty($_POST['supp_fac'])){
		$supp_fac=$_POST['supp_fac'];
			
		$sql = "DELETE FROM facture WHERE idF={$supp_fac}";	
				
		$bdd->exec($sql) or die(print_r($bdd->errorInfo(), true));		

		echo "<strong class=\"ok\">Facture supprimée. </strong><br/>";		
		
	}
	
	//supprimer produit
	if (isset($_POST['supp_prod']) && !empty($_POST['supp_prod'])){
		$supp_prod=$_POST['supp_prod'];
			
		$sql = "DELETE FROM produit WHERE idP={$supp_prod}";	
				
		$bdd->exec($sql) or die(print_r($bdd->errorInfo(), true));		

		echo "<strong class=\"ok\">Produit supprimé. </strong><br/>";		
		
	}


?>