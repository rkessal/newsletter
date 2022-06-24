<?php 

class Vue_FO_NewsLetter implements interface_ComposantVues {
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
		$str = '
		<h3>Inscription à la news letter</h3><br>
<form>
  <div class="form-group row">
    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Mail</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez le mail à inscrire" name="mail"';
if($this->rappelMail != null)
{
	$str.='value="'.$this->rappelMail.'"';
}
$str.='>
	</div>
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
	<input type="hidden" name="cas" value="FO_Newsletter">
	<input type="hidden" name="action" value="inscription">
</form>';
return $str;
	}
}
?>