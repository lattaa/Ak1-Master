<?php
/*
* Copyright 2016, 2017 Latta & Co.
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/
 
$correctInstall="n";
$msg="";

if(file_exists("Setup/config.php")) {
    require_once("Setup/config.php");
    $correctInstall = 'y';

    if (@($GLOBALS["mysqli"] = mysqli_connect("$dbHost",  "$dbUser",  "$dbPass"))) {
        if (@((bool)mysqli_query($GLOBALS["mysqli"], "USE `$dbDb`"))) {
			
            // Premier test
            $liste2 = array();
            
            $tableNames = mysqli_query($GLOBALS["mysqli"], "SHOW TABLES FROM `$dbDb`");
            while ($row = mysqli_fetch_row($tableNames)) {
                $liste2[] = $row[0];
            }
            
            $flag = 'no';

            if ($flag == 'yes') {
                $msg = "<p>La connexion au serveur est établie mais certaines tables sont absentes de la base $dbDb.</p>";
                $correctInstall = 'n';

            } else {
				
                //test sur le contenu des tables
                $sql="SELECT * FROM t_agents;";
                $req = mysqli_query($GLOBALS["mysqli"], $sql);
                $test = mysqli_num_rows($req);
                
                if ($test == '0') {
                    //$msg = "<p>Il n'y a aucun utilisateur créé !</p>";
                    $msg = "<p>Aucun utilisateur dans la base de données!</p>";
                    $correctInstall = 'n';
                }
                          
                // Récupération des adresses MAC et IP	
                        $ipm  = $_SERVER['REMOTE_ADDR'];
 
                // Vérificaton d'autorisation de la machine
                        $sql = 'SELECT ip FROM v_mch_auto WHERE ip = "'.$ipm.'"';
  
                        $req = mysqli_query($GLOBALS["mysqli"], $sql); $res=mysqli_num_rows($req);
  
                // Rediriger vers le site de l'éditeur
                         if($res== '0') { header("Location:http://www.google.tg"); } 
    
            }
        } else {
            $msg = "<p>La connexion au serveur est établie mais impossible de sélectionner la base contenant les tables A4.</p>";
            $correctInstall = 'n';
        }
    } else {
        $msg = "<p>Erreur de connexion au serveur BD. Le fichier \"config.php\" ne contient peut-être pas les bonnes informations de connexion.</p>";
        $correctInstall = 'n';
    }
}

if($correctInstall=='y') {

    // Affichage de la vue
	require_once("Views/viewInstallation.html");
    
    die(); } ?>
