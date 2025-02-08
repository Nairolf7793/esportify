<?php
session_start();
require_once __DIR__ . '/../config/menu.php';
require_once __DIR__ . '/../config/function_user.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/override-bootstrap.css">
    <title>Esportify</title>
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img class="rounded-circle" src="../assets/images/logo.png" alt="logo du site esportify" width="100px">
                </a>
            </div>

            <ul class="nav col-6 col-md-auto mb-2 justify-content-center mb-md-0 nav nav-pills">
                <?php foreach ($mainMenu as $key => $value) { ?>
                    <li class="nav-item"><a href="<?php echo $key ?>" class="nav-link <?php if ($currentPage === "$key") { echo "active"; } ?>"><?php  echo $value ?></a></li>
                <?php } ?>
            </ul>

            <div class="col-3 text-end">
            <?php if (isset($_SESSION['user'])): ?>
                    <a href="account.php" class="btn btn-primary me-2">Mon espace</a>
                    <a href="logout.php" class="btn btn-primary me-2">Déconnexion</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-outline-primary me-2">Se connecter</a>
                    <a href="inscription.php" class="btn btn-primary">S'inscrire</a>
                <?php endif; ?>
            </div>
        </header>