
<?php
 

  $fichierDonneesAtelier = "../../data/ateliers.json";

  $data = json_decode(file_get_contents($fichierDonneesAtelier), true);


  $atelier = htmlspecialchars($_POST["titreAtelier"]);
  $description = htmlspecialchars($_POST["description"]);
  $prix = htmlspecialchars($_POST["prixAtelier"]);
  $date = htmlspecialchars($_POST["dateAtelier"]);
  $heure =  htmlspecialchars($_POST["time"]);
  $place =  htmlspecialchars($_POST["placeDisponible"]);

  $atelier = new Ateliers((int)3, $atelier, $description, $date, (int)$heure, 
  (int)$place, null, null, new DateTime(), (int)$prix, null);

  $tailleTableau = count($data);
  $data[$tailleTableau] = $atelier;

  file_put_contents($fichierDonneesAtelier, json_encode($data));
  

 

  

?>