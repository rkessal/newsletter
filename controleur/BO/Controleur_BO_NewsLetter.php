<?php
	include_once("./vues/Vue_BO_menu.php");
	

	switch($action)
	{
		case "liste" :
			include_once("./vues/Vue_BO_Mail_Liste.php");
			$vue->menu = new Vue_BO_menu();
			$vue->corps =  new Vue_BO_Mail_Liste();
		break;
		case "rediger" :
			include_once("./vues/Vue_BO_Mail_Rediger.php");
			$vue->menu = new Vue_BO_menu();
			$vue->corps =  new Vue_BO_Mail_Rediger();
			
			break;

		case "redaction" :
			include_once("./vues/Vue_BO_Mail_Rediger.php");
			$vue->menu = new Vue_BO_menu();
			$vue->corps =  new Vue_BO_Mail_Rediger();
			$date = date("Y-m-d h:i:s");
		if(isset($_REQUEST["objet"]) || isset($_REQUEST["corps"]) )
			{
				$req = $monPdo->mail_envoyer($_REQUEST["objet"], $_REQUEST["corps"], $date);
				if($req)
				{
					$vue->corps->setMessage("Article envoyé");
				}
				else
				{
					$vue->corps->setMessage("Erreur");
				}
			}
			else
				$vue->corps->setMessage("Objet ou Corps");
		break;

		case "default" :
		default :
			$vue->menu  = new Vue_BO_menu();
			break;	
	}
	
	
?>