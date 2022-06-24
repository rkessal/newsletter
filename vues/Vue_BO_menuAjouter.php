<?php 

class Vue_BO_menuAjouter implements interface_ComposantVues {
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
		<h3>Ajouter un menu</h3><br>
<form>
  <div class="form-group row">
    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Menu</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nom du menu" name="objet"';
if($this->rappelMail != null)
{
	$str.='value="'.$this->rappelMail.'"';
}
$str.='>
	</div>
  </div>
  <div class="form-group row">
  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Corps</label>
	<div class="col-sm-8">
  	<textarea class="summernote" name="corps"></textarea>
  	</div>
  	</div>
  	<script>
      $(".summernote").summernote({
        placeholder: "Votre article",
        tabsize: 2,
        height: 100
      });
    </script>
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
	<input type="hidden" name="cas" value="BO_NewsLetter">
	<input type="hidden" name="action" value="redaction">
</form>';
return $str;
	}
}
?>