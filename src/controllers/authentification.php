<?php

  $atelier = htmlspecialchars($_POST["titreAtelier"]);
  $description = htmlspecialchars($_POST["description"]);
  $prix = htmlspecialchars($_POST["prixAtelier"]);
  $date = htmlspecialchars($_POST["dateAtelier"]);
  $heure =  htmlspecialchars($_POST["time"]);
  $place =  htmlspecialchars($_POST["placeDisponible"]);

  var_dump ($atelier);

  $_SESSION["titreAtelier"] = $atelier;
  $_SESSION["description"] = $description;
  $_SESSION["prixAtelier"]= $prix;
  

 

  $target_dir = ".\\images\\"; // definire le chemain du telechargemet faire attention c'est différe WIN et LINUX
  $target_file = $target_dir . basename($_FILES["image"]["name"]);

  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file /*télécharger le fichier et enregistrer dans le répértoire */)) {
    $_SESSION[$produit] = $target_file;//enregister dans sassion le chemin du fichier téléchargé
    var_dump ( $_SESSION[$produit]);
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
  }else{
    echo "error "; // juste pour ferifier si le telechargement a été bien effectué
  }

?>