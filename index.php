<?php
@session_start();
require("./vues/Vue.class.php");
require("./vues/composantVues.interface.php");
require("./util/PDO_MonSite.class.php");
require("./util/session.util.php");


if(isset($_REQUEST["action"]))
	$action = $_REQUEST["action"];
else
	$action = "default";

$monPdo = new PDO_MonSite();
$vue = new Vue();
if(SESSION_Utilisateur_EstConnecté())
{
	if(isset($_REQUEST["cas"]))
		$cas = $_REQUEST["cas"];
	else
		$cas = "BO_Accueil";

	switch($cas)
	{
		case "BO_Inscrit":
			include "./controleur/BO/Controleur_BO_Inscrit.php";
		break;
		case "BO_NewsLetter":
			include "./controleur/BO/Controleur_BO_NewsLetter.php";
		break;

		case 'BO_Menu_Gerer':
			include "./controleur/BO/Controleur_BO_Menu_Gerer.php";
			break;
		case "BO_Accueil":
		default :
			include "./controleur/BO/Controleur_BO_Accueil.php";
		break;
	}
}
else
{
	if(isset($_REQUEST["cas"]))
		$cas = $_REQUEST["cas"];
	else
		$cas = "FO_Accueil";
	
	switch($cas)
		{
			case "FO_Newsletter":
				include "./controleur/FO/Controleur_FO_NewsLetter.php";
				break;
			case "FO_Connexion":
				include "./controleur/FO/Controleur_FO_Connexion.php";
				break;

			case "FO_Accueil":
			default :
				include "./controleur/FO/Controleur_FO_Accueil.php";
				break;
		}
}
 
 echo $vue->donneHtml();
 
?>