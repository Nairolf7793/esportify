<?php
require_once  '../templates/header.php';
require_once '../config/function_user.php';

$error = null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $user = verifyUserLoginPassword($pdo, $_POST["pseudo"], $_POST["password"]);

  if ($user) {
    session_regenerate_id(true);
    $_SESSION["user"] = [
      "id" => $user["id"],
      "pseudo" => $user["pseudo"],
      "role" => $user["role"]
    ];
    header("location: ../index.php");
  } else {
    $error = "Pseudo ou mp incorrect";
  }
}
?>

<form action="" method="post">

  <h3 class="mb-3 fw-normal text-center">Veuillez vous connecter</h3>
  <div class="d-flex flex-column align-items-center">
    <div class="form-floating mb-3">
      <input type="pseudo" class="form-control" id="pseudo" name="pseudo" placeholder="">
      <label for="pseudo">Pseudo</label>
    </div>

    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
      <label for="password" class="form-label">Mot de passe</label>
    </div>

    <?php if ($error): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
      </div>
    <?php endif; ?>

    <input type="submit" class="btn btn-primary w-40 py-2 mt-3 " value="Se connecter"></input>
  </div>
</form>

<?php
require_once '../templates/footer.php';
