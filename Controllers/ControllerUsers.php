<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

require_once('Views/View.php');

class ControllerUsers
{
    private $_usersManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
            throw new Exception('... ControllerUsers: Page non trouvé ...');
        else
            $this->users();
    }

    private function users()
    {
        $this->_usersManager = new UsersManager;
        $users = $this->_usersManager->getUsers();

        $this->_view = new View('ListeUsers');
        $this->_view->generate(array('users' => $users));
    }
}