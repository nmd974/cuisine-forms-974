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
<<<<<<< HEAD
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
    // var_dump(substr($_POST['date_debut'],6,1));
    // var_dump($_FILES);
=======
    if($action == "desactiver"){
        var_dump($_GET['id']);
        Ateliers::activerAtelier($_GET['id']);
    }
}
>>>>>>> parent of 9e2d4be...  branch
?>
<div class="container mt-5 pt-5">
    <h2 class="text-center align-middle font-weight-bold">Liste des ateliers</h2>
    <div class="table-responsive">
        <div class="accordion" id="ateliers">
            <?php $data = getAteliersData();?>
<<<<<<< HEAD
            <?php if ($data) : ?>
            <?php foreach ($data as $atelier) : ?>
           
            <!--Conteu en liste -->
            <?php if ($atelier['proprietaire'] == $_SESSION['id']) : ?>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                <h2 class="mb-0 d-flex w-100 ">
                    <button class="btn btn-link btn-block text-left titreCarteManager" type="button" data-toggle="collapse"
                        data-target="#collapse_<?= $atelier['id'] ?>" aria-expanded="true"
                        aria-controls="collapse_<?= $atelier['id'] ?>">
                        <?= $atelier['titre'] ?>
                    </button>
<<<<<<< HEAD
                </h2>
                    <div class="custom-control custom-switch" id="<?=$atelier['id']?>">
                        <input type="checkbox" class="custom-control-input" 
                            <?php 
                                if ($atelier['etat_atelier']=="Active"){
                                    echo "checked";
                                }
                            ?>
                            id="switch_<?= $atelier['id'] ?>">
                        <label class="custom-control-label" for="switch_<?= $atelier['id'] ?>">
                            <?php 
                                if ($atelier['etat_atelier'] == "Active"){
                                    echo "Activé";
                                } else {
                                    echo "Désactivé";
                                }
                            ?>
=======
                    <div class="custom-control custom-switch" id="<?= $atelier['id'] ?>">
                        <input type="checkbox" class="custom-control-input" <?php if ($atelier['etat_atelier']=="Active"
                            ) { echo "checked" ; } ?> id="
                        <?= $atelier['id'] ?>">
                        <label class="custom-control-label" for="<?= $atelier['id'] ?>"
                            id="<?php echo 'labelswitch_' . $atelier['id'] ?>">
                            <?php if ($atelier['etat_atelier'] == "Active") {
                                            echo "Activé";
                                        } else {
                                            echo "Désactivé";
                                        }
                                        ?>
>>>>>>> parent of 78f5450... Merge branch 'main' of https://github.com/nmd974/cuisine-forms-974 into main
                        </label>
=======
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
>>>>>>> parent of 9e2d4be...  branch
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
                                    </strong><?= $atelier['nombre_places']?></li>
                                <li class="list-group-item"><strong>Prix : </strong><?= $atelier['prix']?> €</li>
                            </ul>
                            <div class="d-flex w-100 justify-content-between align-items-center mt-5">
                                <p class="card-text"><small
                                        class="text-muted"><?php !$atelier['modifie'] ? "Ajouté le :" : "Modifié le :"?><?= $atelier['date_ajout']?></small>
                                </p>
<<<<<<< HEAD
                                <a href="../pages/pageAtelier.php?idmo=<?= $atelier['id'] ?>"
                                    class="btn btn-primary" id="modifierAtelier">Modifier</a>
                                <!-- Button trigger modal -->
                                <!-- <button type="submit" class="btn btn-primary" 
                                    >
                                    Modifier
                                </button> -->
=======
                                <a href="../pages/pageAtelier.php?id=<?= $atelier['id']?>"
                                    class="btn btn-primary">Modifier</a>
>>>>>>> parent of 9e2d4be...  branch
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php endforeach;?>
        <?php endif;?>
    </div>
<<<<<<< HEAD
    <?php if (!$_SESSION['ateliers']):?>
    <div class="container mt-5 titrePage">
        <h2 class="text-center align-middle font-weight-bold">Aucun ateliers de cuisines créés</h2>
    </div>
    <?php endif; ?>
=======
>>>>>>> parent of 9e2d4be...  branch
</div>
</div>
