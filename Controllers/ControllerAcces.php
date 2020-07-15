<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

require_once('Views/View.php');

class ControllerAcces
{
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
            throw new Exception('Page introuvable');
        else
            $this->acces();
    }

    private function acces()
    {
        $this->_view = new View('Acces');
        $this->_view->generate(array('acces' => ''));
    }
}