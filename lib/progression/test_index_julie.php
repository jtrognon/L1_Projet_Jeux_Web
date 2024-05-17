<?php

// affichage des erreurs
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("/home/grp1/public_html/db/db_connect.php");
include("/home/grp1/public_html/CRUD/CRUD_progression.php");
include("/home/grp1/public_html/CRUD/CRUD_dialogue.php");
include("/home/grp1/public_html/CRUD/CRUD_personnage.php");

include("../fonction_histoire.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST Julie</title>
</head>
<body>

<?php
    $id_user = 35;
    $id_histoire = 1;
    reset_progression_histoire($conn, $id_user, $id_histoire);



    include("/home/grp1/public_html/db/db_disconnect.php");

?>
</body>
</html>