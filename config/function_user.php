<?php
require_once 'pdo.php';

//fonction pour insérer user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function addUser(PDO $pdo, string $pseudo, string $password, string $mail, int $age)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = $pdo->prepare('INSERT INTO user (pseudo, password, mail, age) VALUES (:pseudo,:password, :mail,:age)');

        $query->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':mail', $mail, PDO::PARAM_STR);
        $query->bindParam(':age', $age, PDO::PARAM_INT);

        return $query->execute();
    }
}

//function pour vérifier si tous les champs sont remplis

function verifyUser($user): array|bool {
    $errors = [];
    if (isset($user ["pseudo"])) {
        if($user ["pseudo"] === ""){
            $errors ["pseudo"] = "Le champs pseudo est obligatoire";
        }
    }

    if (isset($user ["password"])) {
        if(strlen ($user ["password"]) <6){
            $errors ["password"] = "Le mot de passe doit faire au moins 6 caractères";
        }
    }

    if (isset($user ["mail"])) {
        if($user ["mail"] === ""){
            $errors ["mail"] = "Le champs email est obligatoire";
        } else {
            if (!filter_var($user["mail"], FILTER_VALIDATE_EMAIL)) {
                $errors ['mail'] = "Le champs de l'email n'est pas respecté"; //double verif de l'email, front + back
            }
        }
        }  else {
            $errors ['mail'] = "le champs email comporte une erreur";
    }
    if (count($errors)) {
        return $errors;

    } else {
        return true;
    }
}

function verifyUserLoginPassword(PDO $pdo, string $pseudo, string $password) {
    $query = $pdo ->prepare('SELECT id, pseudo, password, role FROM user WHERE pseudo = :pseudo');
    $query->bindParam(":pseudo", $pseudo);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        return $user;
    } else {
        return false;
    }
}
