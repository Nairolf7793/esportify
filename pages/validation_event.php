<?php

require_once "../db/DbConnexion.php";
$pdo = DbConnection::getPdo();

$query = $pdo->query ('SELECT * FROM event WHERE visibilite ="en_att"');
$events = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<h1> valider l'event</h1>
<?php foreach ($events as $event){ ?>
    <p>Titre : <?php echo ($event['titre']); ?></p>
    <a href="../back/ok_event.php?id=<?php echo $event['id']; ?>">Valider</a> |
    <a href="../back/delete_event.php?id=<?php echo $event['id']; ?>">Supprimer</a>
<?php } ?>