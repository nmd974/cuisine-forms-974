<?php 
    define('__ROOT__', dirname(dirname(__DIR__)));  
    require_once(__ROOT__.'/src/class/AccesBDD.php');

    print_r(AccesBDD::userData());
    //On lance la session
    // session_start();
    // //On vérifie si l'admin est connecte
    // if(!isset($_SESSION['adminLoggedIn'])){
    //     $_SESSION['adminLoggedIn'] = false;
    // }
    // //On verifie si un cuisinier est connecte
    // if(!isset($_SESSION['cuisinierLoggedIn'])){
    //     $_SESSION['cuisinierLoggedIn'] = false;
    // }
    // //On verifie si un utilisateur est connecte
    // if(!isset($_SESSION['userLoggedIn'])){
    //     $_SESSION['userLoggedIn'] = false;
    // }
?>