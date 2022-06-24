<?php 

class Vue_BO_Inscrit_Liste implements interface_ComposantVues {
	public function __construct() {  
   }
	
	public function donneTexte()
	{
		$str = "
		<h3>Liste des inscrits</h3><br>
<table class='table-responsive  table-striped table-bordered  table-condensed'>
<tr>
					<th>Pseudo</th>
					<th></th>
</tr>";
		$monPdo = new PDO_MonSite();
		$listeInscrit = $monPdo->inscrit_liste();
		foreach($listeInscrit as $inscrit)
		{
			$str .="
				<tr>
					<td>".$inscrit["mail"]."</td>
					<td>
						<form> 
							<input type='hidden' name='cas' value='BO_Inscrit'>
							<input type='hidden' name='action' value='supprimer'>
							<input type='hidden' name='idInscrit' value='".$inscrit["idInscrit"]."'>
							<input type='submit' value='Supprimer'> 
						</form>
					</td>
					 
				</tr>";
		}		
$str .="</table><br>";

 
return $str;
	}
}
?>