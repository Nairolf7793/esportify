<?php 
require_once "pdo.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
function getEvents (PDO $pdo, string $titre, string $description, int $nb_joueur, string $date_debut, string $heure_debut, string $date_fin, string $heure_fin){
    $query = $pdo->prepare("INSERT INTO event (titre, description, nb_joueur, date_debut, heure_debut, date_fin, heure_fin)
                            VALUES (:titre, :description, :nb_joueur, :date_debut, :heure_debut, :date_fin, :heure_fin)");

    $query -> bindParam(":titre", $titre, PDO::PARAM_STR);
    $query -> bindParam(":description", $description, PDO::PARAM_STR);
    $query -> bindParam(":nb_joueur", $nb_joueur, PDO::PARAM_INT);
    $query -> bindParam(":date_debut", $date_debut, PDO::PARAM_STR);
    $query -> bindParam(":heure_debut", $heure_debut, PDO::PARAM_STR);
    $query -> bindParam(":date_fin", $date_fin, PDO::PARAM_STR);
    $query -> bindParam(":heure_fin", $heure_fin, PDO::PARAM_STR);

    return $query->execute();
}
}