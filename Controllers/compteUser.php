<?php
    session_start();
    
    if(!isset($_SESSION['login']) || !isset($_SESSION['ip']))
    {
        header("Location:../app.php?erreur=aurevoir");
        exit();
    }
?>
