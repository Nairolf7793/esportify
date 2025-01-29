<?php
require_once "templates/header.php";
require_once "config/function_event.php";

if (isset($_POST["addEvents"])) {
    $add = getEvents($pdo, $_POST["titre"],$_POST["description"],$_POST["nb_joueur"],$_POST["date_debut"],$_POST["heure_debut"],$_POST["date_fin"],$_POST["heure_fin"]);
}

    ?>
<form method="post">
    <div class="mb-3">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" class="form-control">
    </div>
    <div class="mb-3">
        <label for="description">Description :</label>
        <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="nb_joueur">Nombre de joueurs :</label>
        <input type="number" name="nb_joueur" id="nb_joueur" class="form-control" min="1">
    </div>
    <div class="mb-3 d-flex gap-2">
        <div>
            <label for="date_debut">date du début :</label>
            <input type="date" name="date_debut" id="date_debut" class="form-control" min="1">
        </div>
        <div>
            <label for="heure_debut">heure du début :</label>
            <input type="time" name="heure_debut" id="heure_debut" class="form-control" min="1">
        </div>
        <div>
            <label for="date_fin">date de fin :</label>
            <input type="date" name="date_fin" id="date_fin" class="form-control" min="1">
        </div>
        <div>
            <label for="heure_fin">Heure de fin :</label>
            <input type="time" name="heure_fin" id="heure_fin" class="form-control" min="1">
        </div>
    </div>
    <input type="submit" class="btn btn-primary" name="addEvents" value="Enregistrer">
</form>


<?php
require_once "templates/footer.php";
?>