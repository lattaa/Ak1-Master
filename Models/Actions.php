<?php 
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

    // Appel du fichier de configuration
        require('../Controllers/Setup/config.php' );

abstract class Actions
{
    private static $_bdd;
    
    // Instancie la connexion à la BDD
    private static function setBdd()
    {
        global $dbDb;
        global $dbHost;
        global $dbPass;
        global $dbUser;
    
        self::$_bdd = new PDO('mysql:host='.$dbHost.';port=3476;dbname='.$dbDb.';',$dbUser,$dbPass);
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // Récupération de la connexion à la BDD
    protected function getBdd()
    {
        if(self::$_bdd == null)
            self::setBdd();
        return self::$_bdd;
    }

    ######### Vérification d'identité
    protected function getLogin($logTxt,$passTxt) 
    {
        session_start();
        $ok=0;

        $req = $this->getBdd()->prepare("SELECT * FROM `v_users_auto` WHERE `login` = :logTxt AND `motpass` = :passTxt");
        $req -> bindParam(':logTxt',$logTxt);
        $req -> bindParam(':passTxt',$passTxt);
        $req -> execute();

        $ok = $req -> rowCount();
        $res = $req -> fetch(PDO::FETCH_ASSOC);

        if ($ok == 0) 
            { header("Location:../app.php?erreur=incorrect"); }
	    else {
            $_SESSION['login']   = $res['login'];
            $_SESSION['nom']     = $res['nm_pers'].' '.$res['prm_pers'];
            $_SESSION['nm_sr']   = $res['nm_sr'];
            $_SESSION['appliq']  = $res['applic'];
            
            $_SESSION['poste']   = $res['lib_pst'];
            $_SESSION['cdsoc']   = $res['cdsoc'];
            $_SESSION['nm_agce'] = $res['nom_agce'];
            $_SESSION['agce']    = $res['agce'];
            $_SESSION['cd_n']    = $res['cd_n'];
            $_SESSION['lib_n']   = $res['lib_n'];

            $_SESSION['ip']		 = $_SERVER['REMOTE_ADDR'];
            
            $req = $this->getBdd()->query("UPDATE `t_agents` SET `connecte` = 'O' WHERE `login` = '".$logTxt."'");
            $ok=1;
        }
        $req->closeCursor();
        return $ok;
    }

    ######### Déconnecter utilisateur du système
    protected function exitUser()
    {
        session_start();

	    $req='UPDATE `t_agents` SET `connecte` = "N" WHERE `login` = "'.$_SESSION['login'].'"'; // Vérificaton d'autorisation de la machine

        if($this->getBdd()->query($req))
		{
        // Rediriger vers la sortie
            session_destroy();
		    header("Location:../app.php?erreur=aurevoir");
        }
	    else { header("Location:../acces"); }
	
    }

    ######## Suppression de données dans une table
    protected function dropData($cd, $tb, $id, $fr)
    {
        $red="DELETE FROM `".$tb."` WHERE `".$id."` = '".$cd."'"; // Vérificaton d'autorisation de la machine

        if($this->getBdd()->query($red))
		{
		    header("Location:../".$fr."?c=1");
        }
	    else { header("Location:../".$fr."?c=4"); }

    }
    
    ######## Modification de zone
    protected function modZone($cod, $nom, $dat, $fr)
    {
        $red="UPDATE `t_zones` SET `nom_zn` = '".$nom."', `dat_zn`='".$dat."' WHERE `cd_zn`='".$cod."'"; // Vérificaton d'autorisation de la machine

        if($this->getBdd()->query($red))
		{
		    header("Location:../".$fr."?c=3");
        }
	    else { header("Location:../".$fr."?c=4"); }

    }

    ######## Ajout de zone
    protected function ajtZone($cod, $nom, $dat, $fr)
    {
        session_start();

        $red="INSERT INTO `t_zones`(`cd_ag`,`cd_zn`,`nom_zn`,`dat_zn`,`utilis_zn`) VALUES ('".$_SESSION['agce']."','".$cod."','".$nom."','".$dat."','".$_SESSION['login']."')"; // Vérificaton d'autorisation de la machine
    
        if($this->getBdd()->query($red))
            {
                header("Location:../".$fr."?c=2");
            }
        else { header("Location:../".$fr."?c=4"); }
    
    }

    ######### Copie de la photo
    protected function prdPhoto($photName, $photTmp, $photError) {
  
        // Constantes
            define('TARGET', '../Views/Styles/img/photos/');    // Repertoire cible
            define('MAX_SIZE', 1000000);    // Taille max en octets du fichier
            define('WIDTH_MAX', 8000);    // Largeur max de l'image en pixels
            define('HEIGHT_MAX', 8000);    // Hauteur max de l'image en pixels
     
        // Tableaux de donnees
            $tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
            $infosImg = array();
     
        // Variables
            $extension = '';
            $message = '';
            $nomImage = '';
     
        // Recuperation de l'extension du fichier
            $extension  = pathinfo($photName, PATHINFO_EXTENSION);
     
        // On verifie l'extension du fichier
        if(in_array(strtolower($extension),$tabExt))
        {
          // On recupere les dimensions du fichier
          $infosImg = getimagesize($photTmp);
     
          // On verifie le type de l'image
          if($infosImg[2] >= 1 && $infosImg[2] <= 14)
          {
            // On verifie les dimensions et taille de l'image
            if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($photTmp) <= MAX_SIZE))
            {
              // Parcours du tableau d'erreurs
              if(isset($photError) 
                && UPLOAD_ERR_OK === $photError)
              {
                // On renomme le fichier
                $nomImage = $photName; //md5(uniqid()) .'.'. $extension;
     
                // Si c'est OK, on teste l'upload
                if(move_uploaded_file($photTmp, TARGET.$nomImage))
                {
                  $message = 'OK!';
                }
                else
                {
                  // Sinon on affiche une erreur systeme
                  $message = 'Problème lors de l\'upload !';
                }
              }
              else
              {
                $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
              }
            }
            else
            {
              // Sinon erreur sur les dimensions et taille de l'image
              $message = 'Erreur dans les dimensions de l\'image !';
            }
          }
          else
          {
            // Sinon erreur sur le type de l'image
            $message = 'Le fichier à uploader n\'est pas une image !';
          }
        }
        else
        {
          // Sinon on affiche une erreur pour l'extension
          $message = 'L\'extension du fichier est incorrecte !';
        }
     return $message;
     }
    
    ######### Création de code aléatoire
    protected function codeAleatoire($a)
    {
        // Connexion à la Base de données
	        $characts		 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
	        $characts		.= '1234567890'; 
	        $codeAleatoire  = ''; 

	    for($i=0; $i < $a; $i++)    //$a est le nombre de caractères
	        { 
                $codeAleatoire .=substr($characts,rand()%(strlen($characts)),1); 
	        }
	    return $codeAleatoire; 
    }

    ######### Mle d'une nouvelle personne
    protected function mlePers()	{
	    $id=0;
	
        $req = $this->getBdd()->prepare("SELECT MAX(id_pers) as `id` from `t_personnes`");
        $req -> execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);

    	$id	= $res['id'];
	  
	    if($id<10) { $id='00000'.$id; } 
	    if(($id >= 10) and ($id < 100)) { $id='0000'.$id; } 
	    if(($id >= 100) and ($id < 1000)) { $id='000'.$id; } 
	    if(($id >= 1000) and ($id < 10000)) { $id='00'.$id; } 
	    if(($id >= 10000) and ($id < 100000)) { $id='0'.$id; } 
	 
        $req->closeCursor();

        return $id;
    }

    ######### Mle d'un nouveau agent
    protected function mleAgt()	{
	    $id=0;
	
        $req = $this->getBdd()->prepare("SELECT MAX(id_agt) as `id` from `t_agents`");
        $req -> execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);

    	$id	= $res['id'];
	  
	    if($id<10) { $id='000'.$id; } 
	    if(($id >= 10) and ($id < 100)) { $id='00'.$id; } 
	    if(($id >= 100) and ($id < 1000)) { $id='0'.$id; } 
	 
        $req->closeCursor();

        return $id;
    }

    ######### Vérifie l'existance de la nouvelle personne
    protected function personExist($nmPers, $prmPers, $dtNais) {

        $req = $this->getBdd()->prepare("SELECT `mle_pers` FROM `t_personnes` WHERE `nm_pers`='".$nmPers."' AND `prm_pers`='".$prmPers."' AND `dt_nais`='".$dtNais."'");
        $req -> execute();
 
        if($res = $req->fetch(PDO::FETCH_ASSOC)) {  return 'O'; }
        else { return 'N'; }
    }

    ######### Enregistre du type de personne
    protected function enregAgt($pers,$pseudo,$diplome,$entree,$nais,$contrat,$user)
    {
        if($contrat=="CDI") { list($an,$ms,$jr)=explode("-",$nais); $retr=60+$an.'-'.$ms.'-'.$jr; }

        $sql4 = 'INSERT INTO `t_agents`(`mle_pers`,`mle_agt`,`login`,`dipl_agt`,`dt_entree`,`cd_tp_cnt`,`retr_agt`,`user_agt`) VALUES ("'.$pers.'","'.$this->mleAgt().'","'.$pseudo.'","'.$diplome.'","'.$entree.'","'.$contrat.'","'.$retr.'","'.$user.'")';
	
	    if($this->getBdd()->query($sql4)) { return 1; }
	    else { return 0; }
    }

    ######### Enregistre du type de personne
    protected function personCas($mlePers,$nmPrm,$cel1,$cel2,$pce,$user)
    {
        $sql4 = 'INSERT INTO `t_aprevenir`(`mle_pers`,`nm_prm`,`cel1`,`cel2`,`pce`,`user_ap`) VALUES ("'.$mlePers.'","'.$nmPrm.'","'.$cel1.'","'.$cel2.'","'.$pce.'","'.$user.'")';
	
	    if($this->getBdd()->query($sql4)) { return 1; }
	    else { return 0; }
    }

    ######### Enregistre une nouvelle personne
    protected function nvlPerson($nmPers,$prmPers,$telPers,$cel1Pers,$cel2Pers,$mailPers,$phPers,$dtNais,$lieNais,$sexPers,$cdPy,$villePers,$nmPrm,$cel1Cas,$cel2Cas,$pceIdn,$pceIdnP,$tyPers,$pseudo,$entree,$contrat,$diplome)
    {
        session_start();
    	$mlePers = $this->mlePers();
	
	 // Vérificaton d'autorisation de la machine
        $sql = 'INSERT  INTO `t_personnes`(`cd_ty_ps`,`mle_pers`,`nm_pers`,`prm_pers`,`sex_pers`,`dt_nais`,`lie_nais`,`ph_pers`,`pce_idn_p`,`cd_py`,`ville_pers`,`tel_pers`,`cel1_pers`,`cel2_pers`,`mail_pers`,`user_pers`) VALUES("'.$tyPers.'","'.$mlePers.'","'.$nmPers.'","'.$prmPers.'","'.$sexPers.'","'.$dtNais.'","'.$lieNais.'","'.$phPers.'","'.$pceIdnP.'","'.$cdPy.'","'.$villePers.'","'.$telPers.'","'.$cel1Pers.'","'.$cel2Pers.'","'.$mailPers.'","'.$_SESSION['login'].'")';

	    $avis = $this->personExist($nmPers, $prmPers, $dtNais);

        if(($avis=='N') && ($this->getBdd()->query($sql))) { 

	        // Suite des traitements à faire
		    if(($tyPers=="TP03")or($tyPers=="TP04")) { $this->enregAgt($mlePers,$pseudo,$diplome,$entree,$dtNais,$contrat,$_SESSION['login']); }
	
	        if(($nmPrm<>'') && ($pceIdn<>'')) { $this->personCas($mlePers,$nmPrm,$cel1Cas,$cel2Cas,$pceIdn,$_SESSION['login']); }
	
	        header("Location:../agents?c=2");
 
        }
        else { header("Location:../aagent?c=4"); }
}

    ######### Enregistre une modification de personne
    protected function mdPerson($Pers,$nmPers,$prmPers,$telPers,$cel1Pers,$cel2Pers,$mailPers,$phPers,$lieNais,$villePers,$nmPrm,$cel1Cas,$cel2Cas,$pceIdn,$pceIdnP,$tyPers,$pseudo,$diplome)
    {
        session_start();
	
	 // Vérificaton d'autorisation de la machine
        $sql = 'UPDATE `t_personnes` SET `nm_pers`="'.$nmPers.'",`prm_pers`="'.$prmPers.'",`lie_nais`="'.$lieNais.'",`ph_pers`="'.$phPers.'",`pce_idn_p`="'.$pceIdnP.'",`ville_pers`="'.$villePers.'",`tel_pers`="'.$telPers.'",`cel1_pers`="'.$cel1Pers.'",`cel2_pers`="'.$cel2Pers.'",`mail_pers`="'.$mailPers.'" WHERE `mle_pers`="'.$Pers.'"';

        if($this->getBdd()->query($sql)) { 

	        // Suite des traites à faire
	        if(($nmPrm<>'') && ($pceIdn<>'')) { $this->getBdd()->query('UPDATE `t_aprevenir` SET `nm_prm`="'.$nmPrm.'",`cel1`="'.$cel1Cas.'",`cel2`="'.$cel2Cas.'",`pce`="'.$pceIdn.'" WHERE `mle_pers`="'.$Pers.'"'); }
            
                $this->getBdd()->query('UPDATE `t_agents` SET `login`="'.$pseudo.'", `dipl_agt`="'.$diplome.'" WHERE `mle_pers`="'.$Pers.'"');
	
	        header("Location:../agents?c=3");
 
        }
        else { header("Location:../aagent?c=4"); }
}

}
?>
