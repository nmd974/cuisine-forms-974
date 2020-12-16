
<<<<<<< HEAD

    <div class="text-center mt-5 pt-5">
        <h2>
            AJOUTEZ VOS ATELIERS
        </h2>
    </div>
    <section class="container mt-5 pt-5">
        <form action="..\controllers\doneeAtelier.php" method="post" >
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom de l'atelier</label>
                <input type="text" class="form-control" id="#" aria-describedby="#" name="titre">
                
=======
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
>>>>>>> parent of 78f5450... Merge branch 'main' of https://github.com/nmd974/cuisine-forms-974 into main
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
            </div>
<<<<<<< HEAD
           
            <div class="row">
                <div class="col d-flex flex-column ">
                    <div class=" row form-group col-lg-12 px-0 mb-0  ">
                        <div class="col-lg-6">
<<<<<<< HEAD
                            <label for="date_debut">Date début de l'atelier</label>
                            <input type="date" class="form-control" id="date_debut" placeholder="Another input placeholder" name="date_debut" 
                                value='<?php if(isset($_POST["date_debut"])){ echo htmlentities($_POST["date_debut"]);}?>'>
=======
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
                            value="<?= isset($_POST['heureDebut']) ? htmlentities($_POST['heureDebut'],ENT_QUOTES) : ""?>"
                        >

                        <div class="input-group-append">
                            <label class="input-group-text" for="heureSelect">H</label>
>>>>>>> parent of 78f5450... Merge branch 'main' of https://github.com/nmd974/cuisine-forms-974 into main
=======
                            <label for="formGroupExampleInput2">Date début de l'atelier</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" name="date_debut" >
>>>>>>> parent of 223812b...  change branch
                        </div>
                        <div class="col-lg-6 text-end mr-0 pr-0 ">
                            <label for="appt"> Heure de début:</label>
                            <input type="time" id="appt" name="heure_debut" class="form-control" placeholder="Another input placeholder" >
                        </div>
                        
                    </div>
                    <div class="form-group mt-3">
                        <label for="formGroupExampleInput">Place disponibe</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="nombre_places" >
                    </div>
                    
                </div>
<<<<<<< HEAD
                <div class="col">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Durée</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="selection l'heure" name="duree" >
                    </div>
                    <div class="form-group mt-3">
<<<<<<< HEAD
                        <label for="prix">Prix de l'atelier</label>
                        <input type="number" class="form-control" id="prix" placeholder="selection coût" name="prix" 
                            value='<?php if(isset($_POST["prix"])){ echo htmlentities($_POST["prix"]);}?>'>
=======
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
                            value="<?= isset($_POST['heureDuree']) ? htmlentities($_POST['heureDuree'],ENT_QUOTES) : ""?>"
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
                            value="<?= isset($_POST['minutesDuree']) ? htmlentities($_POST['minutesDuree'],ENT_QUOTES) : ""?>"
                        >
                        <div class="input-group-append">
                            <label class="input-group-text" for="minSelect2">Min</label>
                        </div>
>>>>>>> parent of 78f5450... Merge branch 'main' of https://github.com/nmd974/cuisine-forms-974 into main
=======
                        <label for="formGroupExampleInput">Prix de l'atelier</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="selection coût" name="prix" >
>>>>>>> parent of 223812b...  change branch
                    </div>
                   
                </div>
                
            </div>
            
            <div class=" mt-3 mb-0">
                <label for="">Image</label>
            </div>
            <div class="input-group mb-3 ">
               
                <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload" name="image">
            </div>
            <div class="text-center">
                <button type="submit"  class="btn btn-secondary">Ajouter</button>
            </div>
        </form>
       
    </section>

