<!DOCTYPE html>
<?php
        include('../db/db_connect.php');
        include('CRUD_connexion.php');
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Ajouter un perso :</h2>
    <br>
    <form method="post" action="index_chloe.php">
        <table>
                <tr>
                <th><strong>login</strong></th>
                <td><input type="text" name="login"></td>
                </tr>


        </table>
        <input type="submit" value="Envoyer">
    <?php
        if(isset($_POST["login"])){
            $login = $_POST["login"];
        }
        echo(admin_connexion($conn,$login));
    ?>
</body>
</html>