<?php 
  require_once(__ROOT__.'/src/class/AccesBDD.php');
?>
   <!-- début section des Ateliers-->
    <section class="container">
      <?php $ateliers = AccesBDD::ateliersData();?>
      <?php if($ateliers !== ""):?>
      <?php foreach ($ateliers as $key => $atelier):?>

        <!--Atelier-->
        <div class="card my-3" style="max-width: 1000px; margin-left: auto; margin-right: auto;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="../../images/<?= $atelier['image']?>" class="card-img" alt="Nos cours de cuisine">
              </div>
              <div class="col-md-8">
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
                                        class="text-muted"><?= !$atelier['modifie'] ? "Ajouté le :" : "Modifié le :"?><?= $atelier['date_ajout'][1]?></small>
                                </p>
                                <a href="../pages/pageAtelier.php?id=<?= $atelier['id']?>"
                                    class="btn btn-primary">Modifier</a>
                            </div>
                        </div>
              </div>
            </div>
        </div>
        <!--Fin exemple 1-->

        <!--séparation-->
        <div class="row separated">
            <hr class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        </div>
        <!--fin séparation-->
        <?php endforeach ?>
        <?php endif ?>
      


    </section>
    <!--Fin section Atlier-->