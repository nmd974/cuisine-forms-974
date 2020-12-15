<?php

//Ceci est la page vu par l'utilisateur, nous incluons différent liens contenant les structures et fonction de la page.


$title = "Ateliers de cuisine"; //Titre de la page.
$titlePage = "Modification de l'atelier"; //Titre de la page.

require_once(dirname(__DIR__) . "/includes/header.php"); // Ici on inclut le header de la page avec le fichier "header.php"
?>
    <?php require_once(__ROOT__ . '/src/includes/formulaires/modificationAtelier.php'); // On inclut la structure du formulaire en récupérant le fichier "formModifAtelier"
    ?>
    <?php require_once(__ROOT__ . '/src/includes/footer.php'); // // Ici on inclut le footer de la page avec le fichier "footer.php"
    ?>
