<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

class AgentsManager extends Model
{
    public function getAgents()
    {
        return $this->getAll('v_agents', 'mle_agt', 'Agents');
    }

    public function getLagent()
    {
        list($url,$act) = explode('?cd=', $_SERVER['REQUEST_URI']);
        
        return $this->getEnreg('v_agents', 'mle_agt', $act, 'Agents');
    }

}