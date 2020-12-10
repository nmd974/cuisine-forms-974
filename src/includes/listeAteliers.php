<?php 
  require_once(__ROOT__.'/src/class/Ateliers.php');
  require_once(__ROOT__.'/src/class/AccesBDD.php');
?>
   <!-- début section des Ateliers-->
    <section class="container">
      <?php $ateliers = AccesBDD::ateliersData();?>
      <?php if($ateliers !== ""):?>
      <?php foreach ($ateliers as $key => $atelier):?>
        <?php $atelier_obj = new Ateliers(
            $atelier['id'],
            $atelier['titre'],
            $atelier['description'],
            $atelier['date_debut'],
            $atelier['duree'],
            $atelier['place_disponible'],
            $atelier['place_max'],
            $atelier['etat_ajout'],
            $atelier['date_ajout'],
            $atelier['prix'],
            $atelier['image']
          );
        ?>
        <?= $atelier_obj->toHTML(); ?>
        <!--Atelier-->
        <div class="card my-3" style="max-width: 1000px; margin-left: auto; margin-right: auto;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="../../images/<?= $atelier['image']?>" class="card-img" alt="Nos cours de cuisine">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $atelier['titre']?></h5>
                  <p class="card-text"><?= $atelier['description']?></p>
                  <p class="card-text">Commence :<?= $atelier['date_debut']?></p>
                  <p class="card-text">Dure : <?= $atelier['duree']?> h</p>
                  <p class="card-text"><?= $atelier['place_disponible']?>/<?= $atelier['place_max']?> places disponibles</p>
                  <p class="card-text"><small class="text-muted"><?= $atelier['etat_ajout']?> <?= $atelier['date_ajout']?></small></p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
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