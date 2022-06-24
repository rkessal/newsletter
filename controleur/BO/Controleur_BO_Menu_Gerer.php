<?php
	include_once("./vues/Vue_BO_menu.php");
	

	switch($action)
	{
		case "gerer" :
			include_once("./vues/Vue_BO_Menu_Gerer.php");
			$vue->menu = new Vue_BO_menu();
			$vue->corps =  new Vue_BO_Menu_Gerer();
		break;

		case "default" :
		default :
			$vue->menu  = new Vue_BO_menu();
			break;	
	}
	
	
?>