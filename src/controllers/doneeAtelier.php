
<?php
 
  $fichierDonneesAtelier = "../../data/ateliers.json";

  $data = json_decode(file_get_contents($fichierDonneesAtelier), true);

 

  $_POST["titre"] = htmlspecialchars($_POST["titre"]);
  $_POST["description"] = htmlspecialchars($_POST["description"]);
  $_POST["prix"] = htmlspecialchars($_POST["prix"]);
  $_POST["duree"] = htmlspecialchars($_POST["duree"]);
  $_POST["date_debut"] =  htmlspecialchars($_POST["date_debut"]);
  $_POST["nombre_places"] =  htmlspecialchars($_POST["nombre_places"]);

  array_unshift($data, $_POST);

 var_dump($data);
  
  $tailleTableau = count($data);
  $data[$tailleTableau] = $atelier;

  file_put_contents($fichierDonneesAtelier, json_encode($data));
  

 

  

?>