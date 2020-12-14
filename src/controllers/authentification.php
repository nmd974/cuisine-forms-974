<?php
    

    //Ici on contrôle le mot de passe et email de l'utilisateur
    if (isset($_POST['activer'])) {

        $verificationStatus = false;
        $role = null;
        $message = '<div class="alert alert-success"> Connexion réussie</div>';
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $datajson = file_get_contents("../../data/users.json");

        $data = json_decode($datajson, true);
        
        foreach ($data as $value) {
            if (isset($value['emailUser']) == $email AND ($value['passwordUser'] == $password)) {
                if($value['role'] == "cuisinier"){
                    $verificationStatus = true;
                    $_SESSION['cuisinierLoggedIn'] = true;
                    $_SESSION['id'] = $value['id'];
                    header('Location: ../includes/cuisinier/ateliersmanager.php');      
                }else{
                    $role = 'user';
                    $verificationStatus = true;
                    $_SESSION['particulierLoggedIn'] = true;
                    $_SESSION['id'] = $value['id'];
                    header('Location: ../../pages/home.php');      
                }
            }
        }
        if(!$verificationStatus){
            $message = '<div class="alert alert-danger">Compte ou mot de passe incorrects !</div>';
        }
        return array($verificationStatus, $role, $message);

    }


         //Fonction qui va recuperer le contenu du fichier user.json
     function recupererUser()
     {
         $data = json_decode(file_get_contents(__ROOT__.'data/users.json'), true);
         if($data){
             return $data;
         }else{
             return null;
         }
     }

     function isLoggedIn():bool
     {
         if($_SESSION['adminLoggedIn'] || $_SESSION['cuisinierLoggedIn'] || $_SESSION['particulierLoggedIn']){
             return true;
         }else{
             return false;
         }
     }
?>