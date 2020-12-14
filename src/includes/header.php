<?php
    define('__ROOT__', dirname(dirname(__DIR__))); 
    require_once(__ROOT__.'/src/controllers/accesData.php');

    
    // On lance la session
    session_start();
    //On vérifie si l'admin est connecte
    if(!isset($_SESSION['adminLoggedIn'])){
        $_SESSION['adminLoggedIn'] = false;
    }
    //On verifie si un cuisinier est connecte
    if(!isset($_SESSION['cuisinierLoggedIn'])){
        $_SESSION['cuisinierLoggedIn'] = false;
    }
    //On verifie si un utilisateur est connecte
    if(!isset($_SESSION['particulierLoggedIn'])){
        $_SESSION['particulierLoggedIn'] = false;
        // $_SESSION['id'] = "53d76686b5ad4c04e63460b7bb02ec85";
    }
    if(isset($_SESSION['id'])){
        $_SESSION['id'] = false;
    }

    
    // $_SESSION['particulierLoggedIn'] = true;
    // $_SESSION['id'] = "53d76686b5ad4c04e63460b7bb02ec85";
    // $_SESSION['inscription_atelier']=["53d76686b5ad4c04e63460b7bb02ec85"]

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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/loader.css">
    <script src="https://use.fontawesome.com/c18e5332f2.js"></script>
    <title>
        <?php if($title){
            echo $title;
        }else{
            echo "Ateliers cuisine";
        }?>
    </title>

  </head>

<body id="body">
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../pages/home.php">
    <img src="../../images/logo.png" width="30" height="30" alt="">
  Application</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="d-flex justify-content-between align-items-center w-100">


    <ul class="navbar-nav my-2 my-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="../pages/home.php">Accueil</a>
      </li>
      <?php if($_SESSION['cuisinierLoggedIn'] == true):?>
        <li class="nav-item">
            <a class="nav-link" href="../pages/ajoutAtelier.php">Ajout atelier</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../pages/cuistoManager.php">Cuisto manager</a>
        </li>
      <?php endif ?>
    </ul>

    <!--Ici on gere l'affichage du bouton se connecter si personne est connecte-->
    <?php if(!$_SESSION['adminLoggedIn'] && !$_SESSION['cuisinierLoggedIn'] && !$_SESSION['particulierLoggedIn'] ):?> 
        
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="d-flex">
                            <span class="text-dark effect-underline font-weight-bold">Non connecté</pspan>
                        </div>
                        <div>
                            <a href="../pages/authentification.php" class="text-white effect-underline font-weight-bold">
                            <button class="btn btn-primary">Se connecter <i class="fa fa-sign-out" aria-hidden="true"></i></button></a>
                        </div>
                        
                    </div>
                <?php endif ?>
                <?php if($_SESSION['particulierLoggedIn'] == true):?> 
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="d-flex">
                            <span class="text-dark effect-underline font-weight-bold">Connecté :</pspan>
                            <?php $data_user = getUserData();?>
                            <?php if($data_user):?>
                                <?php foreach($data_user as $key => $user):?>
                                    <?php if($_SESSION['id'] == $user['id']):?>
                                        <span class="text-dark effect-underline font-weight-bold text-center ml-2"><?= $user['nomUser'] ?> <?= $user['prenomUser'] ?></span>
                                    <?php endif?>
                                <?php endforeach?>
                            <?php endif?>
                        </div>
                        <div>
                            <a href="../controllers/logout.php" class="text-white effect-underline font-weight-bold">
                            <button class="btn btn-primary">Se déconnecter <i class="fa fa-sign-in" aria-hidden="true"></i></button></a>
                        </div>
                        
                    </div>
                <?php endif ?>
                <?php if($_SESSION["adminLoggedIn"] == true):?> 
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="d-flex">
                            <span class="text-dark effect-underline font-weight-bold">Mode admin active</pspan>
                        </div>
                        <div>
                            <a href="../controllers/logout.php" class="text-white effect-underline font-weight-bold">
                            <button class="btn btn-primary">Se déconnecter <i class="fa fa-sign-in" aria-hidden="true"></i></button></a>
                        </div>
                        
                    </div>
                <?php endif ?>
                <?php if($_SESSION['cuisinierLoggedIn'] == true):?> 
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="d-flex">
                            <span class="text-dark effect-underline font-weight-bold">Connecté :</pspan>
                            <?php $data_user = getUserData();?>
                            <?php if($data_user):?>
                                <?php foreach($data_user as $key => $user):?>
                                    <?php if($_SESSION['id'] == $user['id']):?>
                                        <span class="text-dark effect-underline font-weight-bold text-center ml-2"><?= $user['nomUser'] ?> <?= $user['prenomUser'] ?></span>
                                    <?php endif?>
                                <?php endforeach?>
                            <?php endif?>
                        </div>
                        <div>
                            <a href="../controllers/logout.php" class="text-white effect-underline font-weight-bold">
                            <button class="btn btn-primary">Se déconnecter <i class="fa fa-sign-in" aria-hidden="true"></i></button></a>
                        </div>
                        
                    </div>
                <?php endif ?>
    </div>
  </div>
</nav>
<?php 
    if(isset($titlePage)):?>{
    <div class="container mt-5 titrePage">
        <h1 class="text-center align-middle font-weight-bold"><?php echo $titlePage?></h1>
    </div>';
    
<?php endif ?>
