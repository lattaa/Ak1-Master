<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

// Appel du fichier de configuration
    require('Controllers/Setup/config.php' );

function retourJson($res = NULL){
    print json_encode($res);
}


//Connexion à la base de données.
try 
{ 
    $pdo = new PDO('mysql:host='.$dbHost.';port=3476;dbname='.$dbDb.';',$dbUser,$dbPass);
}
catch(Exception $e)
{
    $erreur=array("PROBLEME DE CONNEXION: ".$dbDb => $e->getMessage());
    retourJson($erreur);
    die('PROBLEME DE CONNEXION A LA BASE DE DONNEES: '.$dbDb.' => '.$e->getMessage());
}
