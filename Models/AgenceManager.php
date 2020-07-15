<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

class AgenceManager extends Model
{
    public function getAgence()
    {
        return $this->getAll('t_agences', 'id_ag', 'Agence');
    }
}