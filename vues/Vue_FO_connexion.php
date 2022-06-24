<?php 

class Vue_FO_connexion implements interface_ComposantVues {
	
	public $message = null;
	public $rappelPseudo = null;
	public function __construct() {  
   }
	
	public function donneTexte()
	{
$str= '
<H3 align =center>Connexion au site</H3>
<form>
  <div class="form-group row">
    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Pseudo</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez le pseudo de connexion" name="pseudo"';
if($this->rappelPseudo != null)
{
	$str.='value="'.$this->rappelPseudo.'"';
}
$str.='>
	</div>
  </div>
  <div class="form-group row">
    <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Mot de passe</label>
	<div class="col-sm-10">
		<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" name="mdp">
	</div>
  </div>
  ';
	if($this->message != null)
	{
		$str=$str.'<br><div class="alert alert-danger" role="alert">'.$this->message.'</div><br>';
	}
$str=$str.'	

  <center>
	<button type="submit" class="btn btn-primary">Envoyer</button>
	</center>
	<input type="hidden" name="cas" value="FO_Connexion">
	<input type="hidden" name="action" value="connexion">
</form>
';

return $str;
	}
}
?>