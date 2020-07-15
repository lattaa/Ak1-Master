<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

class Agence
{
    private $_cd_soc;
    private $_cd_ag;
    private $_nm_ag;
    private $_ad_ag;
    private $_ml_ag;
    private $_tl1_ag;
    private $_tl2_ag;
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
    public function setCd_soc($cdsoc)
    {
        if(is_string($cdsoc))
            $this->_cd_soc = $cdsoc;
    }
    public function setCd_ag($cdag)
    {
        if(is_string($cdag))
            $this->_cd_ag = $cdag;
    }
    public function setNm_ag($nmag)
    {
        if(is_string($nmag))
            $this->_nm_ag = $nmag;
    }
    public function setAd_ag($adag)
    {
        if(is_string($adag))
            $this->_ad_ag = $adag;
    }
    public function setMl_ag($mlag)
    {
        if(is_string($mlag))
            $this->_ml_ag = $mlag;
    }
    public function setTl1_ag($tl1ag)
    {
        if(is_string($tl1ag))
            $this->_tl1_ag = $tl1ag;
    }
    public function setTl2_ag($tl2ag)
    {
        if(is_string($tl2ag))
            $this->_tl2_ag = $tl2ag;
    }

    //GETTERS
    public function logo()
        {
            return $this->_logo;
        }
    public function cdsoc()
        {
            return $this->_cd_soc;
        }
    public function cdag()
        {
            return $this->_cd_ag;
        }
    public function nom()
        {
            return $this->_nm_ag;
        }
    public function ad()
        {
            return $this->_ad_ag;
        }
    public function ml()
        {
            return $this->_ml_ag;
        }
    public function tl1()
        {
            return $this->_tl1_ag;
        }
    public function tl2()
        {
            return $this->_tl2_ag;
        }

}