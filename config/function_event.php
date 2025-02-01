<?php 
require_once "pdo.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
function addEvents (PDO $pdo, string $titre, string $description, int $nb_joueur, string $date_debut, string $heure_debut, string $date_fin, string $heure_fin){
    $id_joueur = $_SESSION['user']['id'];
    $query = $pdo->prepare("INSERT INTO event (titre, description, nb_joueur, date_debut, heure_debut, date_fin, heure_fin, id_joueur)
                            VALUES (:titre, :description, :nb_joueur, :date_debut, :heure_debut, :date_fin, :heure_fin, :id_joueur)");
    $query -> bindParam(":titre", $titre, PDO::PARAM_STR);
    $query -> bindParam(":description", $description, PDO::PARAM_STR);
    $query -> bindParam(":nb_joueur", $nb_joueur, PDO::PARAM_INT);
    $query -> bindParam(":date_debut", $date_debut, PDO::PARAM_STR);
    $query -> bindParam(":heure_debut", $heure_debut, PDO::PARAM_STR);
    $query -> bindParam(":date_fin", $date_fin, PDO::PARAM_STR);
    $query -> bindParam(":heure_fin", $heure_fin, PDO::PARAM_STR);
    $query -> bindParam(":id_joueur", $id_joueur, PDO::PARAM_INT);

    return $query->execute();
}
}

function verifyEvent($event): array|bool {
    $errors = [];
    if (isset($event ["titre"])) {
        if($event ["titre"] === ""){
            $errors ["titre"] = "Le champs titre est obligatoire";
        }
    }

    if (isset($event ["description"])) {
        if(strlen ($event ["description"]) <6){
            $errors ["description"] = "La description est trop courte";
        }
    }

    if (isset($event ["nb_joueur"])) {
        if($event ["nb_joueur"]< 1 || $event ["nb_joueur"] > 6 ){
            $errors ["nb_joueur"] = "La nombre de joueur doit être compris entre 1 et 6";
        }
    }
    if (count($errors)) {
        return $errors;

    } else {
        return true;
    }
}

function getEvents (PDO $pdo, array $filters = []) :array {
    $orderBy = "event.id DESC";
    $relevance = "";
    $conditions = [];
    if (isset($filters["search"])) {
        $match = "MATCH(titre) AGAINST(:search)";
        $conditions[] = $match;
        $relevance =", $match as relevance";
        $orderBy = "relevance DESC";

    }
    $where = $conditions ? " WHERE " . implode(" AND ", $conditions) : "";
    $query = $pdo->prepare("SELECT * $relevance FROM event $where");
    if (isset($filters["search"])) {
        $query->bindValue(":search", "%{$filters["search"]}%");
    }
    $query->execute();
    return $query->fetchAll();
}

function getEventsById(PDO $pdo, int $id) {
    $query = $pdo->prepare('SELECT * FROM event WHERE id=:id');
    $query->bindParam (":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();

}
