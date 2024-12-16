<div class="container d-flex justify-content-around p-5">

    <!--<div class="flex-column bg-danger">
        <h1 class="text-center">Connexion</h1>
        <form>
            <div class="mb-3">
                <label for="pseudoConnexion" class="form-label">Pseudo</label>
                <input type="text" class="form-control" id="pseudoConnexion">
            </div>
            <div class="mb-3">
                <label for="passwordConnexion" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordConnexion">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div> -->

    <div class="flex-column bg-success">
        <h1 class="text-center">Inscription</h1>
        <form>
            <div class="mb-3">
                <label for="pseudoInscription" class="form-label">Pseudo</label>
                <input type="text" class="form-control" id="pseudoInscription">
            </div>
            <div class="mb-3">
                <label for="passwordInscription" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInscription">
                <div class="invalid-feedback">
                    Votre mot de passe doit comporter une majuscule, une minuscule, un caractère spécial, un chiffre et au mois 8 caractères.
                </div>
            </div>
            <div class="mb-3">
                <label for="passwordValidationOk" class="form-label">Valider le password</label>
                <input type="password" class="form-control" id="passwordValidationOk">
                <div class="invalid-feedback">
                    Vos mots de passe ne sont pas équivalents
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </div>
        </form>
    </div>
</div>