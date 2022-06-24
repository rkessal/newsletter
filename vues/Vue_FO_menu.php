<?php 

class Vue_FO_menu implements interface_ComposantVues {
	public function __construct() {  
   }
	
	public function donneTexte()
	{
 
$str = '
		
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
      </button>
      <a class="navbar-brand" href="#">Mon quartier</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
		
		
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">News letter<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?cas=FO_Newsletter&action=inscrire">Inscription</a></li>
			<li><a href="index.php?cas=FO_Newsletter&action=desinscrire">Désinscription</a></li>
          </ul>
        </li>
		
        <li><a href="index.php">Article 1</a></li>
      
	  
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rubrique 1<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php">Article 2</a></li>
			<li><a href="index.php">Article 3</a></li>
          </ul>
        </li>
		</ul>
       <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?cas=FO_Connexion&action=seconnecter"> Se connecter</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>';
return $str;
	}
}
?>