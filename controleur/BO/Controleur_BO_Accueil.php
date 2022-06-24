<?php
	require("./vues/Vue_BO_menu.php");
	require("./vues/Vue_FO_menu.php");
	
	switch($action)
	{
		case "deconnexion":
			$vue->menu = new Vue_FO_menu();
			SESSION_Utilisateur_Oublier();
			break;
		default:
			$vue->menu = new Vue_BO_menu();
			
			break;
	}
?>