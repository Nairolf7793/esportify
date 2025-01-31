<?php
require_once "templates/header.php";
require_once "config/function_event.php";
$id = (int)$_GET["id"];
$event = getEventsById($pdo, $id);
?>

<div class="col-md-4">
    <div class="card">
        <img src="" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $event['titre'] ?></h5>
            <p class="card-text"><?php echo $event['description'] ?></p>
            <div class="d-flex flex-row gap-2">
                <a href="" class="btn btn-primary">S'inscrire</a>
                <a href="" class="btn btn-primary">Rejoindre</a>
            </div>
        </div>
    </div>
</div>

<?php
require_once "templates/footer.php";
?>