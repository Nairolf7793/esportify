<?php
require_once  'templates/header.php';

?>

<form action="" method="post">
   
    <h3 class="mb-3 fw-normal text-center">Veuillez vous connecter</h3>
    <div class="d-flex flex-column align-items-center">
    <div class="form-floating mb-3">
      <input type="pseudo" class="form-control" id="floatingInput" placeholder="">
      <label for="floatingInput">Pseudo</label>
    </div>

    <div class="form-floating mb-4 ">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
      <label for="floatingPassword" class="form-label">Mot de passe</label>
    </div>

    <a href="" class="btn btn-primary w-40 py-2 " type="submit">Se connecter</a>
    </div>
</form>

<?php 
require_once 'templates/footer.php';