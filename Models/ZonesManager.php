<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

class ZonesManager extends Model
{
    public function getZones()
    {
        return $this->getAll('t_zones', 'cd_zn', 'Zones');
    }

    public function getLaZone()
    {
        list($url,$act) = explode('?cd=', $_SERVER['REQUEST_URI']);
        
        return $this->getEnreg('t_zones', 'cd_zn', $act, 'Zones');
    }

}