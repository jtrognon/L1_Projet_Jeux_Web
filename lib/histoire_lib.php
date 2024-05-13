<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include("../db/db_connect.php");
include("../CRUD/CRUD_dialogue.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="histoire.js"></script>
    <script>
        // Temporaire
        function body_onload(){
            
        }
    </script>
</head>
<body onload="body_onload();">
<form id="choix">
</formy>
    <?php
    /* Recuperer le premier dialogue*/ 
    /* Faire une sorte de +3 */
    session_start();

    if (isset ($_GET["id_histoire"])){
        $id_histoire = $_GET["id_histoire"];
        $_SESSION["id_histoire"]= $id_histoire; }

    $id_histoire = 1;


    print_r(select_first_dialogue_histoire($conn, $id_histoire));

    print_r(select_id_dialogue_histoire($conn, $id_histoire,2));
    print_r(select_id_dialogue_histoire($conn, $id_histoire,3));
    ?>

</body>
</html>



