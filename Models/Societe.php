<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

class Societe
{
    private $_cd_py;
    private $_cd_soc;
    private $_rs_soc;
    private $_ad_soc;
    private $_ml_soc;
    private $_tl1_soc;
    private $_tl2_soc;
    private $_id_cnss;
    private $_dat_cnss;
    private $_logo;

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
    public function setLogo($logo)
    {
        if(is_string($logo))
            $this->_logo = $logo;
    }

    public function setCd_py($cdpy)
    {
        if(is_string($cdpy))
            $this->_cd_py = $cdpy;
    }
    public function setCd_soc($cdsoc)
    {
        if(is_string($cdsoc))
            $this->_cd_soc = $cdsoc;
    }
    public function setRs_soc($rssoc)
    {
        if(is_string($rssoc))
            $this->_rs_soc = $rssoc;
    }
    public function setAd_soc($adsoc)
    {
        if(is_string($adsoc))
            $this->_ad_soc = $adsoc;
    }
    public function setMl_soc($mlsoc)
    {
        if(is_string($mlsoc))
            $this->_ml_soc = $mlsoc;
    }
    public function setTl1_soc($tl1soc)
    {
        if(is_string($tl1soc))
            $this->_tl1_soc = $tl1soc;
    }
    public function setTl2_soc($tl2soc)
    {
        if(is_string($tl2soc))
            $this->_tl2_soc = $tl2soc;
    }
    public function setId_cnss($idcnss)
    {
        if(is_string($idcnss))
            $this->_id_cnss = $idcnss;
    }
    public function setDat_cnss($datcnss)
    {
            $this->_dat_cnss = $datcnss;
    }

    //GETTERS
    public function logo()
        {
            return $this->_logo;
        }
    public function cdpy()
    {
        return $this->_cd_py;
    }

    public function cdsoc()
        {
            return $this->_cd_soc;
        }
    public function rs()
        {
            return $this->_rs_soc;
        }
    public function ad()
        {
            return $this->_ad_soc;
        }
    public function ml()
        {
            return $this->_ml_soc;
        }
    public function tl1()
        {
            return $this->_tl1_soc;
        }
    public function tl2()
        {
            return $this->_tl2_soc;
        }
    public function cnss()
        {
            return $this->_id_cnss;
        }
    public function dtcnss()
        {
            return $this->_dat_cnss;
        }

}