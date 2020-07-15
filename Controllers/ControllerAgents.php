<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

require_once('Views/View.php');

class ControllerAgents
{
    private $_agentsManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
            throw new Exception('... Controller: Page non trouvé ...');
        else
            $this->agents();
    }

    private function agents()
    {
        $this->_agentsManager = new AgentsManager;
        $agents = $this->_agentsManager->getAgents();

        $this->_view = new View('ListeAgents');
        $this->_view->generate(array('agents' => $agents));
    }
}