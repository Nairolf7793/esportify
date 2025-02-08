<?php
require_once "templates/header.php";
require_once "config/function_event.php";

$events = getEvents($pdo);

if (isset($_GET['action']) && isset($_GET['id'])) {
    if ($_GET['action'] === 'okEvents') {
        $res = updateEvents($pdo, (int)$_GET['id']);
        header('location:account.php');
    }
    if ($_GET['action'] === 'deleteEvents') {
        $res = deleteEvents($pdo, (int)$_GET['id']);
        header('location:account.php');
    }
}
?>

<div class=" d-flex">
    <?php
    require_once "templates/header_account.php";
    ?>
    <table class="table">
        <?php if (isset($_SESSION['user']['id'])) {
            $id_joueur = $_SESSION['user']['id'];
        ?>
            <div class="col-sm-10">
                <h3> Valider les inscription</h3>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($events as $event) { ?>
                        <div class="col">
                            <div class="card h-100">
                                <h5 class="card-title"><?php echo $event['titre']; ?></h5>
                                <p><?php echo $event['description']; ?></p>
                                <p>Statut de l'event : <?php echo $event['visibilite'] ?></p>
                                <a class="btn btn-primary" href="?action=okEvents&id=<?= $event['id'] ?>">Valider</a>
                                <a class="btn btn-primary" href="?action=deleteEvents&id=<?= $event['id'] ?>">Supprimer</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </table>
</div>
<?php
require_once "templates/footer.php";
?>