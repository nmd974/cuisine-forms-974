<?php 
  require_once(__ROOT__.'/src/controllers/desinscriptionAtelier.php');
  require_once(__ROOT__.'/src/controllers/accesData.php');
  require_once(__ROOT__.'/src/controllers/controllerAtelier.php');
  require_once(__ROOT__.'/src/controllers/authentification.php');
?>
<?php 
if(isset($_GET['id'])){
    $modification = desinscrireAtelier($_GET['id']);
    unset($_GET['id']);
}
?>
<?php if(!$_SESSION['particulierLoggedIn']){
        header('Location: ./home.php');
    }
?>
<?php if($_SESSION['particulierLoggedIn']):?>
<div class="container" id="atelierManager">
    <div class="table-responsive">
        <?php if(isset($modification)){
            echo $modification;
        }
        ?>
        <div class="accordion" id="ateliers">
            <?php
                $dataAtelier = getAteliersData();
                $dataUser = $_SESSION['ateliers'];
            ?>
            <?php if($dataAtelier):?>
            <?php foreach($dataAtelier as $atelier):?>
                    <?php foreach($atelier['participants'] as $participants):?>
                        <?php if($participants == $_SESSION['id']):?>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#collapse_<?= $atelier['id']?>" aria-expanded="true"
                        aria-controls="collapse_<?= $atelier['id']?>">
                        <h2 class="mb-0 d-flex"><?= $atelier['titre']?></h2>
                    </button>
                </div>
                <div id="collapse_<?= $atelier['id']?>" class="collapse" data-parent="#ateliers">
                    <div class="card w-100 card-manager">
                        <img src="../../images/gateau1.jpeg" class="card-img img-manager" alt="cours de cuisine">
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
                                <a href="../pages/compteParticulier.php?id=<?= $atelier['id']?>"
                                    class="btn btn-primary">Se désinscrire</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
                            <?php endif?>
        <?php endforeach;?>
        <?php endforeach;?>
        <?php endif;?>
    </div>
</div>
</div>
<?php endif?>