<?php


//Ici on contrôle le mot de passe et email de l'utilisateur
function validationConnexion(){

    $verificationStatus = false;
    $role = null;
    $message = '<div class="alert alert-success"> Connexion réussie</div>';
    $email = htmlentities($_POST['email'], ENT_QUOTES);
    $password = htmlentities($_POST['password'], ENT_QUOTES);
    $passHash = password_hash($password, PASSWORD_DEFAULT);
    $passwordValid = password_verify($_POST['password'], $passHash); // On crypte le mot

    $datajson = file_get_contents("../../data/users.json");

    $data = json_decode($datajson, true);

    foreach ($data as $value) {
        if ($value['emailUser'] == $email) {
            if ($value['passwordUser'] == $passwordValid) {
                if ($value['role'] == "cuisinier") {
                    $verificationStatus = true;
                    $_SESSION['cuisinierLoggedIn'] = true;
                    $_SESSION['id'] = $value['id'];
                    $_SESSION['ateliers'] = $value['ateliers'];
                    header('Location: ./compteCuisinier.php');
                } 
                if($value['role'] == "user"){
                    $role = 'user';
                    $verificationStatus = true;
                    $_SESSION['particulierLoggedIn'] = true;
                    $_SESSION['id'] = $value['id'];
                    $_SESSION['ateliers'] = $value['ateliers'];
                    header('Location: ./home.php?page=1');
                }
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
    if (!$verificationStatus) {
        $message = '<div class="alert alert-danger">Compte ou mot de passe incorrects !</div>';
    }
    return array($verificationStatus, $role, $message);
}

function isLoggedIn()
{
    if ($_SESSION['adminLoggedIn'] || $_SESSION['cuisinierLoggedIn'] || $_SESSION['particulierLoggedIn']) {
        return true;
    } else {
        return false;
    }
}
