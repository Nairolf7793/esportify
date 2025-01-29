<?php 
require_once "templates/header.php";
?>

<a href = "create_event.php">Creer ton event</a>
<div class="col-md-3 mb-5">
    <form action="" method="get">
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
    </form>
</div>

<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="..." class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>

<?php 
require_once "templates/footer.php";
?>