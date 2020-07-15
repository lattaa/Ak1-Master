<?php
class View
{
    private $_file;
    private $_titre;

    public function __construct($action)
    {
        $this->_file = 'Views/view'.$action.'.php';
    }

    // Génére et affiche la vue
    public function generate($data)
    {
        // Partie spécifique de la vue
        $content = $this->generateFile($this->_file, $data);

        // Template
        $view = $this->generateFile('Views/Template.php', array('titre' => $this->_titre, 'content' => $content));

        echo $view;
    }

    // Génère un fichier vue et renvoie le resultat produit
    private function generateFile($file, $data)
    {
        if(file_exists($file))
        {
            extract($data);
            
            ob_start();
            
            // inclut le fichier vue
            require $file;

            return ob_get_clean();
        }
        else
            throw new Exception('Fichier '.$file.' introuvable');
    }
}