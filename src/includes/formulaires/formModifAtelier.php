<?php var_dump($_POST); ?>

<!-- Cette page est la structure du formulaire visible par l'utilisateur dans la "pageAtelier.php" -->

<?php include(__ROOT__ . '/src/controllers/controllerAtelier.php') // Ici on inclut la fonction qui permet de controller la sécurité du formulaire
?>

<?php // Si le bouton submit est cliqué je lance la fonction.
if (isset($_POST['modifier'])) {


    $fichierDonneesAtelier = "../../data/ateliers.json"; // Ici on déterminer le chemin fichier atelier.json où se trouve les données;

    $data = json_decode(file_get_contents($fichierDonneesAtelier), true); // Je décode les données JSON dans la variable $data


    // parcourir le tableau récupère les valeurs $_GET.
    foreach ($data as $key => $atelier) {

        if ($atelier['id'] == $_GET["id"]) {

            $data[$key]['titre'] = $_POST["titre"];
            $data[$key]['description'] = $_POST["description"];
            $data[$key]['date_ajout'] = $_POST["date_ajout"];
            $data[$key]['place_disponible'] = $_POST["place_disponible"];
            $data[$key]['date_debut'] = $_POST["date__debut"];
            $data[$key]['date_debut'] = $_POST["date__debut"];
            $data[$key]['prix'] = $_POST["prix"];

            file_put_contents($fichierDonneesAtelier, json_encode($data)); // ici j'encode les données $data et je les mets dans la variable $fichierDonnéeAtelier

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
            <form action="..\..\controllers\doneeAtelier.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom de l'atelier</label>
                    <input type="text" class="form-control" id="#" aria-describedby="#" name="titreAtelier" value="<?= $atelier['titre'] ?>">

                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" value="<?= $atelier['description'] ?>"></textarea>
                </div>

                <div class="row">
                    <div class="col d-flex flex-column ">
                        <div class="form-group col-lg-12 px-0 mb-0 ">
                            <label for="formGroupExampleInput2">Date de l'atelier</label>
                            <input type="datetime-local" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" name="dateAtelier" <?= $atelier['date_ajout'] ?>>

                        </div>
                        <div class="form-group mt-3">
                            <label for="formGroupExampleInput">Place disponibe</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="placeDisponible" <?= $atelier['place_disponible'] ?>>
                        </div>

                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Heure d'ouverture</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder="selection l'heure" name="time" <?= $atelier['date_debut'] ?>>
                        </div>
                        <div class="form-group mt-3">
                            <label for="formGroupExampleInput">Prix de l'atelier</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder="selection coût" name="prixAtelier" <?= $atelier['prix'] ?>>
                        </div>

                    </div>

                </div>

                <div class=" mt-3 mb-0">
                    <label for="">Image</label>
                </div>
                <div class="input-group mb-3 ">

                    <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload" <?= $atelier['image'] ?>>
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