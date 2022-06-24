<?php 

class Vue_BO_Mail_Liste implements interface_ComposantVues {
	public function __construct() {  
   }
	
	public function donneTexte()
	{
		$str = "
		<h3>Liste des mails envoyés</h3><br>
<table class='table-responsive  table-striped table-bordered  table-condensed'>
<tr>
					<th>Horaire</th>
					<th>Objet</th>
</tr>";
		$monPdo = new PDO_MonSite();
		$listeMail = $monPdo->mail_list();
		foreach($listeMail as $mail)
		{
			$str .="
				<tr>
					<td>".$mail["horaire"]."</td>
					<td>".$mail["objet"]."</td>
					 
					 
				</tr>";
		}
		if(count($listeMail)==0)
				$str .="
				<tr>
					<td colspan=2>Aucun mail envoyé</td>
					 
					 
				</tr>";
$str .="</table><br>";

 
return $str;
	}
}
?>