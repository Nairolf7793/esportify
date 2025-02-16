<?php require_once "../templates/header.php";

?>
<h1>Contact</h1>
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
        <textarea class="form-control" cols="30" rows="5" name="commentaire" id="" placeholder="Autre demande"></textarea>
    </div>
    <input class="btn btn-primary mt-3" type="submit" value="Envoie de la demande"></input>
</form>

<?php require_once "../templates/footer.php";
?>