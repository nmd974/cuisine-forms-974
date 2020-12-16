<?php

    //envoi données vers json
    //condition clic input signUp
   /* if (isset($_POST['signUp'])) {*/

        //générateur aléatoire id pour la card créer
        $idUser = md5(uniqid(rand(), true)); //On attribue un id unique à l'image via la fonction md5 uniqid et random
        $_POST['id'] = $idUser;
        //variable pour le mailUser
        $emailUser = $_POST['emailUser'];
        //affectation rôle:
        $_POST['role'] = "user";
        $_POST['ateliers'] = [];
        $repass = $_POST['repass'];
        $password = $_POST['passwordUser'];
        $verifiaction = true;
        
        //condition pour vérifier format email valide
        if ( preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " , $emailUser)) {

            //attribution destination json dans variable
            $filename = '../../data/users.json';
            //retourne le contenu du fichier dans une variable de type string
            $jsonString = file_get_contents($filename);
            //Transforme la structure json en array PHP
            $jsonArray = json_decode($jsonString, true);

            foreach ($jsonArray as $value){

           
                if ($emailUser == $value['emailUser']) {

                    $verifiaction = false;
                    echo '<div class="col-md-12 d-flex justify-content-center">
                        <div class="alert alert-danger">Email déjà utilisé !</div></div>';
                }

            }//fin de la recherche

            if ($verifiaction == true) {

                    //séciser champs input et mettre en minuscule email
                    $_POST['emailUser'] = strtolower($_POST['emailUser']);
                    $_POST['emailUser'] = htmlentities($_POST['emailUser'], ENT_QUOTES);
                    $_POST['telUser'] = htmlentities($_POST['telUser'], ENT_QUOTES);

                    
                    
                    
                    //condition si mot passe identique dans les champs inputs
                    if ($password == $repass) {
                        // On crypte le mot de passe
                        $_POST['passwordUser'] = htmlentities($_POST['passwordUser'], ENT_QUOTES);
                        $_POST['passwordUser'] = password_hash($_POST['passwordUser'], PASSWORD_DEFAULT);

                        //rentre bon format nom et prenom 
                        $_POST['nomUser'] = htmlentities($_POST['nomUser'], ENT_QUOTES);
                        $_POST['prenomUser'] = htmlentities($_POST['prenomUser'], ENT_QUOTES);

                        //surppression $post signUp
                        unset($_POST['signUp']);
                        unset($_POST['repass']);
                
                        
                    
                
                        //condition pour envoyer les data dans le fichier user.json
                        if (isset($filename)) {
                            //fichier existe alors on récupère son contenu on transforme en array
                        
                            //$jsonArray = []; // si pas de tableau on crée un tableau
                            array_unshift($jsonArray,$_POST);
                            //en rencode le fichier en json aprés avoir reçu données
                            file_put_contents($filename,json_encode($jsonArray));
                            //message confirmation
                            echo '<div class="col-md-12 d-flex justify-content-center">
                                    <div class="alert alert-success">Inscription OK !</div>
                                </div>';//message validatiion
                        }else {
                            
                            echo '<div class="col-md-12 d-flex justify-content-center">
                            <div class="alert alert-danger">Erreur survenue lors saisie données !</div></div>';//message erreur saisie
                        }

                    }else{
                        echo '<div class="col-md-12 d-flex justify-content-center">
                        <div class="alert alert-danger">retaper mot passe !</div></div>';
                    }//fin vérification mot passe identique

                
                }
            

        }else{
            echo '<div class="col-md-12 d-flex justify-content-center">
            <div class="alert alert-danger">email pas valide !</div></div>';
        }//fin vérification format mail


?>
