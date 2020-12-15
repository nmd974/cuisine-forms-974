<?php
  
  function validerDonneesAtelierForm($data) {
    $champs = [ 
      array("key" => "titre", "libele" => "'Nom de l'atelier'"), 
      array("key" => "prix", "libele" => "'Prix de l'atelier'"),
      array("key" => "duree", "libele" => "'Durée'"),
      array("key" => "description", "libele" => "'Description'"),
      array("key" => "date_debut", "libele" => "'Date début de l'atelier'"),
      array("key" => "nombre_places", "libele" => "'Place disponibe'"),
      array("key" => "heure_debut", "libele" => "'Heure de début'")];
    $validation = true;
    
    foreach ($champs as $champ){
      if ($data[$champ["key"]] == "") {
        return array("valide" => false, "message" => 'Le champ '.$champ["libele"].' est obligatoir');
      }
      
      if ($champ["key"] == "description" && strlen($data[$champ["key"]]) > 250 ) {
        return array("valide" => false, "message" => 'La description ne doit pas dépasser les 250 caractères');
      }
      

     /*  if ($champ["key"] == "date_debut" /*$dataPost["date_debut"] !== date("jj/ mm / aaaa") ){
        return array("valide" => false, "message" => 'La date n\'est pas une Date ');
       }*/
     
   }
    return array("valide" => true);
  }

  function ajouterAtelier($dataPost, $files){
    $fichierDonneesAtelier = "../../data/ateliers.json";
    $data = json_decode(file_get_contents($fichierDonneesAtelier), true);

    $dataPost["titre"] = htmlspecialchars($dataPost["titre"]);
    $dataPost["description"] = htmlspecialchars($dataPost["description"]);
    $dataPost["prix"] = htmlentities($dataPost["prix"]);
    $dataPost["duree"] = htmlentities($dataPost["duree"]);
    $dataPost["date_debut"] =  htmlspecialchars($dataPost["date_debut"]);

    $dataPost["nombre_places"] = htmlentities($dataPost["nombre_places"]);
    $dataPost["heure_debut"] =  htmlspecialchars($dataPost["heure_debut"]);
    $dataPost["id"] = md5(uniqid(rand(), true));
    $dataPost["proprietaire"] = 1;
    $dataPost["date_ajout"] = (new Datetime())->format('d-m-Y H:i:s');//sans paramettre Datetime() retourne la date et l'heure actuelle;
    $dataPost["etat_atelier"] ="Désactivé";
    $dataPost["participants"] =[];
    $dataPost["modifie"] = false;

    $target_dir = "..\\..\\images\\uploadedFiles\\"; // definire le chemain du telechargemet faire attention c'est différe WIN et LINUX
    $target_file = $target_dir . basename($files["image"]["name"]);

    if (move_uploaded_file($files["image"]["tmp_name"], $target_file /*télécharger le fichier et enregistrer dans le répértoire */)) {
        $dataPost["image"] = $target_file;
    }

    array_unshift($data, $dataPost);
    file_put_contents($fichierDonneesAtelier, json_encode($data));
  }
?>