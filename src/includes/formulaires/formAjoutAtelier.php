<?php
    require_once(__ROOT__.'/src/controllers/validationAtelier.php'); // j'appel ma fuction validation qui se retrouve dans le fichier controlelers
    if(isset($_POST["valider"])){ // si onclik boutont on repart à la suite
        $validation = validerDonneesAtelierForm($_POST, $_FILES); // je met la valeur de ma fonction pour aller à ma validation formulair
        if(!$validation["valide"]){
            $message = '<div class="alert alert-danger">'.$validation["message"].'</div>';
            echo $message;
        }else{
            ajouterAtelier($_POST, $_FILES); // declarations de mes données dans le fichier ajout Atelier
            header("Location:.\cuistoManager.php"); // si toule traitements son bon j'afiche dans ma page
        }
    }
?>


    <div class="text-center mt-5 pt-5">
        <h2>
            AJOUTEZ VOS ATELIERS
        </h2>
    </div>
    <section class="container mt-5 pt-5">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titre" class="form-label">Nom de l'atelier</label>
                <input type="text" class="form-control" id="titre" aria-describedby="#" name="titre" 
                    value='<?php if(isset($_POST["titre"])){ echo htmlentities($_POST["titre"]);}?>' >
                
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description moin de 250 caractères</label>
                <textarea class="form-control" id="description" rows="3" name="description"><?php if(isset($_POST["description"])){ echo htmlentities($_POST["description"]);}?></textarea>
            </div>
           
            <div class="row">
                <div class="col d-flex flex-column ">
                    <div class=" row form-group col-lg-12 px-0 mb-0  ">
                        <div class="col-lg-6">
                            <label for="date_debut">Date début de l'atelier</label>
                            <input type="date" class="form-control" id="date_debut" placeholder="Another input placeholder" name="date_debut" 
                                value='<?php if(isset($_POST["date_debut"])){ echo htmlentities($_POST["date_debut"]);}?>'>
                        </div>
                        <div class="col-lg-6 text-end mr-0 pr-0 ">
                            <label for="heure_debut"> Heure de début:</label>
                            <input type="time" id="heure_debut" name="heure_debut" class="form-control" placeholder="Another input placeholder" 
                                value='<?php if(isset($_POST["heure_debut"])){ echo htmlentities($_POST["heure_debut"]);}?>'>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="nombre_places">Place disponibe</label>
                        <input type="number" class="form-control" id="nombre_places" placeholder="Example input placeholder" name="nombre_places" 
                            value='<?php if(isset($_POST["nombre_places"])){ echo htmlentities($_POST["nombre_places"]);}?>'>
                    </div>
                    
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="duree">Durée</label>
                        <input type="number" class="form-control" id="duree" placeholder="selection l'heure" name="duree" 
                            value='<?php if(isset($_POST["duree"])){ echo htmlentities($_POST["duree"]);}?>'>
                    </div>
                    <div class="form-group mt-3">
                        <label for="prix">Prix de l'atelier</label>
                        <input type="number" class="form-control" id="prix" placeholder="selection coût" name="prix" 
                            value='<?php if(isset($_POST["prix"])){ echo htmlentities($_POST["prix"]);}?>'>
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
            <div class="input-group mb-3 ">
               
                <input type="file" for="image" class="form-control" id="image" aria-describedby="inputGroupFileAddon03" aria-label="Upload" name="image">
            </div>
            <div class="text-center">
                <button type="submit" name="valider" class="btn btn-secondary">Ajouter</button>
            </div>
        </form>
       
    </div>

