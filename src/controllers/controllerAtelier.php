<?php require_once(__ROOT__.'/src/controllers/accesData.php'); ?>

<!-- Créaction d'une fonction permettant de validé l'ajout d'un atelier -->

<?php
    function activerDesactiverAtelier($id){
        $data = getAteliersData();
        if($data){
          foreach($data as $key => $atelier){
            if($atelier['id'] == $id){
                if($atelier['etat_atelier'] == "Active"){
                    $data[$key]['etat_atelier'] = "Desactive";
                    saveAteliersData($data);
                    return         '<div class="col-12 d-flex justify-content-center">
                    <div class="alert alert-success">L\'atelier a bien été desactivé !</div>
                    </div>';
                }else{
                    $data[$key]['etat_atelier'] = "Active";
                    saveAteliersData($data);
                    return         '<div class="col-12 d-flex justify-content-center">
                    <div class="alert alert-success">L\'atelier a bien été activé !</div>
                    </div>';
                }
            }
          }
    }else{
        return         '<div class="col-12 d-flex justify-content-center">
        <div class="alert alert-success">Une erreur est survenue lors de la modification</div>
        </div>';
    }
}
?>