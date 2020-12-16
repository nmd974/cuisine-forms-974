<?php
  require_once(__ROOT__.'/src/controllers/accesData.php');

function inscriptionAtelier($id)
{
    $dataUser = getUserData();//On recupere les donnees json
    $dataAtelier = getAteliersData(); //On recupere les données json des ateliers
    if($dataUser !== null){//S'il y a des gens inscrits alors on recherche l'id connecte
        foreach ($dataUser as $keyUser => $user) {
            if($user['id'] == $_SESSION['id']){
                foreach($dataAtelier as $keyAtelier => $atelier){//On recherche l'id auxquel l'utilisateur souhaite s'inscrire                    
                    if($atelier['id'] == $id){
                        array_push($dataAtelier[$keyAtelier]['participants'], $_SESSION['id']);//on rajoute dans le tableau json de l'atelier l'id du participant
                        array_push($dataUser[$keyUser]['ateliers'], $atelier['id']);//On rajoute dans le tableau ateliers de l'utilisateur l'id de l'atelier auquel il s'inscrit
                        saveAteliersData($dataAtelier);
                        saveUserData($dataUser);
                    }
                }
            }
        }
    }
}

?>