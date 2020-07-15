<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

require_once('Views/View.php');

class ControllerMzone
{
    private $_zonesManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
            throw new Exception('... Controller: Page non trouvé ...');
        else
            $this->zone();
    }

    private function zone()
    {
        $this->_zonesManager = new ZonesManager;
        $Mzone = $this->_zonesManager->getLaZone();

        $this->_view = new View('Mzone');
        $this->_view->generate(array('Mzone' => $Mzone));
    }
}