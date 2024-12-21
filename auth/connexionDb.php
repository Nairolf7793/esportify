<?php
require_once "../db/DbConnexion.php";
require_once "../db/session.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!$_POST['pseudo'] || !$_POST['password']) {
        header('location: /connexion?error=missing_fields');
    } else {

        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];

        $db = DbConnection::getPdo();

        $sql = ('SELECT * FROM user WHERE pseudo = :pseudo'); //requete stockée dans variable
        $query = $db->prepare($sql);
        $query->bindParam(':pseudo', $pseudo);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        if(!$user){
            header('location: /connexion?error=invalid_user');
            exit();

        } else {
           $passwordOk = password_verify($password, $user['password']);

           if (!$passwordOk) {
            header('location: /connexion?error=invalid_password');
            exit();

           } else {
            $_SESSION["user"] = $user; // Stocke l'utilisateur complet
            $_SESSION["user_id"] = $user['id']; // Stocke l'ID utilisateur
            header('location: /');
            exit();
           }
        }
    }
}
?>