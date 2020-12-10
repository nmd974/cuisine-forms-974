<?php

function formSignUp() {



    //envoi données vers json
    //condition clic input signUp
    if (isset($_POST['signUp'])) {

        //générateur aléatoire id pour la card créer
        $idUser = md5(uniqid(rand(), true)); //On attribue un id unique à l'image via la fonction md5 uniqid et random
        $_POST['id'] = $idUser;
        //affectation rôle:
        $_POST['role'] = "particulier";
        //attribution des valeurs aux éléments:
        $_POST['nomUser'] = htmlspecialchars($_POST['nomUser']);
        $_POST['prenomUser'] = htmlspecialchars($_POST['prenomUser']);
        $_POST['mailUser'] = $_POST['mailUser'];
        $_POST['telUser'] = $_POST['tellUser'];
        $_POST['passwordUser'] = $_POST['passwordUser'];

        //attribution destination json dans variable
        $filename = __ROOT__.'/data/users.json';

        //condition pour envoyer les data dans le fichier user.json
        if (isset($filename)) {
            //fichier existe alors on récupère son contenu on transforme en array
            //retourne le contenu du fichier dans une variable de type string
            $jsonString = file_get_contents($filename);
            //Transforme la structure json en array PHP
            $jsonArray = json_decode($jsonString, true);
            //$jsonArray = []; // si pas de tableau on crée un tableau
            array_unshift($jsonArray,$_POST);
            file_put_contents($filename,json_encode($jsonArray));

        }

    }

}
