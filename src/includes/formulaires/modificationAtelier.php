<?php
    require_once(__ROOT__.'/src/controllers/accesData.php');
    require_once(__ROOT__.'/src/controllers/modifierAtelier.php');
?>
<?php
    if(!$_SESSION['cuisinierLoggedIn']){
        header('Location: ./home.php?page=1');
    }
?>

<?php
    if(isset($_POST['modifier'])){
        if($_FILES['image_upload']['name'] !== ""){
            $validationFormulaire = modifierAtelier($_POST, $_FILES, $_GET['idmo']);
        }else{
            $validationFormulaire = modifierAtelier($_POST, null, $_GET['idmo']);
        }       
    }
?>

    <section class="container mt-5">
        <?php
            if(isset($validationFormulaire[1])){
                echo $validationFormulaire[1];
            }  
        ?>
        <?php if(isset($_GET['idmo'])):?><!--On recupere l'id passé en URL-->
        <?php $data = getAteliersData();?>
        <?php foreach($data as $atelier):?>
        <?php if($atelier['id'] == $_GET['idmo']):?>
          <form method="post" enctype="multipart/form-data">
            <div class="mb-3 form-group col-12">
                <label for="titre">Titre de l'atelier :</label>
                <input 
                    type="text" 
                    class="form-control 
                    <?php
                        if(isset($validationFormulaire[2])){
                            if($validationFormulaire[2] == "titre"){
                                echo "invalid";
                            }
                        }
                    ?>" 
                    id="titre" 
                    aria-describedby="titre" 
                    name="titre" 
                    value="<?= isset($atelier['titre']) ? htmlentities($atelier['titre'],ENT_QUOTES) : ""?>"
                >
            </div>
            <!--isset($atelier['description']) ? htmlentities($atelier['description'],ENT_QUOTES) : ""--> 
            <div class="mb-3 form-group col-12">
                <label for="description">Description :</label>
                <textarea 
                    class="form-control
                    <?php
                        if(isset($validationFormulaire[2])){
                            if($validationFormulaire[2] == "description"){
                                echo "invalid";
                            }
                        }
                    ?>"
                    id="description" 
                    rows="3" 
                    name="description"
                    ><?= isset($atelier['description']) ? htmlentities($atelier['description'],ENT_QUOTES) : ""?></textarea>
            </div>
            <div class="d-lg-flex">
                <div class="mb-3 form-group col-lg-4 col-12">
                    <label for="date_debut">Date de début :</label>
                    <input 
                        type="date" 
                        class="form-control
                        <?php
                            if(isset($validationFormulaire[2])){
                                if($validationFormulaire[2] == "date_debut"){
                                    echo "invalid";
                                }
                            }
                        ?>"  
                        id="date_debut" 
                        name="date_debut"
                        value="<?= isset($atelier['date_debut']) ? DateTime::createFromFormat('U', htmlentities($atelier['date_debut'], ENT_QUOTES))->format('Y-m-d') : ""?>"
                    >
                </div>
                <div class="mb-3 col-lg-4 col-12">
                    <label for="heure_debut">Heure de début :</label>
                    <div class="input-group" id="heure_debut">
                        <input 
                            class="form-control
                            <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == "heureDebut"){
                                        echo "invalid";
                                    }
                                }
                            ?>"  
                            id="heureSelect" 
                            name="heureDebut"
                            type="number"
                            value="<?= isset($atelier['heureDebut']) ? htmlentities($atelier['heureDebut'],ENT_QUOTES) : ""?>"
                        >

                        <div class="input-group-append">
                            <label class="input-group-text" for="heureSelect">H</label>
                        </div>
                        <input 
                            class="form-control
                            <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == "minDebut"){
                                        echo "invalid";
                                    }
                                }
                            ?>"   
                            id="minSelect" 
                            name="minDebut"
                            type="number"
                            value="<?= isset($atelier['minDebut']) ? htmlentities($atelier['minDebut'],ENT_QUOTES) : ""?>"
                        >
                        <div class="input-group-append">
                            <label class="input-group-text" for="minSelect">Min</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-lg-4 col-12">
                    <label for="date_debut">Durée :</label>
                    <div class="input-group">
                        <input 
                            class="form-control
                            <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == "heureDuree"){
                                        echo "invalid";
                                    }
                                }
                            ?>"
                            id="heureSelect2" 
                            name="heureDuree"
                            type="number"
                            value="<?= isset($atelier['heureDuree']) ? htmlentities($atelier['heureDuree'],ENT_QUOTES) : ""?>"
                        >
                        <div class="input-group-append">
                            <label class="input-group-text" for="heureSelect2">H</label>
                        </div>
                        <input 
                            class="form-control
                            <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == "minutesDuree"){
                                        echo "invalid";
                                    }
                                }
                            ?>"
                            id="minSelect2" 
                            name="minutesDuree"
                            type="number"
                            value="<?= isset($atelier['minutesDuree']) ? htmlentities($atelier['minutesDuree'],ENT_QUOTES) : ""?>"
                        >
                        <div class="input-group-append">
                            <label class="input-group-text" for="minSelect2">Min</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-lg-flex">
                <div class="mb-3 col-lg-6 col-12">
                    <label for="nombre_places">Nombre de places :</label>
                    <input 
                        type="number" 
                        class="form-control
                        <?php
                            if(isset($validationFormulaire[2])){
                                if($validationFormulaire[2] == "nombre_places"){
                                    echo "invalid";
                                }
                            }
                        ?>" 
                        id="nombre_places" 
                        name="nombre_places"
                        value="<?= isset($atelier['nombre_places']) ? htmlentities($atelier['nombre_places'],ENT_QUOTES) : 0 ?>"
                    >
                </div>

                <div class="mb-3 col-lg-6 col-12">
                    <label for="nombre_places">Prix :</label>
                    <div class="input-group">
                        <input 
                            type="number" 
                            class="form-control
                            <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == "prix"){
                                        echo "invalid";
                                    }
                                }
                            ?>" 
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
                    <input 
                        type="file" 
                        class="custom-file-input
                        <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == "image_upload"){
                                        echo "invalid";
                                    }
                                }
                        ?>" 
                        style="border:1px solid green;"
                        id="image_upload" 
                        name="image_upload"
                    >
                    <label class="custom-file-label" for="image_upload">Choisir une image</label>
                </div>
            </div>
            <div class="text-center mt-5">
                <button type="submit" name="modifier" class="btn btn-primary">Modifier l'atelier</button>
            </div>
        </form>
        <?php endif?>
       <?php endforeach?>
       <?php endif?>
    </section>

