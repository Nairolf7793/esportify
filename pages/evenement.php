<?php 
require_once "../db/DbConnexion.php";

$query = DbConnection::getPdo()->query('SELECT event.*, user.pseudo FROM event JOIN user ON event.id_joueur = user.id WHERE event.visibilite="valid"');
$event = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="container">
    <h1 class="text-center mt-4">Bienvenue à evenement</h1>
    <p>"Prêt à plonger dans l'aventure ? Rejoins notre communauté de gamers et trouve la partie qui te correspond. Des soirées thématiques aux tournois épiques, 
        il y en a pour tous les goûts !" </p>
    <div class="d-flex justify-content-center mt-4 gap-5">
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Ton événement, tes règles</h5>
                <p class="card-text">Crée ton événement et invite tes contacts.</p>
                <a href="#" class="btn btn-primary mt-auto">Créer ton évenement</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Plonge au cœur de l'action</h5>
                <p class="card-text">Rejoins une partie en cours et rencontre de nouveaux joueurs.</p>
                <a href="#" class="btn btn-primary mt-auto">Voir les parties en cours</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Un monde d'événements à portée de clic </h5>
                <p class="card-text">Explore des milliers d'événements organisés par notre communauté.</p>
                <a href="#" class="btn btn-primary mt-auto">S'inscrire</a>
            </div>
        </div>
    </div>
</section>
            
<section class="container mt-4">
    <h2 class="text-center">Evenement en cours</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($event as $valeur) { ?>
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $valeur['titre'] ?></h5>
                    <p class="card-text"><?php echo $valeur ['description'] ?></p>
                </div>
                <div class="card-footer bg-tertiary">
                    <small class="text-body-secondary bg-success"><?php echo $valeur ['date_debut'] ?></small>
                </div>
            </div>
        </div>
        <?php } ?>
</section>

<section class="container inscription">   
    <h2 id="inscription" class="text-center mt-4">Inscrit toi à l'evenement de ton choix</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($event as $valeur) { ?>
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Crée par : <?php echo $valeur ['pseudo'] ?></p>
                    <h5 class="card-title"><?php echo $valeur['titre'] ?></h5>
                    <small class="text-body-secondary"><?php echo $valeur ['description'] ?></small>  
                </div>
                <div class="card-footer bg-tertiary">
                    <small class="text-body-secondary">
                        <ul>
                            <li>Débute le <?php echo $valeur ['date_debut'] . ' à ' . $valeur['heure_debut'] ?> </li>
                            <li>Termine le <?php echo $valeur ['date_fin'] . ' à ' . $valeur['heure_fin'] ?> </li>
                        </ul>
                    </small>
                </div>
                <div class="card-footer bg-tertiary">
                    <span class="badge text-bg-primary rounded-pill me-4">/ 14</span>
                </div>
            </div>
        </div>
        <?php } ?>
</section>


