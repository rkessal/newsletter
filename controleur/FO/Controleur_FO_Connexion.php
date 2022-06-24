<?php
	require("./vues/Vue_FO_menu.php");
	require("./vues/Vue_FO_connexion.php");
	require("./vues/Vue_BO_menu.php");
	
	
	switch($action)
	{
		case "seconnecter":
			$vue->menu = new Vue_FO_menu();
			$vue->corps = new Vue_FO_connexion();
		break;
		case "connexion" :
			if(isset($_REQUEST["pseudo"]) && isset($_REQUEST["mdp"]))
			{
				
				$reponseVerif = $monPdo->utilisateur_verifierConnexion($_REQUEST["pseudo"],$_REQUEST["mdp"]);
				if($reponseVerif != false)
				{
					SESSION_Utilisateur_Enregistrer($reponseVerif["idUtilisateur"]);
					$vue->menu = new Vue_BO_menu();
				}
				else
				{
					$vue->menu = new Vue_FO_menu();
					$vue->corps = new Vue_FO_connexion();
					$vue->corps->rappelPseudo = $_REQUEST["pseudo"]; 
					$vue->corps->message = "Mot de passe incorrect";
				}
			}
			else
			{
				$vue->menu = new Vue_FO_menu();
				$vue->corps = new Vue_FO_connexion();
				if(isset($_REQUEST["pseudo"]))
					$vue->corps->rappelPseudo =$_REQUEST["pseudo"]; 
				$vue->corps->message = "Vous devez saisir les deux champs";
			}
		break;
	
		
	}
	
	
	
?>