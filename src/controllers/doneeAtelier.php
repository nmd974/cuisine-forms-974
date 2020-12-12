
<?php
 
 if(strlen($_POST["description"]) <= 250) {

    $fichierDonneesAtelier = "../../data/ateliers.json"; //chemin vers le fichier de données Json

    $data = json_decode(file_get_contents($fichierDonneesAtelier), true);//recupérer le contenu du fichier de données Json
    $_POST["titre"] = htmlspecialchars($_POST["titre"]);
    $_POST["description"] = htmlspecialchars($_POST["description"]);
    $_POST["prix"] = (int)$_POST["prix"];
    $_POST["duree"] = (int)$_POST["duree"];
    $_POST["date_debut"] =  htmlspecialchars($_POST["date_debut"]);//avec parametre Datetime() retourne la date et l'heure passé en paramettre
    $_POST["nombre_places"] =  (int)$_POST["nombre_places"];
    $_POST["heure_debut"] =  (new Datetime($_POST["heure_debut"]))->format('d-m-Y');
    $_POST["id"] = md5(uniqid(rand(), true));
    $_POST["proprietaire"] = 1;
    $_POST["date_ajout"] = (new Datetime())->format('d-m-Y H:i:s');//sans paramettre Datetime() retourne la date et l'heure actuelle
    $_POST["etat_atelier"] = "Désactivé";

    $_POST["participants"] = [];
    $_POST["modifie"] = false;

    $target_dir = "..\\..\\images\\uploadedFiles\\"; // definire le chemain du telechargemet faire attention c'est différe WIN et LINUX
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file )) {/*télécharger le fichier et enregistrer dans le répértoire */
      $_POST["image"] = $target_file;//enregister le chemin du fichier téléchargé
    }
    
    array_unshift($data, $_POST);// ajoute les infos du formulaire dans le tableau
    file_put_contents($fichierDonneesAtelier, json_encode($data));//Ecrit les données dans le fichiers Json
    
    header("Location:..\pages\cuistoManager.php");
 }
?>