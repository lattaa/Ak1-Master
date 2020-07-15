<?php 
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

//Toutes les actions passent par ici pour etre envoyer en traitement.
	// Appelle de la page métier
    include_once '../Models/Actions.php';

class RouteurActions extends Actions
{
    public function __construct()
    {
        $this->rootAction();
    } 

    // Récupération de la valeur de l'action
    private function getAction()
    {
        return (isset($_GET["act"])) ? $_GET["act"]:" ";
    }

    // Suite des traites à faire
    private function rootAction()
    {
        $action = $this->getAction();

        switch ($action)
        { 
            ###########################################################
            // Authentification de l'utilisateur	
            case "User":
            {   
                $logTxt                 = $_POST['Email'];
                list($logTxt,$logMail)  = explode("@",$logTxt);
                $passTxt 				= md5($_POST['Passwd']);
                if($this->getLogin($logTxt,$passTxt)==1) { header("Location:../acces"); }

            } break;

            ###########################################################
	        // Demande de déconnexion de l´utilisateur	
            case "Exit":
            {
                $this->exitUser();
                
            } break;

            ###########################################################
	        // Suppression de zone	
            case "supp":
            {
                $cd =$_GET["cd"];
                $tb =$_GET["nm"];
                $id =$_GET["id"];
                $fr =$_GET["fr"];

                $this->dropData($cd, $tb, $id, $fr);
                
            } break;

            ###########################################################
	        // Ajout de zone	
            case "ajtZone":
            {
                $cod = $_POST["code"];
                $nom = $_POST["nomZn"];
                $dat = $_POST["datZn"];

                $this->ajtZone($cod, $nom, $dat, 'zones');
                
            } break;

            ###########################################################
	        // Modification de zone	
            case "mdZone":
            {
                $cod = $_POST["code"];
                $nom = $_POST["nomZn"];
                $dat = $_POST["datZn"];

                $this->modZone($cod, $nom, $dat, 'zones');
                
            } break;

            ###########################################################
	        // Ajouter un agent	
            case "ajtAgent":
            {
                $nmPers 	= $_POST['nmPers'];
                $prmPers	= $_POST['prmPers'];
                $entree 	= $_POST['entree'];
                $contrat	= $_POST['contrat'];
                $diplome	= $_POST['diplome'];
                $telPers	= $_POST['telPers'];
                $cel1Pers	= $_POST['cel1Pers'];
                $cel2Pers	= $_POST['cel2Pers'];
                $mailPers	= $_POST['mailPers'];
                $phPers 	= $_FILES['phPers']['name'];
                $photName	= $_FILES['phPers']['name'];
                $photTmp	= $_FILES['phPers']['tmp_name'];
                $photError	= $_FILES['phPers']['error'];
                $dtNais 	= $_POST['dtNais'];
                $lieNais	= $_POST['lieNais'];
                $sexPers	= $_POST['sexPers'];
                $cdPy		= "+228";
                $villePers	= $_POST['villePers'];
                $nmPrm		= $_POST['nmPrm'];
                $cel1Cas	= $_POST['cel1Cas'];
                $cel2Cas	= $_POST['cel2Cas'];
                $pceIdn 	= $_POST['pceIdn'];
                $pceIdnP	= $_POST['pceIdnP'];
                $tyPers 	= "TP04";
    
                $this->prdPhoto($photName, $photTmp, $photError);
                        
                if($mailPers<>"") { // Création de login
                    list($pseudo,$site)=explode("@",$mailPers);
                } else { $pseudo=$nmPers.$this->codeAleatoire(3); }
           
                // Enregistrement de la nouvelle personne
                    $this->nvlPerson($nmPers,$prmPers,$telPers,$cel1Pers,$cel2Pers,$mailPers,$phPers,$dtNais,$lieNais,$sexPers,$cdPy,$villePers,$nmPrm,$cel1Cas,$cel2Cas,$pceIdn,$pceIdnP,$tyPers,$pseudo,$entree,$contrat,$diplome);
                    
            } break;

            ###########################################################
	        // Ajouter un agent	
            case "mdAgent":
            {
                $Pers 	= $_POST['Pers'];
                $nmPers 	= $_POST['nmPers'];
                $prmPers	= $_POST['prmPers'];
                $diplome	= $_POST['diplome'];
                $telPers	= $_POST['telPers'];
                $cel1Pers	= $_POST['cel1Pers'];
                $cel2Pers	= $_POST['cel2Pers'];
                $mailPers	= $_POST['mailPers'];
                $phPers 	= $_FILES['phPers']['name'];
                $photName	= $_FILES['phPers']['name'];
                $photTmp	= $_FILES['phPers']['tmp_name'];
                $photError	= $_FILES['phPers']['error'];
                $lieNais	= $_POST['lieNais'];
                $villePers	= $_POST['villePers'];
                $nmPrm		= $_POST['nmPrm'];
                $cel1Cas	= $_POST['cel1Cas'];
                $cel2Cas	= $_POST['cel2Cas'];
                $pceIdn 	= $_POST['pceIdn'];
                $pceIdnP	= $_POST['pceIdnP'];
                $tyPers 	= "TP04";
    
                $this->prdPhoto($photName, $photTmp, $photError);
                        
                if($mailPers<>"") { // Création de login
                    list($pseudo,$site)=explode("@",$mailPers);
                } else { $pseudo=$nmPers.$this->codeAleatoire(3); }
           
                // Enregistrement de la modification    
                    $this->mdPerson($Pers,$nmPers,$prmPers,$telPers,$cel1Pers,$cel2Pers,$mailPers,$phPers,$lieNais,$villePers,$nmPrm,$cel1Cas,$cel2Cas,$pceIdn,$pceIdnP,$tyPers,$pseudo,$diplome);
                    
            } break;

        break;
        }
    }

}

$router = new RouteurActions;

?>
