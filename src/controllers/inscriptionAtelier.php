<?php
  require_once(__ROOT__.'/src/controllers/accesData.php');

function inscriptionAtelier($id)
{
    $dataUser = getUserData();//On recupere les donnees json
    $dataAtelier = getAteliersData(); //On recupere les données json des ateliers
    if($data !== null){//S'il y a des gens inscrits alors on recherche l'id connecte
        foreach ($dataUser as $key => $user) {
            if($user['id'] == $_SESSION['id']){
                foreach($dataAtelier as $key => $atelier){//On recherche l'id auxquel l'utilisateur souhaite s'inscrire
                    if($atelier['id'] == $id){
                        array_push($dataAtelier['participants'], $_SESSION['id']);//on rajoute dans le tableau json de l'atelier l'id du participant
                        array_push($dataUser['ateliers'], $ateliers['id']);//On rajoute dans le tableau ateliers de l'utilisateur l'id de l'atelier auquel il s'inscrit
                        exit();
                    }
                }
            }
        }
    }
}

?>