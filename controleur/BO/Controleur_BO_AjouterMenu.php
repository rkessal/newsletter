<?php
	include_once("./vues/Vue_BO_menu.php");
	

	switch($action)
	{
		case "ajouterMenu" :
			include_once("./vues/Vue_BO_menuAjouter.php");
			$vue->menu = new Vue_BO_menu();
			$vue->corps =  new Vue_BO_menuAjouter();
		break;

		case "default" :
		default :
			$vue->menu  = new Vue_BO_menuAjouter();
			break;	
	}
	
	
?>