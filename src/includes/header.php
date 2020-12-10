<?php 
    define('__ROOT__', dirname(dirname(__DIR__)));  
    require_once(__ROOT__.'/src/class/AccesBDD.php');
        
    AccesBDD::userData();
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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../styles/style.css">
    <script src="https://use.fontawesome.com/c18e5332f2.js"></script>


  </head>

    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="#">
    <img src="../../images/logo.png" width="30" height="30" alt="">
  Application</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="d-flex justify-content-end w-100">


    <ul class="navbar-nav my-2 my-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    </div>
  </div>
</nav>
</header>
