<?php
require_once '../db/DbConnexion.php';
require_once '../db/session.php';

$id_joueur = $_SESSION['user_id']; // Récupérer l'ID utilisateur depuis la session
$pdo = DbConnection::getPdo();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $nb_joueur = $_POST ['nb_joueur'];
    $date_debut = $_POST['date_debut'];
    $heure_debut = $_POST['heure_debut'];
    $date_fin = $_POST['date_fin'];
    $heure_fin = $_POST['heure_fin'];

    $query=DbConnection::getPdo()->prepare('INSERT INTO event(titre,description,nb_joueur,date_debut,heure_debut,date_fin,heure_fin, id_joueur)
    VALUES (
    :titre,
    :description,
    :nb_joueur,
    :date_debut,
    :heure_debut,
    :date_fin,
    :heure_fin,
    :id_joueur
    )
    ');
}

$query->bindParam(':titre', $titre);
$query->bindParam(':description', $description);
$query->bindParam(':nb_joueur', $nb_joueur);
$query->bindParam(':date_debut', $date_debut);
$query->bindParam(':heure_debut', $heure_debut);
$query->bindParam(':date_fin', $date_fin);
$query->bindParam(':heure_fin', $heure_fin);
$query->bindParam(':id_joueur', $id_joueur, PDO::PARAM_INT);

if (!$query->execute()){
    echo 'une erreur est survenue';
} else {
    header('location: /create_event');
    exit();
}

?>