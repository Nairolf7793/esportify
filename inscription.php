<?php
require_once 'config/function.php';
require_once 'templates/header.php';

/*if (isset($_POST["addUser"])) {
    $res = addUser($pdo, $_POST["pseudo"], $_POST['password'], $_POST["mail"], $_POST["age"]);
}*/

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $verif = verifyUser($_POST);
    if ($verif === true) {
        $resAdd = addUser($pdo, $_POST["pseudo"], $_POST['password'], $_POST["mail"], $_POST["age"]);
        header ("location: login.php");
    } else {
        $errors = $verif;
    }
}
?>

<h1>Inscription</h1>

<form method="POST" enctype="multipart/form-data">
    <div class="mb-1">
        <label for="pseudo"></label>
        <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Votre pseudo">
        <?php if (isset($errors['pseudo'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errors["pseudo"] ?>
            </div>
        <?php } ?>
    </div>
    <div class="mb-1">
        <label for="password"></label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe">
        <?php if (isset($errors['password'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errors["password"] ?>
            </div>
        <?php } ?>
    </div>
    <div class="mb-1">
        <label for="mail"></label>
        <input type="email" name="mail" id="mail" class="form-control" placeholder="Votre email">
        <?php if (isset($errors['mail'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errors["mail"] ?>
            </div>
        <?php } ?>
    </div>

    <div class="mb-1">
        <label for="age"></label>
        <input type="number" name="age" id="age" class="form-control" min="5" placeholder="Votre age">
    </div>
    <div class="mt-4 text-center">
        <input type="submit" class="btn btn-primary" name="addUser" value="S'inscrire">
    </div>
</form>

<?php
require_once 'templates/footer.php'
?>