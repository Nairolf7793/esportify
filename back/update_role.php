<?php
require_once '../db/DbConnexion.php';
require_once '../db/session.php';


// Activez les erreurs PDO pour capturer les problèmes SQL
$pdo = DbConnection::getPdo();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Vérifiez si l'utilisateur est connecté et admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    echo('Accès interdit.');
    exit ();
}

// Vérifiez que les données POST sont présentes
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id']) && isset($_POST['new_role'])) {
    $userId = intval($_POST['user_id']);
    $newRole = $_POST['new_role'];

    // Vérifiez que le rôle est valide
    $validRoles = ['joueur', 'organisateur', 'administrateur'];
    if (!in_array($newRole, $validRoles)) {
        die('Rôle invalide.');
    }

    // Mise à jour dans la base de données
    $pdo = DbConnection::getPdo();
    $query = $pdo->prepare('UPDATE user SET role = :role WHERE id = :id');
    $query->bindParam(':role', $newRole, PDO::PARAM_STR);
    $query->bindParam(':id', $userId, PDO::PARAM_INT);

    if ($query->execute()) {
        header('Location: /liste_joueur');
        exit();
    } else {
        echo 'Erreur lors de la mise à jour du rôle.';
    }

}
?>