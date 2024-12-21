<?php 
require_once "../db/DbConnexion.php";
require_once "../db/session.php";

$query = DbConnection::getPdo()->query('SELECT * FROM event');
$event = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="">
  <div class="row">
    <div class="col-sm-2">
    
<nav class="navbar navbar-expand-lg bg-body-tertiary d-flex flex-column">
  <div class="container-fluid d-flex flex-column">
    <a class="navbar-brand" href="#">Mon espace</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav flex-column text-center">
        <li class="nav-item">
          <a class="nav-link" href="/create_event">Créer un evenement</a>
        </li>
        <?php if (isset($_SESSION["user"])): ?> 
            <?php if ($_SESSION["user"]["role"] == "admin"): ?> 
                <a class="nav-link" href = "/validation_event">Validation event</a>
                <a class="nav-link" href = "/liste_joueur">Voir les joueurs inscrits</a>
            <?php endif; ?>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Mes favoris</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Modifier mon comtpe</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</div>
<div class="col-sm-10">
<h3> Mes evenements</h3>
<?php foreach ($event as $valeur) { ?>
        <ol class="list-group list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo $valeur ['titre'] ?></div>
                        Créer par :
                </div>
                <div class="me-4"><?php echo $valeur ['visibilite'] ?></div>
                <div class="me-4">
                    <?php echo $valeur ["date_debut"] ?>
                </div>
                <div class="me-4">
                    <button>Bouton S'inscrire</button>
                </div>
                <span class="badge text-bg-primary rounded-pill me-4">/ 14</span>
                <div>
                    <i class="fa-solid fa-circle-info" data-bs-toogle="tooltip" data-bs-title="c'est un test" ></i>
                </div>
            </li>
        </ol> 
        <?php } ?>


  </div>
</div>