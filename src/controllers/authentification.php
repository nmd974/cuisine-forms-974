<?php
    

    //Ici on contrôle le mot de passe de l'utilisateur
    function validationConnexion($data_entry)
    {
        $verificationStatus = false;
        $role = null;
        $message = '<div class="alert alert-success"> Connexion réussie</div>';
        $pseudo = htmlentities($data_entry['username'], ENT_QUOTES);
        $password = htmlentities($data_entry['password'], ENT_QUOTES);
        $data = recupererUser();
        foreach ($data as $key => $value) {
            if ($value['pseudo'] == $pseudo && $value['password'] == $password){
                if($value['role'] == "admin"){
                    $role = 'admin';
                    $verificationStatus = true;
                    $_SESSION['adminLogged'] = true;
                }else{
                    $role = 'user';
                    $verificationStatus = true;
                    $_SESSION['userLogged'] = true;
                    $_SESSION['id'] = $value['id'];
                    $_SESSION['solde'] = $value['solde'];
                }
            }
        }
        if(!$verificationStatus){
            $message = '<div class="alert alert-danger">Compte ou mot de passe incorrects !</div>';
        }
        return array($verificationStatus, $role, $message);
    }


     //Fonction qui va recuperer le contenu du fichier data.json
     function recupererData()
     {
         $data = json_decode(file_get_contents(__ROOT__.'/src/data/data.json'), true);
         if($data){
             return $data;
         }else{
             return null;
         }
 
     }
         //Fonction qui va recuperer le contenu du fichier user.json
     function recupererUser()
     {
         $data = json_decode(file_get_contents(__ROOT__.'/src/data/users.json'), true);
         if($data){
             return $data;
         }else{
             return null;
         }
     }
?>