<?php
require_once(__ROOT__ . '/src/class/Ateliers.php');
require_once(__ROOT__ . '/src/controllers/accesData.php');
require_once(__ROOT__ . '/src/controllers/controllerAtelier.php');
?>
<?php
if (isset($_GET['id'])) {
    $modification = activerDesactiverAtelier($_GET['id']);
}
?>
<!--Sur cette page on ajoute en liste accordion les ateliers et la modification lance un modal-->
<?php if(!$_SESSION['cuisinierLoggedIn']){
        header('Location: ./home.php?page=1');
    }
?>


<?php
    if(isset($_POST['modifier'])){
        var_dump($_POST);
        if($_FILES['image_upload']['name'] == ""){
            $validationFormulaire = [false, '<div class="container alert alert-danger col-12 mb-5">Veuillez sélectionner une image !</div>', 'image_upload'];
        }else{
            $validationFormulaire = ajoutAtelier($_POST, $_FILES);
        }      
    }
?>
<?php if($_SESSION['cuisinierLoggedIn']):?>
<div class="container mt-5" id="atelierManager">
    <div class="table-responsive">
        <?php if(isset($modification)){
            echo $modification;
        }?>
        <div class="accordion" id="ateliers">
            <?php $data = getAteliersData();?>
            <?php if ($data) : ?>
            <?php foreach ($data as $atelier) : ?>
            
            <!--Conteu en liste -->
            <?php if ($atelier['proprietaire'] == $_SESSION['id']) : ?>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                <h2 class="mb-0 d-flex w-100">
                    <button class="btn btn-link btn-block text-left titreCardManager" type="button" data-toggle="collapse"
                        data-target="#collapse_<?= $atelier['id'] ?>" aria-expanded="true"
                        aria-controls="collapse_<?= $atelier['id'] ?>">
                        
                            <?= $atelier['titre'] ?>
                       
                    </button>
                    </h2>
                    <div class="custom-control custom-switch" id="<?=$atelier['id']?>">
                        <input type="checkbox" class="custom-control-input" 
                            <?php 
                                if ($atelier['etat_atelier']=="Active"){
                                    echo "checked";
                                }
                            ?>
                            id="switch_<?= $atelier['id'] ?>">
                        <label class="custom-control-label" for="<?= 'switch_'.$atelier['id'] ?>">
                            <?php 
                                if ($atelier['etat_atelier'] == "Active"){
                                    echo "Activé";
                                } else {
                                    echo "Désactivé";
                                }
                            ?>
                        </label>
                    </div>
                </div>
                <div id="collapse_<?= $atelier['id'] ?>" class="collapse" data-parent="#ateliers">
                    <div class="card w-100 card-manager">
                        <img src="../../images/<?= $atelier['image']?>" class="card-img img-manager"
                            alt="cours de cuisine">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Description : </strong>
                                    <?= $atelier['description'] ?>
                                </li>
                                <li class="list-group-item"><strong>Date début : </strong>
                                    <?= DateTime::createFromFormat('U', htmlentities($atelier['date_debut'], ENT_QUOTES))->format('j M Y'); ?>
                                </li>
                                <li class="list-group-item"><strong>Durée : </strong>
                                    <?= $atelier['duree'] ?>
                                </li>
                                <li class="list-group-item"><strong>Nombre de réservations :
                                    </strong>
                                    <?= count($atelier['participants']) ?>
                                </li>
                                <li class="list-group-item"><strong>Nombre de places :
                                    </strong>
                                    <?= $atelier['nombre_places'] ?>
                                </li>
                                <li class="list-group-item"><strong>Prix : </strong>
                                    <?= $atelier['prix'] ?> €
                                </li>
                            </ul>
                            <div class="d-flex w-100 justify-content-between align-items-center mt-5">
                                <p class="card-text"><small class="text-muted">
                                        <?= !$atelier['modifie'] ? "Ajouté le :" : "Modifié le :" ?>
                                        <?= substr($atelier['date_ajout'],0,10) ?>
                                        à
                                        <?= substr($atelier['date_ajout'],11,8) ?>
                                    </small>
                                </p>
                                <a href="../pages/pageAtelier.php?idmo=<?= $atelier['id'] ?>" class="btn btn-primary">
                                    Modifier
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php if (!$_SESSION['ateliers']):?>
        <div class="container mt-5 titrePage">
            <h2 class="text-center align-middle font-weight-bold">Aucun ateliers de cuisines créés</h2>
        </div>
    <?php endif; ?>
</div>
<?php endif ?>