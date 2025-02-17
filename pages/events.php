<?php
require_once "../templates/header.php";
require_once "../config/function_event.php";

$filters = [];
if (isset($_GET["search"]) && $_GET["search"] !== "") {
  $filters["search"] = $_GET["search"];
}
$events = getEvents($pdo, $filters);

if (isset($message)) {
  echo "<p id='message-alert' class='alert alert-info text-center'>$message</p>";
}
?>

<div class="col-md-3 mb-5">
  <form action="" method="get" >
    <h2>Filtres</h2>
    <div class="p-3 border-bottom">
      <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher">
    </div>
    <div class="p-3 border-bottom">
      <label for="nb_joueurs">Joueurs</label>
      <input type="number" name="nb_joueurs" id="nb_joueurs" class="form-control" placeholder="Nombre de joueurs">
    </div>
    <div class="p-3 border-bottom">
      <label for="start_time">Date de début</label>
      <input type="date" name="start_time" id="start_time" class="form-control">
    </div>
    <div class="p-3 border-bottom">
      <label for="pseudo">Organisateur</label>
      <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Saisir le pseudo">
    </div>
    <div class="mt-3">
      <button type="submit" class="btn btn-primary w-100">Filtrer</button>
    </div>
    <a href="events.php">Réinitialiser</a>
  </form>
</div>

<?php foreach ($events as $event) { ?>
  <div class="card mb-3">
    <div class="row g-0">
    <div class="col-md-3">
      <img src="<?php echo getEventImage($event['chemin_image']) ?>" class="d-block mx-lg-auto img-fluid" alt="Thèmes Bootstrap" width="200" height="200" loading="lazy">
      </div>
      <div class="col-md-6">
        <div class="card-body text-center">
          <h5 class="card-title"><?php echo $event['titre'] ?></h5>
          <p class="card-text"><?php echo $event['description'] ?></p>
          <p class="card-text"><small class="text-body-secondary">Date de début : <?php echo $event['date_debut'] ?></small></p>
          <p class="card-text"><small class="text-body-secondary">Nombre de place disponible : <?php echo $event['nb_joueur'] ?></small></p>
        </div>
      </div>
      <div class="col-md-3 d-flex align-items-center">
        <div class="card-body ">
          <form action="" method="POST">
            <input type="hidden" name="id_event" value="<?php echo $event['id']; ?>">
            <button type="submit" class="btn btn-success btn-inscrire" <?php echo ($event['nb_joueur'] <= 0) ? 'disabled' : ''; ?>>S'inscrire
            </button>
            <a href="events.php" class="btn btn-secondary">Rejoindre l'event</a>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php
require_once "../templates/footer.php";
?>