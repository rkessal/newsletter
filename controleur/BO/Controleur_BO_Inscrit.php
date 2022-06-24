<?php
	require("./vues/Vue_BO_menu.php");
	

	switch($action)
	{
		case "liste" :
			require("./vues/Vue_BO_Inscrit_Liste.php");
			$vue->menu = new Vue_BO_menu();
			$vue->corps =  new Vue_BO_Inscrit_Liste();
		break;
		case "supprimer" :
			if(isset($_REQUEST["idInscrit"]))
			{
				include_once("./vues/Vue_BO_Inscrit_Liste.php");
				$monPdo->inscrit_supprimer($_REQUEST["idInscrit"]);
				$vue->menu = new Vue_BO_menu();
				$vue->corps =  new Vue_BO_Inscrit_Liste();
			}
		break;
		case "default" :
		default :
			Vues::getInstance()->menu = new Vue_BO_menu();
			
			break;

		
	}
	
	
?>