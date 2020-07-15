<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

class Users
{
    private $_mle_pers;
    private $_mle_agt;
    private $_nm_pers;
    private $_prm_pers;
    private $_login;
    private $_actif;
    private $_connecte;
    private $_dt_cnx;
    private $_modif;
    
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method))
                $this->$method($value);
        }
    }

    //SETTERS
    public function setMle_pers($mlep)
    {
        if(is_string($mlep))
            $this->_mle_pers = $mlep;
    }
    public function setMle_agt($mlea)
    {
        if(is_string($mlea))
            $this->_mle_agt = $mlea;
    }
    public function setNm_pers($nom)
    {
        if(is_string($nom))
            $this->_nm_pers = $nom;
    }
    public function setPrm_pers($prm)
    {
        if(is_string($prm))
            $this->_prm_pers = $prm;
    }
    public function setLogin($login)
    {
        if(is_string($login))
            $this->_login = $login;
    }
    public function setActif($actif)
    {
        if(is_string($actif))
            $this->_actif = $actif;
    }
    public function setConnecte($cnx)
    {
        if(is_string($cnx))
            $this->_connecte = $cnx;
    }
    public function setDt_cnx($dt)
    {
        if(is_string($dt))
            $this->_dt_cnx = $dt;
    }
    public function setModif($mod)
    {
        if(is_string($mod))
            $this->_modif = $mod;
    }
    
    //GETTERS
    public function mlep()
        {
            return $this->_mle_pers;
        }
    public function mlea()
        {
            return $this->_mle_agt;
        }
    public function nom()
        {
            return $this->_nm_pers;
        }
    public function prm()
        {
            return $this->_prm_pers;
        }
    public function login()
        {
            return $this->_login;
        }
    public function actif()
        {
            return $this->_actif;
        }
    public function dt()
        {
            return $this->_dt_cnx;
        }
    public function connecte()
        {
            return $this->_connecte;
        }
    public function modif()
        {
            return $this->_modif;
        }

}