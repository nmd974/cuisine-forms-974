<?php
  require_once(__ROOT__.'/src/controllers/accesData.php');

function desinscrireAtelier($id)
{
    if(!in_array($id, $_SESSION['ateliers'])){
        return '<div class="alert alert-danger">Vous n\'êtes pas inscrit à cet atelier !</div>';
        exit();
    }

    $dataUser = getUserData();//On recupere les donnees json
    $dataAtelier = getAteliersData(); //On recupere les données json des ateliers
    if($dataUser !== null){//S'il y a des gens inscrits alors on recherche l'id connecte
        foreach ($dataUser as $keyUser => $user) {
            if($user['id'] == $_SESSION['id']){
                foreach($dataAtelier as $keyAtelier => $atelier){//On recherche l'id auxquel l'utilisateur souhaite s'inscrire 
                    if($atelier['id'] == $id){
                        if(($atelier['date_debut']-28800) <= mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"))){
                            return '<div class="alert alert-danger">Vous ne pouvez plus vous désinscrire de cet atelier</div>';
                            exit();
                        }

                        $elementIndice = array_search($id, $_SESSION['ateliers']);//Supression de l'id dans la session en cours en recherchant l'emplacement de l'id dans les differents tableaux
                        unset($_SESSION['ateliers'][$elementIndice]);

                        $elementIndice = array_search($id, $dataAtelier[$keyAtelier]['participants']);//Supression de l'id dans la session en cours en recherchant l'emplacement de l'id dans les differents tableaux
                        unset($dataAtelier[$keyAtelier]['participants'][$elementIndice]);

                        $elementIndice = array_search($id, $dataUser[$keyUser]['ateliers']);//Supression de l'id dans la session en cours en recherchant l'emplacement de l'id dans les differents tableaux
                        unset($dataUser[$keyUser]['ateliers'][$elementIndice]);

                        saveAteliersData($dataAtelier);
                        saveUserData($dataUser);

                        return '<div class="alert alert-success">Désinscription réussie !</div>';
                        exit();
                    }
                }
            }
        }
    }
}

?>