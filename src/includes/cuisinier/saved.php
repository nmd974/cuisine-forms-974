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
        header('Location: ./home.php');
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
    // var_dump(substr($_POST['date_debut'],6,1));
    // var_dump($_FILES);
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
            <!-- Modal -->
            <div class="modal fade" id="<?= 'modal_'.$atelier['id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modification de l'atelier</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="post" enctype="multipart/form-data">
                            <div class="modal-body">
<?php if(isset($validationFormulaire[1])){echo $validationFormulaire[1];} ;?>
<?php var_dump($_POST);?>
                                <div class="mb-3 form-group col-12">
                                    <label >Titre de l'atelier :</label>
                                    <input type="text" class="form-control 
                    <?php
                        if(isset($validationFormulaire[2])){
                            if($validationFormulaire[2] == " titre"){ echo "invalid" ; } } ?>"
                                    
                                    aria-describedby="titre"
                                    name="titre"
                                    value="<?= isset($atelier['titre']) ? htmlentities($atelier['titre'],ENT_QUOTES) : ""?>"
                                    >
                                </div>
                                <div class="mb-3 form-group col-12">
                                    <label>Description :</label>
                                    <textarea class="form-control
                    <?php
                        if(isset($validationFormulaire[2])){
                            if($validationFormulaire[2] == " description"){ 
                                echo "invalid" ; 
                            } 
                        }
                     ?>"
                   
                    rows="3" 
                    name="description"
                    ><?= isset($atelier['description']) ? htmlentities($atelier['description'],ENT_QUOTES) : ""?></textarea>
                                </div>

                                <div class="mb-3 form-group col-12">
                                    <label >Date de début :</label>
                                    <input type="date" class="form-control
                        <?php
                            if(isset($validationFormulaire[2])){
                                if($validationFormulaire[2] == " date_debut"){ echo "invalid" ; } } ?>"
                                   
                                    name="date_debut"
                                    value="<?= isset($atelier['date_debut']) ? htmlentities($atelier['date_debut'],ENT_QUOTES) : ""?>"
                                    >
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="heure_debut">Heure de début :</label>
                                    <div class="input-group" id="heure_debut">
                                        <select class="custom-select
                            <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == " heureDebut"){ echo "invalid" ; } } ?>"
                                            id="heureSelect"
                                            name="heureDebut"
                                            >
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="heureSelect">H</label>
                                        </div>
                                        <select class="custom-select
                            <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == " minDebut"){ echo "invalid" ; } } ?>"
                                            id="minSelect"
                                            name="minDebut"
                                            >
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="minSelect">Min</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="date_debut">Durée :</label>
                                    <div class="input-group">
                                        <select class="custom-select
                            <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == " heureDuree"){ echo "invalid" ; } } ?>"
                                            id="heureSelect2"
                                            name="heureDuree"
                                            >
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="heureSelect2">H</label>
                                        </div>
                                        <select class="custom-select
                            <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == " minutesDuree"){ echo "invalid" ; } } ?>"
                                            id="minSelect2"
                                            name="minutesDuree"
                                            >
                                            <option value="00" selected>00</option>
                                            <option value="15">15</option>
                                            <option value="30">30</option>
                                            <option value="45">45</option>
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="minSelect2">Min</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-lg-flex">
                                    <div class="mb-3 col-lg-6 col-12">
                                        <label for="nombre_places">Nombre de places :</label>
                                        <input type="number" class="form-control
                        <?php
                            if(isset($validationFormulaire[2])){
                                if($validationFormulaire[2] == " nombre_places"){ echo "invalid" ; } } ?>"
                                        id="nombre_places"
                                        name="nombre_places"
                                        value=" <?= isset($atelier['nombre_places']) ? htmlentities($atelier['nombre_places'],ENT_QUOTES) : 0 ?>"
                                        >
                                    </div>

                                    <div class="mb-3 col-lg-6 col-12">
                                        <label for="nombre_places">Prix :</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control
                            <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == " prix"){ echo "invalid" ; } } ?>"
                                            id="prix"
                                            name="prix"
                                            value="<?= isset($atelier['prix']) ? htmlentities($atelier['prix'],ENT_QUOTES) : 0 ?>"
                                            >
                                            <div class="input-group-append">
                                                <span class="input-group-text">€</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3 mt-3 col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input
                        <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == " image_upload"){ echo "invalid" ; } } ?>"
                                        style="border:1px solid green;"
                                        id="image_upload"
                                        name="image_upload"
                                        >
                                        <label class="custom-file-label" for="image_upload">Choisir une image</label>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                <button type="submit" id="<?= 'button_'.$atelier['id']?>" name="modifier" class="btn btn-primary">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--Conteu en liste -->
            <?php if ($atelier['proprietaire'] == $_SESSION['id']) : ?>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#collapse_<?= $atelier['id'] ?>" aria-expanded="true"
                        aria-controls="collapse_<?= $atelier['id'] ?>">
                        <h2 class="mb-0 d-flex">
                            <?= $atelier['titre'] ?>
                        </h2>
                    </button>
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
                                    <?= $atelier['date_debut'] ?>
                                </li>
                                <li class="list-group-item"><strong>Durée : </strong>
                                    <?= $atelier['duree'] ?> h
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
                                <a href="../pages/compteCuisinier.php?idmo=<?= $atelier['id'] ?>"
                                    class="btn btn-primary" id="modifierAtelier">Modifier</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#<?= 'modal_'.$atelier['id']?>">
                                    Modifier
                                </button>
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
<?php endif; ?>