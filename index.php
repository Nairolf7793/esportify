<?php
require_once "templates/header.php";
require_once "config/function_event.php";
$events = getEvents($pdo);
?>

<h1>Bienvenue chez Esportify</h1>

<div class="class_test d-flex justify-content-around ">
    <div id="carouselExampleRide" class="carousel slide w-100 " data-bs-ride="true">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/manette.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Des parties endiablées</h5>
                    <p>E-Sportify est le point de rendez vous pour vos soirées de folies</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/enfant.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Une communauté de tout age</h5>
                    <p>Rejoignez nos erveurs à partir de 12ans</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/console.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Gagnez la dernière console de Bingcrosoft</h5>
                    <p>Participez à un evenement pour accéder au tirage aux sort</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<section class="dernier event">
<div class="row my-5">
    <div class="d-flex justify-content-between mb-1">
       <h2>Event en cours</h2>
       <a href="events.php" class="btn btn-primary">Voir tout</a>
    </div>
    <?php foreach ($events as $event) {
        include "templates/events_part.php";
    };
    ?>
</div>

<div class="row my-5">
<div class="d-flex justify-content-between mb-1">
       <h2>Derniers events crées</h2>
       <a href="events.php" class="btn btn-primary">Voir tout</a>
    </div>
    <?php foreach ($events as $event) {
        include "templates/events_part.php";
    };
    ?>
</div>
</section>
<?php
require_once 'templates/footer.php';
?>