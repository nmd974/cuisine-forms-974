
<div class="card-deck m-auto">

  <div class="card rounded"style="max-width: 6000px;">
    <div class="card-body">
      <h5 class="card-title">Déjà membre?</h5>
      <h5 class="card-title">Se connecter</h5>

      <?php 
        
        require_once(__ROOT__.'/src/controllers/authentification.php');
        if(isset($_POST['connecter'])){
            $messageValidation = validationConnexion();
        }

      ?>
      
      
      <!--Début identification-->  
      <?php 
        if(isset($messageValidation[2])){
            echo $messageValidation[2];
        }
      ?>
      <form method="POST" enctype="multipart/form-data" action="" class="mb-3"> 

          <div class="">
              <label for="email" class="form-label">Identifiant</label>
              <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Votre adresse email" name="email">
          </div>
          <div  class="">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Votre adresse mot de passe"  name="password">
          </div>
          <div class="col-12 text-end my-3">
              <button type="submit" class="btn btn-primary mr-4" name="connecter">Se connecter</button>
          </div>
           
                    
      </form>
      <!--Fin identification-->


    </div>
</div>

<div class="card rounded" style="max-width: 600px;">
    <div class="card-body">
      <h5 class="card-title">Pas encore membre ?</h5>
      <h5 class="card-title">Créer vite votre compte</h5>

       <!--Vérifie si un champs en vide avant lancer la vérifications des valeurs-->
       <?php 
       
       @$nom=$_POST["nomUser"];
       @$prenom=$_POST["prenomUser"];
       @$login=$_POST["emailUser"];
       @$pass=$_POST["passwordUser"];
       @$repass=$_POST["repass"];
       @$valider=$_POST["signUp"];
       @$erreur="";
       if(isset($valider)){

          if(empty($nom)) $erreur="Nom laissé vide!";
          elseif(empty($prenom)) $erreur="Prénom laissé vide!";
          elseif(empty($login)) $erreur="Email laissé vide!";
          elseif(empty($pass)) $erreur="Mot de passe laissé vide!";
          elseif(empty($repass)) $erreur="Retapé mot de passe laissé vide!";
          else{
            include("../controllers/signUp.php"); 
          }
        }    
        ?>

       <!--Début Formulaire inscription-->
       <form class="row" method="POST" action="" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nomUser" value="">
                    </div>
                    <div class="col-md-12">
                        <label for="prenom" class="form-label">Prénoms</label>
                        <input type="text" class="form-control" value="" name="prenomUser">
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="emailUser">
                    </div>
                    <div class="col-md-12">
                        <label for="telephone" class="form-label">Telephone</label>
                        <input type="number" class="form-control" value="" name="telUser">
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="inputPassword4" name="passwordUser">
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Retaper Mot de passe</label>
                        <input type="password" class="form-control" id="inputPassword4" name="repass">
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