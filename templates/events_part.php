<div class="col-md-4">
    <div class="card">
        <img src="<?php echo getEventImage($event['chemin_image']) ?>" class="d-block mx-lg-auto img-fluid" alt="Thèmes Bootstrap" width="200" height="200" loading="lazy">
        <div class="card-body">
            <h5 class="card-title"><?php echo $event['titre'] ?></h5>
            <p class="card-text"><?php echo $event['description'] ?></p>
            <div class="d-flex flex-row gap-2">
                <a href="../pages/event.php?id=<?php echo $event['id'] ?>" class="btn btn-primary">Voir en detail</a>
            </div>
        </div>
    </div>
</div>