<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

require_once('Views/View.php');

class ControllerSociete
{
    private $_societeManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
            throw new Exception('Page introuvable');
        else
            $this->societes();
    }

    private function societes()
    {
        $this->_societeManager = new SocieteManager;
        $societes = $this->_societeManager->getSociete();

        $this->_view = new View('Societe');
        $this->_view->generate(array('societes' => $societes));
    }
}