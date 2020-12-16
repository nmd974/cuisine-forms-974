<?php var_dump($_POST); ?>

<!-- Cette page est la structure du formulaire visible par l'utilisateur dans la "pageAtelier.php" -->

<?php include(__ROOT__ . '/src/controllers/controllerAtelier.php') // Ici on inclut la fonction qui permet de controller la sécurité du formulaire
?>

<?php // Si le bouton submit est cliqué je lance la fonction.
if (isset($_POST['modifier'])) {


    $fichierDonneesAtelier = "../../data/ateliers.json"; // Ici on déterminer le chemin fichier atelier.json où se trouve les données;

    $data = json_decode(file_get_contents($fichierDonneesAtelier), true); // Je décode les données JSON dans la variable $data


    // parcourir le tableau récupère les valeurs $_GET écraser les anciennes données par les nouvelle.
    foreach ($data as $key => $atelier) {

        if ($atelier['id'] == $_GET["id"]) {

            $data[$key]['titre'] = $_POST["titre"];
            $data[$key]['description'] = $_POST["description"];
            $data[$key]['date_ajout'] = $_POST["date_ajout"];
            $data[$key]['nombre_places'] = $_POST["nombre_places"];
            $data[$key]['date_debut'] = $_POST["date_debut"];
            $data[$key]['heure_debut'] = $_POST["heure_debut"];
            $data[$key]['prix'] = $_POST["prix"];
            $data[$key]['modifie'] = true;

            file_put_contents($fichierDonneesAtelier, json_encode($data)); // ici j'encode les données $data et je les mets dans la variable $fichierDonnéeAtelier
            
            header('Location: ../../pages/cuistoManager.php');
        }
    }
}
?>


<?php if (isset($_GET['id'])) { // Je recupère la valeur $_GET_['ID'] dans le fichier atelier.json

    $fichierDonneesAtelier = "../../data/ateliers.json"; // Ici on déterminer le chemin fichier atelier.json où se trouve les données;

    $data = json_decode(file_get_contents($fichierDonneesAtelier), true); // Je décode les données JSON dans la variable $data
}


?>
<?php // Code à commenter !!!
foreach ($data as $atelier) :
?>



    <?php
    if ($atelier['id'] == $_GET["id"]) : // à commenter!!!
    ?>


        <!------------------------------------------------------------------>

        <div class="text-center mt-5 pt-5">
            <h2>
                MODIFIER VOS ATELIERS
            </h2>
        </div>
        <section class="container mt-5 pt-5">
            <form  method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom de l'atelier</label>
                    <input type="text" class="form-control" id="#" aria-describedby="#" name="titre" value="<?= $atelier['titre'] ?>">

                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" <?= $atelier['description'] ?>></textarea>
                </div>

                <div class="row">
                    <div class="col d-flex flex-column ">

                        <div class=" row form-group col-lg-12 px-0 mb-0  ">
                            <div class="col-lg-6">
                                <label for="formGroupExampleInput2">Date début de l'atelier</label>
                                <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" name="date_ajout" value="<?= $atelier['date_ajout'] ?>">
                            </div>
                            <div class="col-lg-6 text-end mr-0 pr-0 ">
                                <label for="appt"> Heure de début:</label>
                                <input type="time" id="appt" name="heure_debut" class="form-control" placeholder="Another input placeholder" value="<?= $atelier['heure_debut'] ?>">
                            </div>

                        </div>


                        <div class="form-group mt-3">
                            <label for="formGroupExampleInput">Place disponibe</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="nombre_places" value="<?= $atelier['nombre_places'] ?>">
                        </div>

                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Heure d'ouverture</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder="selection l'heure" name="date_debut" value="<?= $atelier['date_debut'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="formGroupExampleInput">Prix de l'atelier</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder="selection coût" name="prix" value="<?= $atelier['prix'] ?>">
                        </div>

                    </div>

                </div>

                <div class=" mt-3 mb-0">
                    <label for="">Image</label>
                </div>
                <div class="input-group mb-3 ">

                    <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload" value="<?= $atelier['image'] ?>">
                </div>
                <div class="text-center">
                    <button type="submit" name="modifier" class="btn btn-secondary">Modifier</button>
                </div>
            </form>

        </section>
    <?php endif // Termine la fonction
    ?>
<?php endforeach // Termine la boucle foreach
?>