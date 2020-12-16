<?php


//Ici on contrôle le mot de passe et email de l'utilisateur
function validationConnexion(){
    //attribu vérificationen status false par défaut
    $verificationStatus = false;
    //role null si pas authentifier
    $role = null;
    //message alerte
    $message = '<div class="alert alert-success"> Connexion réussie</div>';
    //attribution input dans une variable
    $email = htmlentities($_POST['email'], ENT_QUOTES);
    //attribution input dans une variable
    $password = htmlentities($_POST['password'], ENT_QUOTES);
    //verification cryptage du mot passe
    $passHash = password_hash($password, PASSWORD_DEFAULT);
    $passwordValid = password_verify($_POST['password'], $passHash); // On crypte le mot

    $datajson = file_get_contents("../../data/users.json");

    $data = json_decode($datajson, true);
    //recherche dns le tableau
    foreach ($data as $value) {
        //comparaison par mail
        if ($value['emailUser'] == $email) {
            //comparaison mot passe
            if ($value['passwordUser'] == $passwordValid) {
                //si enregistrerr en tant cuisinier
                if ($value['role'] == "cuisinier") {
                    $verificationStatus = true;
                    $_SESSION['cuisinierLoggedIn'] = true;
                    $_SESSION['id'] = $value['id'];
                    $_SESSION['ateliers'] = $value['ateliers'];
                    header('Location: ./compteCuisinier.php');
                } 
                //si enregristrer en tant user
                if($value['role'] == "user"){
                    $role = 'user';
                    $verificationStatus = true;
                    $_SESSION['particulierLoggedIn'] = true;
                    $_SESSION['id'] = $value['id'];
                    $_SESSION['ateliers'] = $value['ateliers'];
                    header('Location: ./home.php?page=1');
                }
                //si c'est un admin
                if($value['role'] == "admin"){
                    $role = 'admin';
                    $verificationStatus = true;
                    $_SESSION['adminLoggedIn'] = true;
                    $_SESSION['id'] = $value['id'];
                    header('Location: ./home.php?page=1');
                }
            }
        }
    }
    //message alerte si probleme
    if (!$verificationStatus) {
        $message = '<div class="alert alert-danger">Compte ou mot de passe incorrects !</div>';
    }
    return array($verificationStatus, $role, $message);
}

//function de jordan
function isLoggedIn()
{
    if ($_SESSION['adminLoggedIn'] || $_SESSION['cuisinierLoggedIn'] || $_SESSION['particulierLoggedIn']) {
        return true;
    } else {
        return false;
    }
}
