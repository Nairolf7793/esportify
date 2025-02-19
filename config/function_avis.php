<?php
require_once "pdo.php";

    function addAvis (PDO $pdo, string $avis_commentaire, int $note){
        $query = $pdo->prepare('INSERT INTO avis (avis_commentaire,note)
        VALUES (:avis_commentaire, :note)');
        $query ->bindParam(":avis_commentaire", $avis_commentaire, PDO::PARAM_STR);
        $query ->bindParam(":note", $note, PDO::PARAM_INT);

        return $query->execute();
    }


function getAvis(PDO $pdo){
    $query = $pdo->prepare("SELECT * FROM avis");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}