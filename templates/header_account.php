<div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <h2 class="fs-4">Menu mon espace</h2>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="../account.php" class="nav-link">Mes events</a>
        </li>
        <li>
            <a href="../create_event.php" class="nav-link">Créer un événement</a>
        </li>
        <li>
            <a href="#" class="nav-link">Historique des événements</a>
        </li>
        <li>
            <a href="#" class="nav-link">Voir mes scores</a>
        </li>
        <li>
            <a href="#" class="nav-link">Modifier mon compte</a>
        </li>
        <li>
            <h3>ADMIN</h3>
        </li>
        <?php 
        if ($_SESSION["user"]["role"] == "admin"): 
            ?>
       
        <li>
            <a href="../admin_event.php" class="nav-link">Valider les événements</a>
        </li>
        <li>
            <a href="../admin_inscription.php" class="nav-link">Valider les inscriptions</a>
        </li>
        <li>
            <a href="../admin_user.php" class="nav-link">Modifier un compte utilisateurs</a>
        </li>
        <?php endif; ?>
    </ul>
</div>