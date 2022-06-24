<?php

function SESSION_Utilisateur_Enregistrer($idUtilisateur )
{
	$_SESSION["idUtilisateur"] = $idUtilisateur; 
}

function SESSION_Utilisateur_EstConnecté()
{
	if(isset($_SESSION["idUtilisateur"]))
		//if(is_int($_SESSION["idUtilisateur"]))
			return true;
		
	return false;
}		
	
function SESSION_Utilisateur_Oublier()
{
	session_destroy();
    unset($_SESSION); 
}

function SESSION_DonneUtilisateur()
{
	if(isset($_SESSION))
		if(isset($_SESSION["idUtilisateur"]))
			return $_SESSION["idUtilisateur"]; 
	return -1;
}	
 
?>