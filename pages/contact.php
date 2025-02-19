<?php require_once "../templates/header.php";
require_once "../config/function_avis.php";
$avis = getAvis($pdo);
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $addAvis = addAvis($pdo, $_POST["avis_commentaire"], $_POST['note']);
    header ("location: ../pages/contact.php");
}
?>

<h3>Formulaire de contact</h3>
<form method="post">
    <div class="">
        <label for="Nom"></label>
        <input type="text" name="nom" id="nom" class="form-control" placeholder="Votre nom">
    </div>
    <div class="">
        <label for="Prenom"></label>
        <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Votre prénom">
    </div>
    <div class="mt-1">
        <label for="mail"></label>
        <input type="mail" name="mail" id="mail" class="form-control" placeholder="Votre mail">
    </div>
    <div class="mt-3">
        <textarea class="form-control" cols="30" rows="5" name="commentaire" id="" placeholder="Votre demande"></textarea>
    </div>
    <input class="btn btn-primary mt-3" type="submit" value="Envoie de la demande"></input>
</form>



<h3 class="mt-5 text-center">Votre avis</h3>
<form method="POST">
    <div class="text-center">
        <textarea name="avis_commentaire" id="avis_commentaire" cols="100" rows="10" placeholder="Votre avis" required></textarea>
    </div>
    <div class="stars text-center m-4">
        <i class="fa-regular fa-star interactive-star fs-1" data-value="1"></i><i class="fa-regular fa-star interactive-star fs-1" data-value="2"></i><i class="fa-regular fa-star interactive-star fs-1" data-value="3"></i><i class="fa-regular fa-star interactive-star fs-1" data-value="4"></i><i class="fa-regular fa-star interactive-star fs-1" data-value="5"></i>
        <input type="hidden" name="note" id="note" value="0">
    </div>
    <div class="text-center m-2">
        <input type="submit" class="btn btn-primary btn-lg" Value="Valider"></input>
    </div>
</form>
<section class="card">
    <div class="row row-cols-1 row-cols-3 g-4 m-4">
        <?php foreach ($avis as $valeur) { ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text"><?php echo $valeur['avis_commentaire'] ?></p>
                        <div class="stars">
                            <?php
                            // Affichage des étoiles dynamiques
                            $note = $valeur['note']; // Récupère la note du commentaire
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $note) {
                                    // Étoile remplie
                                    echo '<i class="fa-solid fa-star" style="color: yellow;"></i>';
                                } else {
                                    // Étoile vide
                                    echo '<i class="fa-regular fa-star" style="color: black;"></i>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<!-- recuperation de la moyenne des notes -->
<?php
$totalNotes = 0;
$nombreAvis = count($avis);

if ($nombreAvis > 0) {
    foreach ($avis as $valeur) {
        $totalNotes += $valeur['note'];
    }
    $moyenneNotes = $totalNotes / $nombreAvis; // Calcul de la moyenne
} else {
    $moyenneNotes = 0; // Pas de notes
}
?>

<div class="average-rating">
    <h2>Moyenne des notes</h2>
    <div class="stars">
        <?php
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= floor($moyenneNotes)) {
                echo '<i class="fa-solid fa-star" style="color: yellow;"></i>'; // Étoile remplie
            } elseif ($i - $moyenneNotes < 1 && $i > $moyenneNotes) {
                echo '<i class="fa-solid fa-star-half-stroke" style="color: yellow;"></i>'; // Demi-étoile
            } else {
                echo '<i class="fa-regular fa-star" style="color: black;"></i>'; // Étoile vide
            }
        }
        ?>
    </div>
    <p><?php echo number_format($moyenneNotes, 1); ?>/5</p> <!-- Affiche la moyenne avec 1 chiffre après la virgule -->
</div>

<?php require_once "../templates/footer.php";
?>