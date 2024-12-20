<?php 
require_once "../db/DbConnexion.php";

$query = DbConnection::getPdo()->query('SELECT * FROM event WHERE visibilite="valid"');
$event = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- section pour acces page validation event -->
 
<section class="container evenemnt">
    <h1 class="text-center">Bienvenue à evenement</h1>
        <p>"Prêt à plonger dans l'aventure ? Rejoins notre communauté de gamers et trouve la partie qui te correspond. Des soirées thématiques aux tournois épiques, 
        il y en a pour tous les goûts !" </p>
            <ul>
                <li>Crée ton événement et invite tes contacts.<button class="ms-2"><a href ="/create_event">Créer ton evenement</a></button></li>
                <li>Rejoins une partie en cours et rencontre de nouveaux joueurs.<button class="ms-2">Voir les parties en cours</button></li>
                <li>Explore des milliers d'événements organisés par notre communauté.<button class="ms-2"><a href="#inscription">S'inscrire à un evenement</a></button></li>
            </ul>

    <?php foreach ($event as $valeur) { ?>
    <h2 class="text-center">Evenement en cours</h2>
    <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="ms-2 me-auto">
                <div class="fw-bold">evenement 1</div>
                Créer par :
            </div>
            <div class="me-4">
                heure, date.
            </div>
            <div class="me-4">
                <button>Bouton rejoindre</button>
            </div>
            <span class="badge text-bg-primary rounded-pill me-4">/ 14</span>
            <div>
                i
            </div>
        </li>
    </ol>

    <h2 id="inscription" class="text-center">Inscrit toi à l'evenement de ton choix</h2>

        <ol class="list-group list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo $valeur ['titre'] ?></div>
                        Créer par :
                </div>
                <div class="me-4">
                    <?php echo $valeur ["date_debut"] ?>
                </div>
                <div class="me-4">
                    <button>Bouton S'inscrire</button>
                </div>
                <span class="badge text-bg-primary rounded-pill me-4">/ 14</span>
                <div>
                    <i class="fa-solid fa-circle-info" data-bs-toogle="tooltip" data-bs-title="c'est un test" ></i>
                </div>
            </li>
        </ol> 
        <?php } ?>
</section>
