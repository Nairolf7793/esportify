<?php 
require_once "pdo.php";

$errors = [];
$messages = [];
//fonction pour ajouter un event
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

//fonction pour vérifier que les champs sont bien remplis
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

//fonction pour filtrer les events
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

//fonction pour recuperer l'id de l'envent
function getEventsById(PDO $pdo, int $id) {
    $query = $pdo->prepare('SELECT * FROM event WHERE id=:id');
    $query->bindParam (":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();

}

//fonction pour valider un event (change la visibilité "en_att" à "oui")

function updateEvents(PDO $pdo, int $id)
{
    $query = $pdo->prepare('UPDATE event SET visibilite="oui" WHERE visibilite = "en_att" AND id = :id ');
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    return $query->execute();
}

//fonction pour supprimer un event
function deleteEvents(PDO $pdo, int $id)
{
    $query = $pdo->prepare('DELETE FROM event WHERE id_event = :id ');
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    return $query->execute();
}

//fonction pour s'inscrire à un event
function inscrireJoueur(PDO $pdo, $id_event, $id_joueur) {
    
    $query = $pdo->prepare('SELECT nb_joueur FROM event WHERE id = :id_event');
    $query->execute([':id_event' => $id_event]);
    $event = $query->fetch(PDO::FETCH_ASSOC);

    if (!$event) {
        return 'Événement introuvable.';
    }

    if ($event['nb_joueur'] <= 0) {
        return 'Plus de places disponibles.';
    }

   // Vérifier si le joueur est déjà inscrit
   $query = $pdo->prepare('SELECT * FROM inscription WHERE id_event = :id_event AND id_joueur = :id_joueur');
   $query->execute([':id_event' => $id_event, ':id_joueur' => $id_joueur]);

   if ($query->fetch()) {
    return 'vous etes deja inscrit';
   
   }

   // Ajouter l'inscription
   $query = $pdo->prepare('INSERT INTO inscription (id_event, id_joueur) VALUES (:id_event, :id_joueur)');
   $query->execute([':id_event' => $id_event, ':id_joueur' => $id_joueur]);

   // Déduire une place de l'événement
   $query = $pdo->prepare('UPDATE event SET nb_joueur = nb_joueur - 1 WHERE id = :id_event');
   $query->execute([':id_event' => $id_event]);

   return 'Inscription réussie.';
}

// Traitement de l'inscription
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_event'])) {
   $id_event = $_POST['id_event'];

   $id_joueur = $_SESSION['user']['id']; // Récupérer l'ID de l'utilisateur connecté
   $message = inscrireJoueur($pdo, $id_event, $id_joueur);

   // Rediriger ou afficher un message
   if ($message === 'Inscription réussie.') {
     
   } else {
       
   }
}

// fonction pour valider une inscription de joueur à un event
function updateInscription(PDO $pdo, int $id)
{
    $query = $pdo->prepare('UPDATE inscription SET statut="oui" WHERE statut = "en_att" AND id_event = :id ');
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    return $query->execute();
}

//fonction pour supprimer une inscription de joueur
function deleteInscription(PDO $pdo, int $id)
{
    $query = $pdo->prepare('DELETE FROM inscription WHERE id_event = :id ');
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    return $query->execute();
}

//fonction pour afficher les inscriptions du joueur
function fetchInscriptionsByUser(PDO $pdo, $id_joueur) {
    $query = $pdo->prepare('SELECT event.*, inscription.statut FROM event JOIN inscription ON event.id = inscription.id_event  WHERE inscription.id_joueur = :id_joueur' );
    $query->bindParam (":id_joueur", $id_joueur);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
?>