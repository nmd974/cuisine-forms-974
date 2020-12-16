

<?php 
  
  if (strlen($_POST["description"]) <=250) {
    $fichierDonneesAtelier = "../../data/ateliers.json";

    $data = json_decode(file_get_contents($fichierDonneesAtelier), true);
    $_POST["titre"] = htmlspecialchars($_POST["titre"]);
    $_POST["description"] = htmlspecialchars($_POST["description"]);
    $_POST["prix"] = (int)$_POST["prix"];
    $_POST["duree"] = (int)$_POST["duree"];
    $_POST["date_debut"] =  htmlspecialchars($_POST["date_debut"]);
    $_POST["nombre_places"] = (int)$_POST["nombre_places"];
    $_POST["heure_debut"] =  htmlspecialchars($_POST["heure_debut"]);
   // $_POST["image"] =  htmlspecialchars($_POST["image"]);  
    $_POST["id"] = md5(uniqid(rand(), true));
    $_POST["proprietaire"] = 1;
    $_POST["date_ajout"] = (new Datetime())->format('d-m-Y H:i:s');//sans paramettre Datetime() retourne la date et l'heure actuelle;
    $_POST["etat_atelier"] = "Désactivé";
    $_POST["participants"] =[];
    $_POST["modifie"] = false;

   
  }
  
    $inputRequired =["titre", "date_debut", "description"];
    $inputsNumbers = ["prix", "duree", "augmentation_prinombre_places","heure_debut"];
    $validationForms = true;
    foreach ( $inputRequired as $input){
      if ($_POST["$input"] == "") {
      $validationForms = false;
      //echo "erreur";
      header("Location:..\pages\ajoutAtelier.php");
           
      }
      if ($validationForms) {
      array_unshift($data, $_POST);
      file_put_contents($fichierDonneesAtelier, json_encode($data));  
    // var_dump($data);
      } else {
        return "";

      }
     
  }
  
    foreach ( $inputNumbers as $input) {
      if ($_POST["$input"] == "") {
        $validationForms = false;
        //echo "erreur";
        header("Location:..\pages\ajoutAtelier.php");
             
        }
        if ($validationForms) {
        
      // var_dump($data);
        } else {
          return "";
  
        }
    }
    
    array_unshift($data, $_POST);
    file_put_contents($fichierDonneesAtelier, json_encode($data));  
  var_dump ($inputRequired);

?>

<?php     
    header("Location:..\pages\cuistoManager.php");

?>