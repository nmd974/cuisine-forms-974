<?php 
  require_once(__ROOT__.'/src/class/Ateliers.php');
  require_once(__ROOT__.'/src/controllers/accesData.php');
?>
<?php 
if(isset($_GET['action'])){
    $action = $_GET['action'];
    if($action == "activer"){
        Ateliers::activerAtelier($_GET['id']);
    }
    if($action == "desactiver"){
        var_dump($_GET['id']);
        Ateliers::activerAtelier($_GET['id']);
    }
}
?>
<div class="container mt-5 pt-5">
    <h2 class="text-center align-middle font-weight-bold">Liste des ateliers</h2>
    <div class="table-responsive">
        <div class="accordion" id="ateliers">
            <?php $data = getAteliersData();?>
            <?php if($data):?>
            <?php foreach($data as $atelier):?>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#collapse_<?= $atelier['id']?>" aria-expanded="true"
                        aria-controls="collapse_<?= $atelier['id']?>">
                        <h2 class="mb-0 d-flex"><?= $atelier['titre']?></h2>
                    </button>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" 
                            <?php if($atelier['etat_atelier'] == "Activé"){
                                echo "checked";
                            }?>
                        id="<?= $atelier['id']?>">
                        <label class="custom-control-label" for="<?= $atelier['id']?>"
                            id="labelswitch">                            
                            <?php if($atelier['etat_atelier'] == "Activé"){
                                echo "Activé";
                            }else{
                                echo "Désactivé";
                            }
                            ?></label>
                    </div>
                </div>
                <div id="collapse_<?= $atelier['id']?>" class="collapse" data-parent="#ateliers">
                    <div class="card w-100 card-manager">
                        <img src="../../images/gateau1.jpeg" class="card-img img-manager" alt="cours de cuisine">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Description : </strong><?= $atelier['description']?>
                                </li>
                                <li class="list-group-item"><strong>Date début : </strong><?= $atelier['date_debut']?>
                                </li>
                                <li class="list-group-item"><strong>Durée : </strong><?= $atelier['duree']?> h</li>
                                <li class="list-group-item"><strong>Nombre de réservations :
                                    </strong><?= count($atelier['participants'])?></li>
                                <li class="list-group-item"><strong>Nombre de places :
                                    </strong><?= $atelier['place_max']?></li>
                                <li class="list-group-item"><strong>Prix : </strong><?= $atelier['id']?> €</li>
                            </ul>
                            <div class="d-flex w-100 justify-content-between align-items-center mt-5">
                                <p class="card-text"><small
                                        class="text-muted"><?= $atelier['etat_ajout']?><?= $atelier['date_ajout']?></small>
                                </p>
                                <a href="<?= __ROOT__.'src/pages/modificationAtelier.php?id='.$atelier['id']?>"
                                    class="btn btn-primary">Modifier</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php endforeach;?>
        <?php endif;?>
    </div>
</div>
</div>