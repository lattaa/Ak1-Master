<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

// Charge le router
	require_once("Views/View.php");
	
class Router
{
	private $_ctrl;
	private $_view;

	public function routeReq()
	{
		try
		{
			//Chargement automatique des classes
			spl_autoload_register(function($class){
				require_once('Models/'.$class.'.php');
			});

			$url ='';

			// Le controller est inclus selon l'action de l'utilisateur
			if(isset($_GET['url']))
			{
				$url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

				$controller = ucfirst(strtolower($url[0]));
				$controllerClass = "Controller".$controller;
				$controllerFile = "Controllers/".$controllerClass.".php";

				if(file_exists($controllerFile))
				{
					require_once($controllerFile);
					$this->_ctrl = new $controllerClass($url);
				}
				else
					throw new Exception('... Router: Page Non Trouvé ...');
			}
			else
			{
				require_once('Views/viewLogin.php');
				//$this->_ctrl = new ControllerLogin($url);

			}
		}
		// Gestio des erreurs
		catch(Exception $e)
		{
			$errorMsg = $e->getMessage();
			$this->_view = new View('Error');
			$this->_view->generate(array('errorMsg' => $errorMsg));
		}
	}
}

?>