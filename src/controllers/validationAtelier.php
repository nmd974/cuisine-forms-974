<?php


  function validerDonneesAtelierForm($data, $uploadedFiles) { // toutes mes verification des champ commence ici
    $champs = [                                                 // je crée d'abord un tableau à verifier
      array("key" => "titre", "libele" => "Nom de l'atelier"),
      array("key" => "prix", "libele" => "Prix de l'atelier"), 
      array("key" => "duree", "libele" => "Durée"), 
      array("key" => "description", "libele" => "Description"), 
      array("key" => "date_debut", "libele" => "Date début de l'atelier"),
      array("key" => "nombre_places", "libele" => "Place disponibe"), 
      array("key" => "heure_debut", "libele" => "H de début"),
      array("key" => "minDebut", "libele" => "Mn de début"),
    ];  
    
    foreach ($champs as $champ){ // à l'aide de la fonction foreach je parcours le tableauc pour verifier les champs
      if ( !isset($data[$champ["key"]]) || $data[$champ["key"]] == "" ) {
        return array("valide" => false, "message" => 'Renseignez le champ : "'.$champ["libele"].'"');
      }
      
      if ( $champ["key"] == "description" && strlen($data[$champ["key"]]) > 250 ) {
        return array("valide" => false, "message" => 'votre description est trop long');
      }

      
      // if ( $champ["key"] == "titre") {
      //   $titre =$dataPost[];
      //     foreach( $titre as $indice ) {
      //       for ($i=0; $i < ; $i++) { 
      //         if ($dataPost () != "<#>" && </"#">) {
      //           # code...
      //         }
      //       }
      //     }

      //   return array("valide" => false, "message" => 'votre description est trop long');
      // }

      if ( in_array($champ["key"], array("prix", "duree", "heure_debut", "minDebut", "nombre_places")) && !is_numeric($data[$champ["key"]]) ){
        
        return array("valide" => false, "message" => 'Le champ "'.$champ["libele"].'" n\'est pas un entier ');

      }
      
      if ( $champ["key"] == "date_debut"){                  // ici ma comparaison de la date de début de l'atelier si c'est bien posterieur de la data d'aujourd'hui
        $aujourdhui = new Datetime();                       // reinitialisation date
        $dateDebut = new Datetime($data[$champ["key"]]);    // je recupére la date tapée sur champ
        if(date('Y-m-d', strtotime($data[$champ["key"]])) !== $data[$champ["key"]]){    // ma verification si c'est bien une date qui est entrée
          return array("valide" => false, "message" => 'Le champ "'.$champ["libele"].'" n\'est pas une Date ');
        }

        if($dateDebut < $aujourdhui){                       // ici je verifie aussi si la date est bien posterieur à la da date actuelle
          return array("valide" => false, "message" => 'La date de début est dans le passé');
        }
      }
      
      if ( $champ["key"] == "heure_debut" && $champ["key"] == "miDebut" && !preg_match("/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/",$data[$champ["key"]])){ // definir vraiment format date
        return array("valide" => false, "message" => 'Le champ "'.$champ["libele"].'" n\'est pas une heure valide ');
      }
    }

    if ( !isset($uploadedFiles["image"]) || $uploadedFiles["image"] == "" ) {
      return array("valide" => false, "message" => 'Renseignez le champ : "Image"');
    }

    if ( !validateImage($uploadedFiles) ) {
      return array("valide" => false, "message" => 'Le fichier joint n\'est pas autorisé');
    }

    return array("valide" => true);
  }

  function validateImage($uploadedFiles){
    $filename = $uploadedFiles["image"]["tmp_name"];
    $error = '';   
        
    $type = exif_imagetype( $filename );
      
    switch( $type ) {
      case 1:
        return @imagecreatefromgif( $filename );
      case 2: 
        return @imagecreatefromjpeg( $filename );
      case 3:
        return @imagecreatefrompng( $filename );
      default: 
        return false;
    }
    return false;
  }

  function ajouterAtelier($dataPost, $files){ // je commence à sauvgarder mes données ici 
    $fichierDonneesAtelier = "../../data/ateliers.json"; // je definie d'abord le cemain où je veux suvgarder mes données
    $data = json_decode(file_get_contents($fichierDonneesAtelier), true); // 
      // **** à partir d'ici je recupère le données verifiées
    $dataPost["titre"] = htmlspecialchars($dataPost["titre"]);   
    $dataPost["description"] = htmlspecialchars($dataPost["description"]);
    $dataPost["prix"] = htmlentities($dataPost["prix"]);
    $dataPost["duree"] = htmlentities($dataPost["duree"]);
    $dataPost["date_debut"] =  htmlspecialchars($dataPost["date_debut"]);
    $dataPost["minDebut"] =  htmlentities($dataPost["minDebut"]);

    $dataPost["nombre_places"] = htmlentities($dataPost["nombre_places"]);
    $dataPost["heure_debut"] =  htmlspecialchars($dataPost["heure_debut"]);
    $dataPost["id"] = md5(uniqid(rand(), true)); // methode pour créer un id
    $dataPost["proprietaire"] = 1;
    $dataPost["date_ajout"] = new Datetime(); // sans paramettre Datetime() retourne la date et l'heure actuelle;
    $dataPost["etat_atelier"] ="Désactivé";
    $dataPost["participants"] =["landry"];
    $dataPost["modifie"] = false;

    $target_dir = "..\\..\\images\\uploadedFiles\\"; // definir le chemain du telechargemet faire attention c'est différe WIN et LINUX
    $target_file = $target_dir . basename($files["image"]["name"]);

    if (move_uploaded_file($files["image"]["tmp_name"], $target_file /*télécharger le fichier et enregistrer dans le répértoire */)) {
        $dataPost["image"] = $target_file;
    }

    array_unshift($data, $dataPost); // je push mes données sous forme de tableau 

    file_put_contents($fichierDonneesAtelier, json_encode($data)); 

    return $dataPost;
  }

  function enregistrerDansBase($dataPost){
    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "cuisine";

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO atelier (id, titre, `description`,  `image`, modifie , etat_atelier, date_ajout, proprietaire, prix, duree,
      nombre_places, minDebut, heure_debut, date_debut  ) 
        VALUES ('" . $dataPost["id"] . "', '" . $dataPost["titre"] . "', '" . $dataPost["description"] . "', '".$dataPost["image"] ."', '".($dataPost["modifie"] ? 1 : 0) ."',
        '".$dataPost["etat_atelier"] ."', date('".$dataPost["date_ajout"]->format('y-m-d H:i:s')."'), '".$dataPost["proprietaire"] ."','".$dataPost["prix"] ."',
        '".$dataPost["duree"] ."', '".$dataPost["nombre_places"] ."', '".$dataPost["minDebut"] ."', '".$dataPost["heure_debut"] ."', '".$dataPost["date_debut"] ."' )";
      // use exec() because no results are returned
      $conn->exec($sql);
      $resultat = array("succes" => true);
    } catch(PDOException $e) {
      $resultat = array("succes" => false, "erreur" => $e->getMessage());
    }

    $conn = null;
    return $resultat;
  }

?>