<?php 
  require_once(__ROOT__.'/src/controllers/accesData.php');
  require_once(__ROOT__.'/src/controllers/inscriptionAtelier.php');
  require_once(__ROOT__.'/src/controllers/authentification.php');
  $allInactif = true;
?>

<?php 
  if(isset($_GET['id'])){
    if(isLoggedIn()){
      inscriptionAtelier($_GET['id']);
    }else{
      header('Location: ./authentification.php');
    }
  };
?>
   <!-- début section des Ateliers-->
    <section class="container">

      <?php $ateliers = getAteliersData();?>
      <?php foreach ($ateliers as $key => $atelier):?>
        <?php 
          if($atelier['etat_atelier'] == "Active"){
            $allInactif = false;
          }
        ?>
        <?php if($atelier['etat_atelier'] == "Active"):?>
        <!--Atelier-->
        <div class="card my-3" style="max-width: 1000px; margin-left: auto; margin-right: auto;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="../../images/<?= $atelier['image']?>" class="card-img" alt="Nos cours de cuisine">
              </div>
              <div class="col-md-8">
                <div class="card-header"><h2><?= $atelier['titre']?></h2></div>
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
                                <a href="../pages/home.php?id=<?= $atelier['id']?>"
                                    class="btn btn-primary
                                    <?php 
                                      if($_SESSION['particulierLoggedIn']){//Ici on vérifie si une personne est connectee afin de gérer le bouton. S'il est connecte on verifie dans session les ateliers auxquels il est connecte
                                        foreach($_SESSION['ateliers'] as $inscriptionIndice){
                                          if($inscriptionIndice == $_SESSION['id']){
                                            echo 'disabled';
                                          }
                                        }
                                      }
                                      if(count($atelier['participants']) == $atelier['nombre_places']){
                                        echo 'disabled';
                                      }
                                      if($_SESSION['cuisinierLoggedIn']){
                                        echo 'disabled';
                                      }
                                    ?>
                                    ">
                                    <?php 
                                      if($_SESSION['particulierLoggedIn']){//Ici on vérifie si une personne est connectee afin de gérer le bouton. S'il est connecte on verifie dans session les ateliers auxquels il est connecte
                                        foreach($_SESSION['ateliers'] as $inscriptionIndice){
                                          if($inscriptionIndice == $_SESSION['id']){
                                            echo 'Inscrit !';
                                            exit();
                                          }
                                        }
                                      }
                                      if(count($atelier['participants']) == $atelier['nombre_places']){
                                        echo 'Atelier plein';
                                      }
                                      else{
                                        echo "S'inscrire";
                                      }
                                    ?>
                                </a>
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
        <?php endif?>
        <?php endforeach ?>
        <?php if($ateliers == null || $allInactif):?>
        <div class="container mt-5 titrePage">
          <h1 class="text-center align-middle font-weight-bold">Aucun ateliers de cuisines à venir</h1>
        </div>
      <?php endif?>



    </section>
    <!--Fin section Atlier-->