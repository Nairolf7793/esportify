<?php
require_once "templates/header.php";
$lists = [
    ['titre' => 'titre 1', 'description' => 'description numéro 1'],
    ['titre' => 'titre 2', 'description' => 'description numéro 2'],
    ['titre' => 'titre 3', 'description' => 'description numéro 3'],

]
?>
<?php
require_once "templates/header_account.php";
?>
<table class="table">
    <?php foreach ($lists as $list) { ?>
        <tbody>
            <tr>
                <th scope="row"><?php echo $list['titre'] ?></th>
                <td><?php echo $list['description'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
</table>

<?php
require_once "templates/footer.php";
?>