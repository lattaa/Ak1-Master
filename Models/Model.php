<?php 
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

abstract class Model
{
    private static $_db;
    
    // Instancie la connexion à la BDD
    private static function setDb()
    {
        $_dbDb = 'ak1bd';
        $_dbHost = '172.10.50.12';
        $_dbPass = 'smsTCH@t18';
        $_dbUser = 'android';

        self::$_db = new PDO('mysql:host='.$_dbHost.';port=3476;dbname='.$_dbDb.';',$_dbUser,$_dbPass);
        self::$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // Récupération de la connexion à la BDD
    protected function getDb()
    {
        if(self::$_db == null)
            self::setDb();
            
        return self::$_db;
    }

    ######### Selectionner toutes les données
    protected function getAll($table, $id, $obj)
    {
        $var = [];
        $req = $this->getDb()->prepare("SELECT * FROM `".$table."` ORDER BY `".$id."` asc");
        $req -> execute();
    
        while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                $var[] = new $obj($data);
            }
            
        return $var;
        $req->closeCursor();
    }
    
    ######### Selectionner une ligne de donnée
    protected function getEnreg($table, $id, $cd, $obj)
    {
        $tab = [];
        $req = $this->getDb()->prepare("SELECT * FROM `".$table."` WHERE `".$id."` = '".$cd."'");
        $req -> execute();
    
        while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                $tab[] = new $obj($data);
            }
            
        return $tab;
        $req->closeCursor();
    }

}