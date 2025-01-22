<!DOCTYPE html>
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include(__DIR__.'/../db/db_connect.php');
    include(__DIR__.'/../lib/fonction_histoire.php');
    include(__DIR__.'/../CRUD/CRUD_dialogue.php');
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
        if(isset($_POST["id_histoire"])){
            $id_histoire = $_POST["id_histoire"];
            $id_dialogue = $_POST["id_dialogue"];
            $id_progression_precedent = $_POST["id_progression_precedent"];
            $id_user = $_POST["id_user"];
            
        }
        $id =4;
        echo(select_de($conn, $id));
    ?>
</body>
</html>