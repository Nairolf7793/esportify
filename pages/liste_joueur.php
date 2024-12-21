<?php 
require_once '../db/DbConnexion.php';
require_once '../db/session.php';

$pdo = DbConnection::getPdo();
$query = $pdo->query('SELECT id,pseudo,age,mail,role FROM user');
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
        <?php foreach ($user as $valeur){ ?>
            <tr>
                <td><?php echo ($valeur['pseudo']); ?></td>
                <td><?php echo ($valeur['age']); ?></p></td>
                <td><?php echo ($valeur['mail']); ?></p></td>
                <td><?php echo ($valeur['role']); ?></p></td>
                <td>
                            <!-- Formulaire pour modifier le rôle -->
                            <form action="../back/update_role.php" method="POST" class="d-inline">
                            <input type="hidden" name="user_id" value="<?php echo $valeur['id']; ?>">
                                <select name="new_role" class="form-select form-select-sm" style="width: auto; display: inline-block;">
                                    <option value="joueur" <?php echo $valeur['role'] === 'joueur' ? 'selected' : ''; ?>>Joueur</option>
                                    <option value="organisateur" <?php echo $valeur['role'] === 'organisateur' ? 'selected' : ''; ?>>Organisateur</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary">Modifier</button>
                            </form>
                        </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
