<?php require_once(__ROOT__.'/src/controllers/accesData.php'); ?>

<!-- Créaction d'une fonction permettant de validé l'ajout d'un atelier -->

<?php
function validationAjoutAtelier($data, $image_upload)
{
}

?>


<?php
    function activerDesactiverAtelier($id){
        $data = getAteliersData();
        if($data){
          foreach($data as $key => $atelier){
            if($atelier['id'] == $id){
                if($atelier['etat_atelier'] == "Active"){
                    date_default_timezone_set("Indian/Reunion");//On definie la timezone à la reunion
                    $data[$key]['etat_atelier'] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                    $data[$key]['etat_atelier'] = "Desactive";
                    saveAteliersData($data);
                    return         '<div class="col-12 d-flex justify-content-center">
                    <div class="alert alert-success">L\'atelier a bien été desactivé !</div>
                    </div>';
                }else{
                    date_default_timezone_set("Indian/Reunion");//On definie la timezone à la reunion
                    $data[$key]['etat_atelier'] = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
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