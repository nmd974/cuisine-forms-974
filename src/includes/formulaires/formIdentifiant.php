<div class="text-center mt-5">
        <h1> Connexion au compte</h1>
</div>


<div class="card-deck m-auto">

  <div class="card rounded"style="max-width: 6000px;">
    <div class="card-body">
      <h5 class="card-title">Déjà membre?</h5>
      <h5 class="card-title">Se connecter</h5>

      <?php echo print_r($_SESSION) ?>

      <?php 
      include("../../controllers/authentification.php"); 
      validationConnexion();
      ?>
      
      
      <!--Début identification-->       
      <form method="POST" enctype="multipart/form-data" action="" class="mb-3"> 

          <div class="">
              <label for="exampleInputEmail1" class="form-label">Identifiant</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required id="username" name="email">
              <div id="emailHelp" class="form-text">votre adresse email.</div>
          </div>
          <div  class="">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="passord" required name="password">
          </div>
          <div class="col-12 text-end my-3">
              <button type="submit" class="btn btn-primary mr-4" name="connecter">Se conneter</button>
          </div>
           
                    
      </form>
      <!--Fin identification-->


    </div>
</div>

<div class="card rounded" style="max-width: 600px;">
    <div class="card-body">
      <h5 class="card-title">Pas encore membre ?</h5>
      <h5 class="card-title">Créer vite votre compte</h5>

       <!--appel controller SignUp positionner ici de manière à rester dans la colonne inscription-->
       <?php include("../controllers/signUp.php"); ?>

       <!--Début Formulaire inscription-->
       <form class="row" method="POST" action="" enctype="multipart/form-data">
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
                        <input type="number" class="form-control" value="" name="telUser">
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="inputPassword4" name="passwordUser" required>
                    </div>

                    <!--button validation inscription-->
                    <div class="col-12 text-end my-3">
                        
                        <button type="submit" class="btn btn-primary mr-5" name="signUp" formmethod="post">M'inscrire</button>
                                
                    </div>

                </form>
                <!--Fin Formulaire-->
    </div>
  </div>

</div>