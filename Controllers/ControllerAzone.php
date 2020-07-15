<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

require_once('Views/View.php');

class ControllerAzone
{
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
            throw new Exception('... Controller: Page non trouvé ...');
        else
            $this->aZone();
    }

    private function aZone()
    {
        $aZone = [];

        $this->_view = new View('Azone');
        $this->_view->generate(array('Azone' => $aZone));
    }
}