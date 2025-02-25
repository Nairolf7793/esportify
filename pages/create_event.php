<?php
require_once "../templates/header.php";
require_once "../config/function_event.php";

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $verifEvent = verifyEvent($_POST);
    if ($verifEvent === true) {
        $Add = addEvents($pdo, $_POST["titre"], $_POST['description'], $_POST["nb_joueur"], $_POST["date_debut"],$_POST["heure_debut"],$_POST["date_fin"],$_POST["heure_fin"]);
        header ("location: ../pages/events.php");
    } else {
        $errors = $verifEvent;
    }

    if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] !='') {
        $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if ($checkImage !== false) {
            $fileName = uniqid().'-'.$_FILES['file']['tmp_name']; //-< fonction pour renommer le nom de l'image, evite que pluisuers personne mettent le même nom, ajoute un numéro
            move_uploaded_file($_FILES['file']['tmp_name'], _EVENTS_IMG_PATH_.$_FILES['file']['tmp_name']); // -< fonction pour bouger l'image vers le dossier upload image
        } else {
            $errors[] = 'le fichier n\'est pas une image';
        }
    }
}
?>

<form method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" class="form-control">
        <?php if (isset($errors['titre'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errors["titre"] ?>
            </div>
        <?php } ?>
    </div>
    <div class="mb-3">
        <label for="description">Description :</label>
        <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
        <?php if (isset($errors['description'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errors["description"] ?>
            </div>
        <?php } ?>
    </div>
    <div class="mb-3">
        <label for="nb_joueur">Nombre de joueurs :</label>
        <input type="number" name="nb_joueur" id="nb_joueur" class="form-control" min="1" max="6">
        <?php if (isset($errors['nb_joueur'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errors["nb_joueur"] ?>
            </div>
        <?php } ?>
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
    <div class="mb-3">
        <label for= "file" class="form-label">Image</label>
        <input type="file" name="file" id="file">
    </div>
    <input type="submit" class="btn btn-primary" name="addEvents" value="Enregistrer">
</form>

<?php
require_once "../templates/footer.php";
?>