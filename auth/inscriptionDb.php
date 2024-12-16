<?php

require_once '../db/DbConnexion.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        $hash=password_hash($password, PASSWORD_BCRYPT);
        $mail = $_POST['mail'];
        $age = $_POST['age'];

        $query = DbConnection::getPdo()->prepare('INSERT INTO user (pseudo, password, mail, age)
        VALUES (
        :pseudo,
        :password,
        :mail,
        :age)
        ');

        $query->bindParam(':pseudo', $pseudo);
        $query->bindParam(':password', $hash);
        $query->bindParam(':mail', $mail);
        $query->bindParam('age', $age);
        if (!$query->execute()){
            echo 'une erreur est survenue';
        }
        else {
            header('location: /');
            exit ();
            
        }

    }

?>