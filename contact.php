<?php require_once "templates/header.php";
$retour = mail("jose.esportify@outlook.fr", "essai","hello world","From:nairolf7793@yahoo.com");
if($retour) {
    echo "l'eamil a bien été encoyé";
}
?>

<h1>Contact</h1>
<form method="post">
    <div class="">
        <label for="pseudo"></label>
        <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Votre pseudo">
    </div>
    <div class="mt-1">
        <label for="mail"></label>
        <input type="mail" name="mail" id="mail" class="form-control" placeholder="Votre mail">
    </div>
    <div class="mt-1">
        <label for="pseudo"></label>
        <select class="form-select form-select-sm" aria-label="Small select example">
            <option selected>Demande de changement de role</option>
            <option value="1">Joueur</option>
            <option value="2">Organisateur</option>
        </select>
    </div>
    <div class="mt-3">
        <textarea class="form-control" cols="30" rows="5" name="commentaire" id="" placeholder="Autre demande"></textarea>
    </div>
    <input class="btn btn-primary mt-3" type="submit">Envoie</input>
</form>

<?php require_once "templates/footer.php";
?>