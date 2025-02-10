<?php
require_once "templates/header.php";
require_once "config/function_event.php";

$events = getEvents($pdo);
?>
<div class=" d-flex gap-3">
    <?php
    require_once "templates/header_account.php";
    ?>
    <table class="table">
        <?php if (isset($_SESSION['user']['id'])) {
            $id_joueur = $_SESSION['user']['id'];
            $inscriptions = fetchInscriptionsByUser($pdo, $id_joueur);
        ?>
            <div class="col-sm-10">
                <h3>Mes Events</h3>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($inscriptions as $inscription) { ?>
                        <div class="col">
                            <div class="card h-100 p-3">
                                <h5 class="card-title"><?php echo $inscription['titre']; ?></h5>
                                <p><?php echo $inscription['description']; ?></p>
                                <p>Statut de l'event : <?php echo $inscription['visibilite'] ?></p>
                                <p>Statut de l'inscription : <?php echo $inscription['statut'] ?></p>
                                <?php if ($inscription['statut'] == 'oui'): ?>
                                    <a href="" class="btn btn-primary" id="online">Rejoindre</a>
                                <?php else :""?>
                                <?php endif ?>                             
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </table>
</div>

<?php
require_once "templates/footer.php"
?>