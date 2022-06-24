<?php
class PDO_MonSite
{
	//private static $instanceUnique = null;
    private static $monPdo = null;

	const SERVEUR_SQL = "172.16.1.15";
    const BDD = "KESSALPPE";
    const USER = "KESSALPPE";
    const MDP = "secret";
    

    function __construct()
    {
		try
		{
			if(self::$monPdo == null)
			self::$monPdo = new PDO('mysql:host='.self::SERVEUR_SQL.';dbname='.self::BDD, self::USER, self::MDP, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
		}
		catch (Exception $e)
		{
			
				die('Erreur __construct : ' . $e->getMessage());
		}
		
    }
	
	function utilisateur_verifierConnexion($pseudo, $motDePasse)
    {
        $requetePreparée =  self::$monPdo->prepare('select * from `mvc_utilisateur` where `pseudo` =:paramPseudo ;');
        $requetePreparée->bindParam('paramPseudo',$pseudo);
        $reponse = $requetePreparée->execute(); //$reponse boolean sur l'état de la requête 
		$uneLigne = $requetePreparée->fetch(PDO::FETCH_ASSOC);
		if($uneLigne != false)
		{
			if(password_verify($motDePasse, $uneLigne["motDePasse"]))
				return $uneLigne; //Trouvé et mdp ok
			else 
				return false; //pseudo trouvé, mais MDP pas bon
		}
		else
			return false; //Pseudo pas trouvé
		
        return $reponse;
    }
	
	function utilisateur_ajouter($pseudo, $motDePasseClaire)
    {
		$motDePasseH = password_hash($motDePasseClaire,PASSWORD_DEFAULT);
        $requetePreparée =  self::$monPdo->prepare('INSERT INTO `mvc_utilisateur` (`idUtilisateur`, `pseudo`, `motDePasse`) VALUES (NULL, :paramPseudo , :paramMDPH);');
        $requetePreparée->bindParam('paramPseudo',$pseudo);
		$requetePreparée->bindParam('paramMDPH',$motDePasseH);
        $reponse = $requetePreparée->execute(); //$reponse boolean sur l'état de la requête
        return self::$monPdo->lastInsertId();
    }
	
	function inscrit_liste()
	{
			$requetePreparée =  self::$monPdo->prepare('
				select *
				from mvc_inscrit
				
				') ;
			
			$reponse = $requetePreparée->execute(); //$reponse boolean sur l'état de la requête
			$tableauReponse = $requetePreparée->fetchAll(PDO::FETCH_ASSOC);
			return $tableauReponse; 
	}
	function inscrit_insert($mail)
    {
        $requetePreparée =  self::$monPdo->prepare('INSERT INTO `mvc_inscrit` (`idInscrit`, `mail`) VALUES (NULL, :parammail);');
        $requetePreparée->bindParam('parammail',$mail);
        $reponse = $requetePreparée->execute(); //$reponse boolean sur l'état de la requête
        return $reponse;
    }

 
	function inscrit_supprimer($idInscrit)
    {
        $requetePreparée =  self::$monPdo->prepare('DELETE FROM `mvc_inscrit` where `idInscrit` = :paramidInscrit');
        $requetePreparée->bindParam('paramidInscrit',$idInscrit);
        $reponse = $requetePreparée->execute(); //$reponse boolean sur l'état de la requête
        return $reponse;
    }
	
	function mail_list()
    {
        $requetePreparée =  self::$monPdo->prepare('
				select *
				from mvc_mail
				
				') ;
			
		$reponse = $requetePreparée->execute(); //$reponse boolean sur l'état de la requête
		$tableauReponse = $requetePreparée->fetchAll(PDO::FETCH_ASSOC);
		return $tableauReponse; 
    }

    function mail_envoyer($objet, $corps, $date)
    {
    	$requetePreparée = self::$monPdo->prepare('INSERT INTO mvc_mail (objet, corps, horaire) VALUES (:pobjet, :pcorps, :pdate);');
        $requetePreparée->bindParam('pobjet',$objet);
		$requetePreparée->bindParam('pcorps',$corps);
		$requetePreparée->bindParam('pdate',$date);
        $reponse = $requetePreparée->execute();
        return $reponse;
    }

    function menu_liste()
	{
			$requetePreparée =  self::$monPdo->prepare('
				select *
				from mvc_groupe_menu, mvc_menu
				
				') ;
			
			$reponse = $requetePreparée->execute(); //$reponse boolean sur l'état de la requête
			$tableauReponse = $requetePreparée->fetchAll(PDO::FETCH_ASSOC);
			return $tableauReponse; 
	}
    
}
?>