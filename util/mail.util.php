<?php
/*
$e = 'admin@aubryprof.siopergaud.fr'; // Déclaration de l'adresse de destination.
$ne = "admin aubryprof";
$d = 'client@aubryprof.siopergaud.fr';
$o = "test mail !";
$ch = "<H1> Hello !</h1> TEST HTML";
$ct ="Hello, Test TEXTE";
envoieMail($d, $e, $ne, $o, $ct, $ch);*/
/*
	Fonction envoyant un email correctement formaté.
*/
function envoieMail($destinataire, $mailEmetteur, $nomEmetteur, $objet, $corpsTexte, $corpsHTML)
{
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $destinataire)) // On filtre les serveurs qui présentent des bogues.
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}


	$message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";

	//=====Création de la boundary.
	$boundary = "-----=".md5(rand());
	$boundary_alt = "-----=".md5(rand());
	//==========

	//=====Définition du sujet.
	$sujet =  $objet;
	//=========


	//=====Création du header de l'e-mail.
	$header = "From: \"$nomEmetteur\"<$mailEmetteur>".$passage_ligne;
	$header.= "Reply-to: \"$nomEmetteur\" <$mailEmetteur>".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

	//==========
	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
	$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;

	//=====Ajout du message au format texte.
	$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$corpsTexte.$passage_ligne;

	//==========
	$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
	//=====Ajout du message au format HTML.
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$corpsHTML.$passage_ligne;

	//=====On ferme la boundary alternative.
	$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;

	//==========
	$message.= $passage_ligne."--".$boundary.$passage_ligne;

	//=====Envoi de l'e-mail.
	mail($destinataire,$sujet,$message,$header);
}
?>
