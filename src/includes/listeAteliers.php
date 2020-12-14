<?php 
  require_once(__ROOT__.'/src/controllers/accesData.php');
  require_once(__ROOT__.'/src/class/Pagination.php');
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
    <?php if($ateliers):?>
    <?php
            //Gestion de la pagination
            //On récupère d'abord la page où l'on est
                if(isset($_GET['page'])){
                    $page_actuelle = $_GET['page'];
                }
                $pagination = new Pagination(
                    $ateliers,
                    3,
                    $_GET['page']
                );
                $compteur=0;
        ?>
    <?php foreach ($ateliers as $key => $atelier):?>
    <?php 
          if($atelier['etat_atelier'] == "Active"){
            $allInactif = false;
            
          }
        ?>
    <?php if($atelier['etat_atelier'] == "Active"):?>
    <!--Ici on gère là où on doit prendre les données selon la page actuelle-->
    <?php if($key + 1 > $pagination->intervalleMin() && $key + 1 <= $pagination->intervalleMax()):?>
      <?php $pagination->nombreAfficheActuel();?>
    <!--Atelier-->
    <div class="card">
        <div class="d-lg-flex">
            <div class="col-md-4 col-12">
                <img src="../../images/<?= $atelier['image']?>" class="card-img imageListe position-relative"
                    alt="Nos cours de cuisine">
            </div>
            <div class="col-md-8">
                <div class="card-header">
                    <h2>
                        <?= $atelier['titre']?>
                    </h2>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Description : </strong>
                            <?= $atelier['description']?>
                        </li>
                        <li class="list-group-item"><strong>Date début : </strong>
                            <?= $atelier['date_debut']?>
                        </li>
                        <li class="list-group-item"><strong>Durée : </strong>
                            <?= $atelier['duree']?> h
                        </li>
                        <li class="list-group-item"><strong>Nombre de réservations :
                            </strong>
                            <?= count($atelier['participants'])?>
                        </li>
                        <li class="list-group-item"><strong>Nombre de places :
                            </strong>
                            <?= $atelier['nombre_places']?>
                        </li>
                        <li class="list-group-item"><strong>Prix : </strong>
                            <?= $atelier['prix']?> €
                        </li>
                    </ul>
                    <div class="d-flex flex-lg-row flex-column w-100 justify-content-between align-items-center mt-5">
                        <p class="card-text"><small class="text-muted">
                                <?= !$atelier['modifie'] ? "Ajouté le :" : "Modifié le :"?>
                                <?= substr($atelier['date_ajout'],0,10)?> à
                                <?= substr($atelier['date_ajout'],11,8) ?>
                            </small>
                        </p>
                        <a href="../pages/home.php?page=1&id=<?= $atelier['id']?>" class="btn btn-primary
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
    <?php endif?>
    <?php endforeach ?>
    <?php endif?>
    <!--Ici on affiche la pagination s'il y a des articles-->
    <?php if($ateliers || !$allInactif):?>
      <?= $pagination->toHTMLPrevious();?>
    <?php for($i = 1; $i < $pagination->nombrePages + 1; $i++):?>
      <?= $pagination->toHTMLPages($i);?>
    <?php endfor?>
      <?= $pagination->toHTMLNext();?>
    <?php endif;?>
    <?php if($ateliers == null || $allInactif):?>
    <div class="container mt-5 titrePage">
        <h1 class="text-center align-middle font-weight-bold">Aucun ateliers de cuisines à venir</h1>
    </div>
    <?php endif?>
</section>
<!--Fin section Atlier-->