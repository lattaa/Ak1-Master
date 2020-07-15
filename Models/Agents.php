<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

class Agents
{
    private $_mle_pers;
    private $_mle_agt;
    private $_nm_pers;
    private $_prm_pers;
    private $_sex_pers;
    private $_dt_nais;
    private $_lie_nais;
    private $_ph_pers;
    private $_pce_idn_p;
    private $_ville_pers;
    private $_tel_pers;
    private $_cel1_pers;
    private $_cel2_pers;
    private $_mail_pers;
    private $_dipl_agt;
    private $_dt_entree;
    private $_retr_agt;
    private $_contrat;

    private $_nm_prm;
    private $_cel1;
    private $_cel2;
    private $_pce;
    
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
    public function setSex_pers($sexe)
    {
        if(is_string($sexe))
            $this->_sex_pers = $sexe;
    }
    public function setDt_nais($nais)
    {
        if(is_string($nais))
            $this->_dt_nais = $nais;
    }
    public function setLie_nais($lieu)
    {
        if(is_string($lieu))
            $this->_lie_nais = $lieu;
    }
    public function setPh_pers($photo)
    {
        if(is_string($photo))
            $this->_ph_pers = $photo;
    }
    public function setPce_idn_p($pce)
    {
        if(is_string($pce))
            $this->_pce_idn_p = $pce;
    }
    public function setVille_pers($ville)
    {
        if(is_string($ville))
            $this->_ville_pers = $ville;
    }
    public function setTel_pers($tel)
    {
        if(is_string($tel))
            $this->_tel_pers = $tel;
    }
    public function setCel1_pers($cel1)
    {
        if(is_string($cel1))
            $this->_cel1_pers = $cel1;
    }
    public function setCel2_pers($cel2)
    {
        if(is_string($cel2))
            $this->_cel2_pers = $cel2;
    }
    public function setMail_pers($mail)
    {
        if(is_string($mail))
            $this->_mail_pers = $mail;
    }
    public function setDipl_agt($dipl)
    {
        if(is_string($dipl))
            $this->_dipl_agt = $dipl;
    }
    public function setDt_entree($entree)
    {
        if(is_string($entree))
            $this->_dt_entree = $entree;
    }
    public function setRetr_agt($retr)
    {
        if(is_string($retr))
            $this->_retr_agt = $retr;
    }
    public function setContrat($contrat)
    {
        if(is_string($contrat))
            $this->_contrat = $contrat;
    }


    public function setNm_prm($nmprm)
    {
        if(is_string($nmprm))
            $this->_nm_prm = $nmprm;
    }
    public function setCel1($cell1)
    {
        if(is_string($cell1))
            $this->_cel1 = $cell1;
    }
    public function setCel2($cell2)
    {
        if(is_string($cell2))
            $this->_cel2 = $cell2;
    }
    public function setPce($pce1)
    {
        if(is_string($pce1))
            $this->_pce = $pce1;
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
    public function sexe()
        {
            return $this->_sex_pers;
        }
    public function nais()
        {
            return $this->_dt_nais;
        }
        public function lieu()
        {
            return $this->_lie_nais;
        }
        public function photo()
        {
            return $this->_ph_pers;
        }
        public function pce()
        {
            return $this->_pce_idn_p;
        }
        public function ville()
        {
            return $this->_ville_pers;
        }
        public function tel()
        {
            return $this->_tel_pers;
        }
        public function cel1()
        {
            return $this->_cel1_pers;
        }
        public function cel2()
        {
            return $this->_cel2_pers;
        }
        public function mail()
        {
            return $this->_mail_pers;
        }
        public function diplome()
        {
            return $this->_dipl_agt;
        }
        public function entree()
        {
            return $this->_dt_entree;
        }
        public function retraite()
        {
            return $this->_retr_agt;
        }
        public function contrat()
        {
            return $this->_contrat;
        }


        public function pnm()
        {
            return $this->_nm_prm;
        }
        public function cell1()
        {
            return $this->_cel1;
        }
        public function cell2()
        {
            return $this->_cel2;
        }
        public function pce1()
        {
            return $this->_pce;
        }

}