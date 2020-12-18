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
      $modification = inscriptionAtelier($_GET['id']);
    }else{
      header('Location: ./authentification.php');
    }
  };
?>

<!-- début section des Ateliers-->
<h1 class="text-center mb-5" style="margin-top:70px">Liste des Ateliers</h1>

<section class="container">
  <?php if(isset($modification)){
            echo $modification;
        }
        ?>
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
                    3, //Ici c'est le nombre d'ateliers par pages
                    $_GET['page']
                );
                if($_GET['page'] > 1){
                  $compteur= ($_GET['page'] * 3) - 2; //On calcule à partir d'où il faut afficher
                }else{
                  $compteur=1;
                }
                
        ?>
  <?php
  $array_valid = [];
    foreach($ateliers as $atelier_valid){
      if($atelier_valid['etat_atelier'] == "Active"){
        $allInactif = false;
        array_push($array_valid, $atelier_valid);
      }
    }
  ?>
    <?php foreach ($array_valid as $key => $atelier):?>

    <?php if($key + 1 == $compteur):?>
    <?php if($atelier['etat_atelier'] == "Active"):?>
    <!--Ici on gère là où on doit prendre les données selon la page actuelle-->
    <?php if($compteur > $pagination->intervalleMin() && $compteur <= $pagination->intervalleMax()):?>
      <?php $compteur++;?>
      <?php $pagination->nombreAfficheActuel();?>
    <!--Atelier-->
    <div class="card cardListe" data-aos="flip-down">
        <div class="d-lg-flex">
            <div class="col-lg-4 col-12">
            <div class="duree d-flex position-absolute w-50 justify-content-center align-items-center font-weight-bold"><?= htmlentities($atelier['prix'], ENT_QUOTES)?> €</div>
                <img src="../../images/<?= $atelier['image']?>" class="card-img imageListe"
                    alt="Nos cours de cuisine">
                    <div class="duree2 d-flex position-absolute w-50 justify-content-center align-items-center font-weight-bold">
                      <?php
                        if((htmlentities($atelier['nombre_places'], ENT_QUOTES) - count($atelier['participants'])) <= 0){
                          echo "COMPLET";
                        }else{
                          echo (htmlentities($atelier['nombre_places'], ENT_QUOTES) - count($atelier['participants'])).' place(s) disponible(s)';
                        } 
                      ?>
                    </div>
            </div>
            <div class="col-lg-8">
                <div class="card-header d-flex align-items-center">
                    <h2 class="w-100">
                        <?= $atelier['titre']?>
                    </h2>
                    <?php if($_SESSION['particulierLoggedIn']):?>
                    <?php foreach($_SESSION['ateliers'] as $indice):?>
                      <?php if($indice == $atelier['id']):?>
                      <div>
                         <i class="fa fa-check fa-3x" aria-hidden="true" style="color:green;"></i>
                        </div>
                        <?php endif;?>
                        <?php endforeach;?>
                    <?php endif; ?>
                </div>
                <div class="card-body card-body-liste d-flex flex-column justify-content-around">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Description : </strong>
                            <?= htmlentities($atelier['description'], ENT_QUOTES)?>
                        </li>
                        <li class="list-group-item mt-5"><strong>Date début : </strong>
                          <?= "Le " . DateTime::createFromFormat('U', htmlentities($atelier['date_debut'], ENT_QUOTES))->format('j M Y');?>
                          <?= "à ". htmlentities($atelier['heure_debut'], ENT_QUOTES);?>
                        </li>
                        <li class="list-group-item"><strong>Durée : </strong>
                            <?= htmlentities($atelier['duree'], ENT_QUOTES);?>
                        </li>
                    </ul>
                    <div class="d-flex flex-lg-row flex-column justify-content-between align-items-center mt-5 basCard">
                        <p class="card-text"><small class="text-muted">
                                <?= !$atelier['modifie'] ? "Ajouté le :" : "Modifié le :"?>
                                <?= htmlentities(substr($atelier['date_ajout'],0,10), ENT_QUOTES)?> à
                                <?= htmlentities(substr($atelier['date_ajout'],11,8), ENT_QUOTES) ?>
                            </small>
                        </p>
                        <a href="../pages/home.php?page=<?= $_GET['page'] ?>&id=<?= $atelier['id']?>" class="btn btn-primary
                                    <?php 
                                      if($_SESSION['particulierLoggedIn']){//Ici on vérifie si une personne est connectee afin de gérer le bouton. S'il est connecte on verifie dans session les ateliers auxquels il est connecte
                                        foreach($_SESSION['ateliers'] as $inscriptionIndice){
                                          if($inscriptionIndice == $atelier['id']){
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
                                    ">S'inscrire

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Fin exemple 1-->

    <!--séparation-->
    <div class="row separated  mt-5">
        <hr class="col-xs-12 col-sm-12 col-lg-12 col-lg-12">
    </div>
    <!--fin séparation-->
    <?php endif?>
    <?php endif?>
    <?php endif?>
    <?php endforeach ?>
    <?php endif?>
    <!--Ici on affiche la pagination s'il y a des articles-->
    <?php if(!$allInactif):?>
      <?php if($ateliers || !$allInactif):?>
        <?= $pagination->toHTMLPrevious();?>
      <?php for($i = 1; $i < $pagination->nombrePages + 1; $i++):?>
        <?= $pagination->toHTMLPages($i);?>
      <?php endfor?>
        <?= $pagination->toHTMLNext();?>
      <?php endif;?>
    <?php endif;?>
    <?php if($ateliers == null || $allInactif):?>
    <div class="container mt-5 titrePage">
        <h1 class="text-center align-middle font-weight-bold">Aucun ateliers de cuisines à venir</h1>
    </div>
    <?php endif?>
</section>
<!--Fin section Atlier-->