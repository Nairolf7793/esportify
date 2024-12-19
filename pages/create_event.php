<h1 class="text-center">Crée ton event</h1>
<div class="container ">
<div class="mb-3">
  <label for="titre" class="form-label">Titre</label>
  <input type="text" class="form-control" id="titre">
</div>
<div class="mb-3">
  <label for="description" class="form-label">description</label>
  <textarea class="form-control" id="description" rows="3"></textarea>
</div>
<div class="mb-3">
  <label for="nb_joueur" class="form-label">Nombre de joueur</label>
  <input type="number" class="form-control" id="nb_joueur" min=2 max=14 placeholder="minimum deux joueurs et maximum 14 joueurs">
</div>

<div class="mb-3 ">
    <div class="d-flex justify-content-between ">
        <div class="d-flex align-items-center me-2">
            <label for="date_debut" class="form-label me-3">Date du début</label>
            <input type="date" class="form-control" id="date_debut" min=2 max=14 placeholder="minimum deux joueurs et maximum 14 joueurs">
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <label for="heure_debut" class="form-label me-3">Heure du début</label>
            <input type="time" class="form-control" id="heure_debut">
        </div>
    </div>
<div class="mb-3">
    <div class="d-flex justify-content-between">
        <div class="d-flex align-items-center me-2">
            <label for="date_fin" class="form-label me-3">Date de fin</label>
            <input type="date" class="form-control" id="date_fin" min=2 max=14 placeholder="minimum deux joueurs et maximum 14 joueurs">
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <label for="heure_fin" class="form-label me-3">Heure de fin</label>
            <input type="time" class="form-control" id="heure_fin">
        </div>
    </div>

</div>
</div>