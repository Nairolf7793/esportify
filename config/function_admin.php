<?php require_once "pdo.php";

function adminListInscription(PDO $pdo){
    $query = $pdo->prepare('SELECT * FROM user');
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function adminUpdateOrga ($pdo, int $id) {
    $query = $pdo->prepare('UPDATE user SET role="organisateur" WHERE role="joueur" AND id=:id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    return $query->execute();
 
}

function adminUpdateJoueur ($pdo, int $id) {
    $query = $pdo->prepare('UPDATE user SET role="joueur" WHERE role="organisateur" AND id=:id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    return $query->execute();
 
}
?>
