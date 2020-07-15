<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

class SocieteManager extends Model
{
    public function getSociete()
    {
        return $this->getAll('t_societes', 'id_soc', 'Societe');
    }
}