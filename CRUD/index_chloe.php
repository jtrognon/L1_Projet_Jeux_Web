<!DOCTYPE html>
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include('../db/db_connect.php');
    include('../lib/fonction_histoire.php');
    include('../CRUD/CRUD_progression.php');

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Nouveau nom:</h2>
    <br>
    <form method="post" action="index_chloe.php">
        <table>
                <tr>
                <th><strong>id_histoire</strong></th>
                <td><input type="text" name="id_histoire"></td>
                </tr>
                <tr>
                <th><strong>id_dialogue</strong></th>
                <td><input type="text" name="id_dialogue"></td>
                </tr>
                <tr>
                <th><strong>id_progression_precedent</strong></th>
                <td><input type="text" name="id_progression_precedent"></td>
                </tr>
                <tr>
                <th><strong>id_user</strong></th>
                <td><input type="text" name="id_user"></td>
                </tr>
        </table>
        <input type="submit" value="Envoyer">
    </form>
    <?php
    $id_user=1;
    print_r(dialogue_suivant($conn,$id_user, 1));
    ?>
</body>
</html>