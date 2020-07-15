<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

class Zones
{
    private $_cd_ag;
    private $_cd_zn;
    private $_nom_zn;
    private $_dat_zn;
    private $_eff_zn;

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
    public function setCd_zn($cdzn)
    {
        if(is_string($cdzn))
            $this->_cd_zn = $cdzn;
    }
    public function setNom_zn($nmzn)
    {
        if(is_string($nmzn))
            $this->_nom_zn = $nmzn;
    }
    public function setDat_zn($datzn)
    {
        if(is_string($datzn))
            $this->_dat_zn = $datzn;
    }
    public function setEff_zn($effzn)
    {
        if(is_string($effzn))
            $this->_eff_zn = $effzn;
    }

    //GETTERS
    public function code()
        {
            return $this->_cd_zn;
        }
    public function nom()
        {
            return $this->_nom_zn;
        }
    public function dats()
        {
            return $this->_dat_zn;
        }
    public function eff()
        {
            return $this->_eff_zn;
        }

}