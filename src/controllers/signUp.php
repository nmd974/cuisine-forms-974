<?php

    //envoi données vers json
    //condition clic input signUp
    if (isset($_POST['signUp'])) {

        //générateur aléatoire id pour la card créer
        $idUser = md5(uniqid(rand(), true)); //On attribue un id unique à l'image via la fonction md5 uniqid et random
        $_POST['id'] = $idUser;
        //variable pour le mailUser
        $emailUser = $_POST['emailUser'];
        //affectation rôle:
        $_POST['role'] = "user";
        $_POST['ateliers'] = [];
        $_POST['nomUser'] = htmlentities($_POST['nomUser'], ENT_QUOTES);
        $_POST['prenomUser'] = htmlentities($_POST['prenomUser'], ENT_QUOTES);
        $_POST['emailUser'] = htmlentities($_POST['emailUser'], ENT_QUOTES);
        $_POST['telUser'] = htmlentities($_POST['telUser'], ENT_QUOTES);
        $_POST['passwordUser'] = htmlentities($_POST['passwordUser'], ENT_QUOTES);
        $_POST['passwordUser'] = password_hash($_POST['passwordUser'], PASSWORD_DEFAULT); // On crypte le mot de passe
        //surppression $post signUp
        unset($_POST['signUp']);

        //attribution destination json dans variable
        $filename = '../../data/users.json';
       

        //condition pour envoyer les data dans le fichier user.json
        if (isset($filename)) {
            //fichier existe alors on récupère son contenu on transforme en array
            //retourne le contenu du fichier dans une variable de type string
            $jsonString = file_get_contents($filename);
            //Transforme la structure json en array PHP
            $jsonArray = json_decode($jsonString, true);
            //$jsonArray = []; // si pas de tableau on crée un tableau
            array_unshift($jsonArray,$_POST);
            //en rencode le fichier en json aprés avoir reçu données
            file_put_contents($filename,json_encode($jsonArray));
            //message confirmation
            echo '<div class="col-md-12 d-flex justify-content-center">
                  <div class="alert alert-success">Inscription OK !</div></div>';
        }else {
            
            echo '<div class="col-md-12 d-flex justify-content-center">
            <div class="alert alert-danger">Erreur survenue lors saisie données !</div></div>';
        }
    }

/* essai pour vérification email !!!!!
//condition pour envoyer les data dans le fichier user.json
        if (isset($filename)) {
            //ouvre le fichier json
            $datajson = file_get_contents("$filename");
            //on decode le fichier json en php
            $data = json_decode($datajson, true);
            //recherche dans le tableau
            foreach ($data as $valeur) {
                //si email dans data existe oui ou non 
                if ($valeur['emailUser'] != $emailUser) {
                    array_unshift($data,$_POST);
                    //en rencode le fichier en json aprés avoir reçu données
                    file_put_contents($filename,json_encode($data));
                    //message confirmation
                    echo '<div class="col-md-12 d-flex justify-content-center">
                    <div class="alert alert-success">Inscription OK !</div></div>';
                }else {
                    echo '<div class="col-md-12 d-flex justify-content-center">
                    <div class="alert alert-danger">Erreur survenue lors saisie données !</div></div>';
                }
            } 
        } 

*/
        

?>
