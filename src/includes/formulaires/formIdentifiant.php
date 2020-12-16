  
<?php  
    //appel du controllers authetification
    require_once(__ROOT__.'/src/controllers/authentification.php');
    if(isset($_POST['submit'])){ //Ici on va contrôler le mot de passe saisi
        $auth = validationConnexion($_POST);
        if($auth[0] && $auth[1] == "admin"){
            $_SESSION['cuisinierLoggedIn'] = true;
            //on envoi vers le lien management
            header('Location: ../../pages/cuistoManager.php?page=1');
        };
        if($auth[0] && $auth[1] == "user"){
            $_SESSION['particulierLoggedIn'] = true;
            //on envoir user vers index
            header('Location: ../../pages/home.php?page=1');
        }
    }

?>
    
    
    <div class="text-center mt-5 pt-5">
        <h1> Connexion au compte</h1>
    </div>
    <section class="container mt-5 pt-5">

        <div class="row d-flex">

<<<<<<< HEAD
  <div class="card rounded"style="max-width: 6000px;">
    <div class="card-body">
      <h5 class="card-title">Déjà membre?</h5>
      <h5 class="card-title">Se connecter</h5>
=======
            <div class=" col-lg col-md-12 col-sm-12">
>>>>>>> parent of 9e2d4be...  branch

                <div class="col-12">
                    <h6 class="text-center"> Déjà membre?</h6>
                    <h6 class="text-center"> Se conneter</h6>
                </div>

                <!--Début identification-->
                <form method="POST"
                enctype="multipart/form-data" action="<?php htmlentities($_SERVER["PHP_SELF"], ENT_QUOTES)?>"> 

                <?php if(isset($_POST['submit'])){
                    echo $auth[2];
                }?>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Identifiant</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required id="username" name="username">
                      <div id="emailHelp" class="form-text">votre adresse email.</div>
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="passord" required name="password">
                    </div>
                    <div class="col-12 text-end mb-5">
                        <button type="submit" class="btn btn-primary">Se conneter</button>
                    </div>
                    

                </form>
                <!--Fin identification-->

            </div>


            <div class="col-lg col-md-12 col-sm-12">

                <!--Titre section Inscription-->
                <div class="col-12">
                    <h6 class="text-center"> Pas encore membre ?</h6>
                    <h6 class="text-center"> Créez vite votre compte</h6>
                </div>

                <!--Début Formulaire inscription-->
                <form class="row g-3" method="POST" action="" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nomUser" value="" required>
                    </div>
                    <div class="col-md-12">
                        <label for="prenom" class="form-label">Prénoms</label>
                        <input type="text" class="form-control" value="" required name="prenomUser">
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="emailUser" required>
                    </div>
                    <div class="col-md-12">
                        <label for="telephone" class="form-label">Telephone</label>
<<<<<<< HEAD
                        <input type="number" class="form-control" name="telUser" id="telephone">
=======
                        <input type="number" class="form-control" value="" name="telUser">
>>>>>>> parent of 9e2d4be...  branch
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="inputPassword4" name="passwordUser" required>
                    </div>

                    <!--button validation inscription-->
                    <div class="col-12 text-end">
                        
                        <button type="submit" class="btn btn-primary" name="signUp" formmethod="post">M'inscrire</button>
                                
                    </div>

                    <!--appel controller SignUp positionner ici de manière à rester dans la colonne inscription-->
                     <?php include("../controllers/signUp.php"); ?>

                </form>
                <!--Fin Formulaire-->

            </div>
    
        </div>
    </section>
    
