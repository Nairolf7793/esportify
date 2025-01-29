<?php
require_once "templates/header.php"
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



<?php
require_once 'templates/footer.php';
?>