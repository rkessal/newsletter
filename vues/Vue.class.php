<?php
class Vue {
   public $menu = null;
   public $corps = null;
   public $basDePage = null;
   
   private static $_instance = null;

   public function __construct() {  
   }

   
   
   public function donneHtml(){
	   $var = '<!DOCTYPE html>
		<html lang="fr">
		<head>
		  <!-- Required meta tags -->
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		  <!-- Bootstrap CSS -->
		  <!--link rel="stylesheet" href="./include/bootstrap/bootstrap.css" -->
		  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
		  <link rel="stylesheet" href="./include/css/style.css" >
		  
		   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
		  <script src="./include/jquery/jquery.js" ></script>

		  <!--script src="./include/bootstrap/bootstrap.js" ></script-->
		  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script> 
		  
		  
		  <link href="./include/summernote/summernote.css" rel="stylesheet">
			<script src="./include/summernote/summernote.js"></script>

		</head>
		<body>';
		
		if(isset ($this->menu))
			{
				$var = $var .$this->menu->donneTexte();
			}
		if(isset ($this->corps))
			{
				$var = $var ."<div class='col-centered'><center>";
				$var = $var .$this->corps->donneTexte();
				$var = $var ."</center></div>";
			}
		if(isset ($this->basDePage))
			{
				$var = $var .$this->basDePage->donneTexte();
			}
	     
		$var=$var.'</body>
		</html>';
		return $var;
   }
}
?>