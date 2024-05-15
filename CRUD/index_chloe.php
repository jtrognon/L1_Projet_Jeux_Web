<!DOCTYPE html>
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include('../db/db_connect.php');
    include('../lib/fonction_histoire.php');
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
                <th><strong>id</strong></th>
                <td><input type="text" name="id"></td>
        </table>
        <input type="submit" value="Envoyer">
    </form>
    <?php
        if(isset($_POST["id"])){
            $id = $_POST["id"]; 
        }
        print_r(return_dialogue_suivant($conn,$id));
    ?>
</body>
</html>