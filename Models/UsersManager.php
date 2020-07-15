<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

class UsersManager extends Model
{
    public function getUsers()
    {
        return $this->getAll('v_users', 'mle_agt', 'Users');
    }

    public function getLusers()
    {
        list($url,$act) = explode('?cd=', $_SERVER['REQUEST_URI']);
        
        return $this->getEnreg('v_users', 'mle_agt', $act, 'Users');
    }

}