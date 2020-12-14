<?php
    require_once(__ROOT__.'/src/controllers/ajoutAtelier.php');
?>

<?php
    if(isset($_POST['ajouter'])){
        if($_FILES['image_upload']['name'] == ""){
            $validationFormulaire = [false, '<div class="container alert alert-danger col-12 mb-5">Veuillez sélectionner une image !</div>', 'image_upload'];
        }else{
            $validationFormulaire = ajoutAtelier($_POST, $_FILES);
        }       
    }
    // var_dump(substr($_POST['date_debut'],6,1));
    // var_dump($_FILES);
?>

<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded mr-2" alt="...">
    <strong class="mr-auto">Bootstrap</strong>
    <small>11 mins ago</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    Hello, world! This is a toast message.
  </div>
</div>
    <section class="container mt-5">
        <?php
            if(isset($validationFormulaire[1])){
                echo $validationFormulaire[1];
            }  
        ?>
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
                    value="<?= isset($_POST['titre']) ? htmlentities($_POST['titre'],ENT_QUOTES) : ""?>"
                >
            </div>
            <!--isset($_POST['description']) ? htmlentities($_POST['description'],ENT_QUOTES) : ""--> 
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
                    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore dignissimos ut distinctio sequi! Placeat odio vitae aspernatur accusamus ipsum, corrupti consequuntur neque accusantium quas minima, error, consectetur ea. Accusamus, impedit!</textarea>
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
                        value="<?= isset($_POST['date_debut']) ? htmlentities($_POST['date_debut'],ENT_QUOTES) : ""?>"
                    >
                </div>
                <div class="mb-3 col-lg-4 col-12">
                    <label for="heure_debut">Heure de début :</label>
                    <div class="input-group" id="heure_debut">
                        <select 
                            class="custom-select
                            <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == "heureDebut"){
                                        echo "invalid";
                                    }
                                }
                            ?>"  
                            id="heureSelect" 
                            name="heureDebut"
                        >
                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="heureSelect">H</label>
                        </div>
                        <select 
                            class="custom-select
                            <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == "minDebut"){
                                        echo "invalid";
                                    }
                                }
                            ?>"   
                            id="minSelect" 
                            name="minDebut"
                        >
                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="minSelect">Min</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-lg-4 col-12">
                    <label for="date_debut">Durée :</label>
                    <div class="input-group">
                        <select 
                            class="custom-select
                            <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == "heureDuree"){
                                        echo "invalid";
                                    }
                                }
                            ?>"
                            id="heureSelect2" 
                            name="heureDuree"
                        >
                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="heureSelect2">H</label>
                        </div>
                        <select 
                            class="custom-select
                            <?php
                                if(isset($validationFormulaire[2])){
                                    if($validationFormulaire[2] == "minutesDuree"){
                                        echo "invalid";
                                    }
                                }
                            ?>"
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
                        value="<?= isset($_POST['nombre_places']) ? htmlentities($_POST['nombre_places'],ENT_QUOTES) : 0 ?>"
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
                            value="<?= isset($_POST['prix']) ? htmlentities($_POST['prix'],ENT_QUOTES) : 0 ?>"
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
                <button type="submit" name="ajouter" class="btn btn-primary">Ajouter l'atelier</button>
            </div>
        </form>
       
    </section>

