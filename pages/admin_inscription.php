<?php
require_once "../templates/header.php";
require_once "../config/function_event.php";

if (isset($_GET['action']) && isset($_GET['id'])) {
    if ($_GET['action'] === 'okInscription') {
        $res = updateInscription($pdo, (int)$_GET['id']);
        header('location:admin_inscription.php');
    }
    if ($_GET['action'] === 'deleteInscription') {
        $res = deleteInscription($pdo, (int)$_GET['id']);
        header('location:admin_inscription.php');
    }
}
?>

<div class=" d-flex">
    <?php
    require_once "../templates/header_account.php";
    ?>
    <table class="table">
        <?php if (isset($_SESSION['user']['id'])) {
            $id_joueur = $_SESSION['user']['id'];
            $inscriptions = fetchInscriptionsByUser($pdo, $id_joueur);
        ?>
            <div class="col-sm-10">
                <h3> Valider les inscription</h3>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($inscriptions as $inscription) { ?>
                        <div class="col">
                            <div class="card h-100">
                                <h5 class="card-title"><?php echo $inscription['titre']; ?></h5>
                                <p><?php echo $inscription['description']; ?></p>
                                <p>Statut de l'inscription : <?php echo $inscription['statut'] ?></p>
                                <a class="btn btn-primary" href="?action=okInscription&id=<?= $inscription['id'] ?>">Valider</a>
                                <a class="btn btn-primary" href="?action=deleteInscription&id=<?= $inscription['id'] ?>">Supprimer</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </table>
</div>

<?php
require_once "../templates/footer.php";
?>