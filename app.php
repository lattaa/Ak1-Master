<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

// Test version de php
	if (version_compare(PHP_VERSION, '7') < 0) {
    	die('Ak1 nécessite PHP5 pour fonctionner');
	}


// Vérification de la bonne installation de Ak1
	require_once("Controllers/Setup/controllerInstallation.php");

// Charge le router

	define('URL', str_replace("app.php","", (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']==='on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

	require_once("Controllers/Router.php"); 
	
	$router = new Router();
	$router->routeReq();
?>

<!-- fonction javascript -->
	<script src="Controllers/functionsFrontend.js"></script>
