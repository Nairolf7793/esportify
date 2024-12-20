<?php 
require_once '../db/DbConnexion.php';
require_once '../db/session.php';

$pdo = DbConnection::getPdo();
$query = $pdo->query('SELECT pseudo,age,mail,role FROM user');
$user = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">
    <h2>Liste joueur</h2>
    <table class="table text-start">
        <thead>
            <tr>
                <th scope="col text-start">Pseudo</th>
                <th scope="col text-start">Age</th>
                <th scope="col text-start">Mail</th>
                <th scope="col text-start">Role</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($user as $user){ ?>
            <tr>
                <td><?php echo ($user['pseudo']); ?></td>
                <td><?php echo ($user['age']); ?></p></td>
                <td><?php echo ($user['mail']); ?></p></td>
                <td><?php echo ($user['role']); ?></p></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
