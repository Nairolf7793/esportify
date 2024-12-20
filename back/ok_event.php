<?php 
//fonction pour valider l'ajout d'un element au catalogue par l'admin

require_once '../db/DbConnexion.php';
require_once '../db/session.php';
$pdo = DbConnection::getPdo();

//Vérifiez si l'utilisateur est administrateur
if (!isset($_SESSION["user"]) || $_SESSION["user"]["role"] != "admin") {
  echo "Accès interdit.";
    exit();
}

// Récupérez l'ID du jeu
$id = $_GET['id'] ?? null;

if ($id) {
    $query = $pdo->prepare('UPDATE event SET visibilite = "valid" WHERE id = :id');
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    header('location: /account');
    exit();
}

?>