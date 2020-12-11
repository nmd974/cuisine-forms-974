
<?php
 
  $fichierDonneesAtelier = "../../data/ateliers.json";

  $data = json_decode(file_get_contents($fichierDonneesAtelier), true);

 

  $_POST["titre"] = htmlspecialchars($_POST["titre"]);
  $_POST["description"] = htmlspecialchars($_POST["description"]);
  $_POST["prix"] = htmlspecialchars($_POST["prix"]);
  $_POST["duree"] = htmlspecialchars($_POST["duree"]);
  $_POST["date_debut"] =  htmlspecialchars($_POST["date_debut"]);
  $_POST["nombre_places"] =  htmlspecialchars($_POST["nombre_places"]);
  $_POST["heure_debut"] =  htmlspecialchars($_POST["heure_debut"]);
  $_POST["image"] =  htmlspecialchars($_POST["image"]);
  
  $_POST["id"] = md5(uniqid(rand(), true));
  $_POST["proprietaire"] = 1;

  $_POST["date_ajout"] = [ $t=time(), date("Y-m-d")];
  $_POST["etat_atelier"] = "desactie";
    
  

  $_POST["participants"] =[];
  $_POST["modifie"] = false;
  


  array_unshift($data, $_POST);


  
 // $tailleTableau = count($data);
  //$data[$tailleTableau] = $atelier;

  file_put_contents($fichierDonneesAtelier, json_encode($data));
  

 

  

?>