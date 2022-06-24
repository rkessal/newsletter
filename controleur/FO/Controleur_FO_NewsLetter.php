<?php
	include_once("./vues/Vue_FO_menu.php");
	

	switch($action)
	{
		case "inscrire" :
			include_once("./vues/Vue_FO_NewsLetter.php");
			$vue->menu = new Vue_FO_menu();
			$vue->corps =  new Vue_FO_NewsLetter();
		break;

		case "desinscrire" :
			include_once("./vues/Vue_FO_NewsLetter_Desinscription.php");
			$vue->menu = new Vue_FO_menu();
			$vue->corps =  new Vue_FO_NewsLetter_Desinscription();
		break;

		case "desinscription" :
		include_once("./vues/Vue_FO_NewsLetter_Desinscription.php");
			
			$vue->menu = new Vue_FO_menu();
			$vue->corps =  new Vue_FO_NewsLetter_Desinscription();
			if(isset($_REQUEST["mail"]))
			{
				$tableau = $monPdo->inscrit_liste();

				foreach ($tableau as $uneligne) {
					if ($uneligne['mail'] == $_REQUEST["mail"])
					{
						$idDesinscription = $uneligne['idInscrit'];
					}
				}


				if($monPdo->inscrit_supprimer($idDesinscription))
					$vue->corps->setMessage("desinscription réussie");
				else
					$vue->corps->setMessage("Erreur");
			}
			else
				$vue->corps->setMessage("Mail non saisi");
		break;

		case "inscription" :
			include_once("./vues/Vue_FO_NewsLetter.php");
			
			$vue->menu = new Vue_FO_menu();
			$vue->corps =  new Vue_FO_NewsLetter();
			if(isset($_REQUEST["mail"]))
			{
				if($monPdo->inscrit_insert($_REQUEST["mail"]))
					$vue->corps->setMessage("Inscription réussie");
				else
					$vue->corps->setMessage("Erreur");
			}
			else
				$vue->corps->setMessage("Mail non saisi");			

		break;
		
		default :
			$vue->menu = new Vue_FO_menu();
			
			break;

		
	}
	
	
?>