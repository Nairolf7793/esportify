<div class="col-md-4">
    <div class="card">
        <img src="" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $event['titre'] ?></h5>
            <p class="card-text"><?php echo $event['description'] ?></p>
            <div class="d-flex flex-row gap-2">
              <a href="event.php?id=<?php echo $event['id']?>" class="btn btn-primary">Voir en detail</a>
                <a href="" class="btn btn-primary">S'inscrire</a>
                <a href="" class="btn btn-primary">Rejoindre</a>
            </div>
        </div>
    </div>
</div>
 