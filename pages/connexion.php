<?php
    $message ='';
    if (isset($_GET['message']) && $_GET['message'] === 'success'){
        $message = 'vous etes bien inscrit, vous pouvez vous connecter';
    }
    ?>



<!-- afficher le message success inscription -->

    <!--fin du commentaire -->



<div class="container d-flex flex-column">

<?php if (!empty($message)): ?>
    <div class="text-center">
        <?php echo htmlspecialchars($message); ?>
    </div>
<?php endif; ?>

    <div class="flex-column bg-danger m-4">
        <h1 class="text-center">Connexion</h1>
        <form>
            <div class="mb-3 p-2">
                <label for="pseudoConnexion" class="form-label">Pseudo</label>
                <input type="text" class="form-control" id="pseudoConnexion">
            </div>
            <div class="mb-3 p-2">
                <label for="passwordConnexion" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordConnexion">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mb-2">Se connecter</button>
            </div>
        </form>
    </div> 

    <div class="flex-column bg-success m-4">
        <h1 class="text-center">Inscription</h1>
        <form action = "../auth/inscriptionDb.php" method = "POST">
            <div class="mb-3 p-2">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo">
            </div>
            <div class="mb-3 p-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <div class="invalid-feedback">
                    Votre mot de passe doit comporter une majuscule, une minuscule, un caractère spécial, un chiffre et au mois 8 caractères.
                </div>
            </div>
            <div class="mb-3 p-2">
                <label for="passwordValidation" class="form-label">Valider le password</label>
                <input type="password" class="form-control" id="passwordValidation">
                <div class="invalid-feedback">
                    Vos mots de passe ne sont pas équivalents
                </div>
            </div>
            <div class="mb-3 p-2">
                <label for="mail" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="mail" name="mail">
            </div>
            <div class="mb-3 p-2">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" min="1">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mb-2" id="btn-validate">S'inscrire</button>
            </div>
        </form>
    </div>
</div>