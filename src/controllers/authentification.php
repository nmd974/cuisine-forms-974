<?php


        $verificationStatus = false;
        $role = null;
        $message = '<div class="alert alert-success"> Connexion réussie</div>';
        $email = htmlentities($_POST['email'], ENT_QUOTES);  //début hash password
        $password = htmlentities($_POST['password'], ENT_QUOTES);
        //sécurisation password par hash
        $passHash = password_hash($password, PASSWORD_DEFAULT);
        $passwordValid = password_verify($_POST['password'], $passHash); // On crypte le mot

    $verificationStatus = false;
    $role = null;
    $message = '<div class="alert alert-success"> Connexion réussie</div>';
    $email = htmlentities($_POST['email'], ENT_QUOTES);
    $password = htmlentities($_POST['password'], ENT_QUOTES);
    $passHash = password_hash($password, PASSWORD_DEFAULT);
    $passwordValid = password_verify($_POST['password'], $passHash); // On crypte le mot
    echo var_dump($passwordValid);

        $data = json_decode($datajson, true);
        
        foreach ($data as $value) {
            //recherche correspondance par mail
            if($value['emailUser'] == $email){
                //recherche correspondance par password
                if($value['passwordUser'] == $passwordValid){
                    //on vérifie si role cuisinier
                    if($value['role'] == "cuisinier"){
                        $verificationStatus = true;
                        $_SESSION['cuisinierLoggedIn'] = true;
                        $_SESSION['id'] = $value['id'];
                        $_SESSION['ateliers'] = $value['ateliers'];
                        header('Location: ./cuistoManager.php');  
                    //sinon c'est un user    
                    }else{
                        $role = 'user';
                        $verificationStatus = true;
                        $_SESSION['particulierLoggedIn'] = true;
                        $_SESSION['id'] = $value['id'];
                        $_SESSION['ateliers'] = $value['ateliers'];
                        header('Location: ./home.php');      
                    }
                }
            }
        }
        //alerte condition incorret !
        if(!$verificationStatus){
            $message = '<div class="alert alert-danger">Compte ou mot de passe incorrects !</div>';
        }
        return array($verificationStatus, $role, $message);

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
