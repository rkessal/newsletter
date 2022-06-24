<?php 

class Vue_BO_Menu_Gerer implements interface_ComposantVues {
	private $rappelMail = null;
	
	public function setRappelMail($rappelMail){
		$this->rappelMail = $rappelMail;
	}
	
	private $message = null;
	
	public function setMessage($message){
		$this->message = $message;
	}
	public function __construct() {  
   }
	
	public function donneTexte()
	{
		$str = "
		<h3>Liste des menus</h3><br>
		<table class='table-responsive  table-striped table-bordered  table-condensed'>
<tr>
					<th>Menus</th>
					<th></th>
</tr>";
		$monPdo = new PDO_MonSite();
		$listeMenu = $monPdo->menu_liste();
		var_dump($listeMenu);
		foreach($listeMenu as $menu)
		{
			$str .="
				<tr>
					<td>".$menu["nom_groupe_menu"]."</td>
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