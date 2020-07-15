<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

require_once('Views/View.php');

class ControllerAgence
{
    private $_agenceManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
            throw new Exception('Page introuvable');
        else
            $this->agence();
    }

    private function agence()
    {
        $this->_agenceManager = new AgenceManager;
        $agences = $this->_agenceManager->getAgence();

        $this->_view = new View('Agence');
        $this->_view->generate(array('agences' => $agences));
    }
}