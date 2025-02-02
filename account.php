<?php
require_once "templates/header.php";
require_once "config/function_event.php";

$events = getEvents($pdo);

if (isset($_GET['action']) && isset($_GET['id'])) {
    if($_GET['action'] === 'okEvents') {
    $res = updateEvents($pdo, (int)$_GET['id']);
}
if($_GET['action'] === 'deleteEvents') {
    $res = deleteEvents($pdo, (int)$_GET['id']);
    header('location:account.php');
}
}

?>

<div class=" d-flex">
    <?php
    require_once "templates/header_account.php";
    ?>

    <table class="table">
        <?php foreach ($events as $event) { ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $event['titre'] ?></th>
                    <td><?php echo $event['description'] ?></td>
                    <td class="d flex">
                        
                        <a class="btn btn-primary" href="?action=okEvents&id=<?=$event['id'] ?>">Valider</a>
                        <a class="btn btn-primary" href="?action=deleteEvents&id=<?=$event['id'] ?>">Supprimer</a>
       
                    </td>
                </tr>
            <?php } ?>
            </tbody>
    </table>
</div>

<?php
require_once "templates/footer.php";
?>