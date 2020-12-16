<div class="container-fluid mt-5">
    <h2 class="text-center align-middle mb-5 font-weight-bold">Liste des ateliers</h2>
    <div class="table-responsive">
<<<<<<< HEAD
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
                <h2 class="mb-0 d-flex w-100">
                    <button class="btn btn-link btn-block text-left titreCarteManager" type="button" data-toggle="collapse"
                        data-target="#collapse_<?= $atelier['id'] ?>" aria-expanded="true"
                        aria-controls="collapse_<?= $atelier['id'] ?>">
                            <?= $atelier['titre'] ?>
                    </button>
                </h2>
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
                                <a href="../pages/pageAtelier.php?id=<?= $atelier['id']?>"
                                    class="btn btn-primary">Se désinscrire</a>
=======
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center align-middle">Image</th>
                <th scope="col" class="text-center align-middle">Titre atelier</th>
                <th scope="col" class="text-center align-middle">Date</th>
                <th scope="col" class="text-center align-middle">Prix</th>
                <th scope="col" class="text-center align-middle">Etat</th>
                <th scope="col" class="text-center align-middle">Actions</th>
            </tr>
        </thead>
        <tbody>
                    <tr>
                        <td class="text-center align-middle">
                            <img src="" alt="image enchere" class="img-thumbail" style="width:120px; height:120px; border: none;">
                            <div class="d-flex justify-content-center align-items-center" style="height:120px;width:120px">
                                <i class="fa fa-file-image-o fa-4x" aria-hidden="true"></i>
>>>>>>> parent of 9e2d4be...  branch
                            </div>
                        </td>
                        <td class="text-center align-middle">Titre</td>
                        <td class="text-center align-middle">Date</td>
                        <td class="text-center align-middle">Prix</td>
                        <td class="text-center align-middle">Etat</td>
                        <!--Bouton pour se désinscrire-->
                            <a 
                                href="#" 
                                class="btn btn-primary"  
                                role="button" 
                                aria-pressed="true"
                            >Se désinscrire
                            </a>
                        </td>
                    </tr>
        </tbody>
    </table>
    </div>
        <p class="text-center align-middle mb-5 font-weight-bold"> Vous n'avez pas d'enchères enregistrées</p>
</div>