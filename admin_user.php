<?php require_once 'templates/header.php';

require_once 'config/function_admin.php';

$lists = adminListInscription($pdo);
if (isset($_GET['action']) && isset($_GET['id'])) {
    if ($_GET['action'] === 'okOrga') {
        $res = adminUpdateOrga($pdo, (int)$_GET['id']);
        header('location:admin_user.php');
    }
    if ($_GET['action'] === 'okJoueur') {
        $res = adminUpdateJoueur($pdo, (int)$_GET['id']);
        header('location:admin_user.php');
    }
}

?>
<div class="d-flex">
    <?php require_once 'templates/header_account.php';
    ?>
    <div class="col">
        <h1>Compte joueur</h1>

        <div class="row">
            <?php foreach ($lists as $list) { ?>
                <div class="col-sm-6 mb-3 mb-sm-0">

                    <div class="card">
                        <div class="card-body">
                            <p>Nom du joueur : <?php echo $list['pseudo'] ?></p>
                            <p>Role : <?php echo $list['role'] ?></p>
                            <a class="btn btn-primary" href="?action=okOrga&id=<?= $list['id'] ?>">Valider</a>
                            <a class="btn btn-primary" href="?action=okJoueur&id=<?= $list['id'] ?>">Supprimer</a>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
</div>