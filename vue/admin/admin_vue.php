<?php

include("../../lib/global/header.php");

?>

<?php
include("/home/grp1/public_html/db/db_connect.php");
include("/home/grp1/public_html/CRUD/CRUD_histoire.php");
include("/home/grp1/public_html/CRUD/CRUD_dialogue.php");
include("/home/grp1/public_html/CRUD/CRUD_personnage.php");
include("/home/grp1/public_html/CRUD/CRUD_progression.php");

include("admin_fct.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../form_vue.js"></script>
    <script src="admin_fct_vue.js"></script>
</head>

<script>

<?php
    include("admin_get_post.php");
    load_histoires($conn);
?>

</script>

<script>
    console.log(histoires);

    function body_onload(){
        // histoire
        create_histoire_form_vue(); 
        update_histoire_form_vue(["", ""]);
        delete_histoire_form_vue([""]);

    
        // personnage
        create_personnage_form_vue();
        update_personnage_form_vue(["", "", "", ""]);
        delete_personnage_form_vue([""]);


        // Dialogue
        create_dialogue_form_vue();
        update_dialogue_form_vue(["", "", "", "", "", "", 0, 0, "", ""]);
        delete_dialogue_form_vue([""]);


        // Display 
        display_histoires_vue(histoires);
    }
</script>

<body onload="body_onload();">

    <h1>Page Admin</h1>


    <h2>Formulaires des histoires / personnages / dialogues</h2>
    <section id="histoire">
        <h3>Histoire</h3>
    </section>

    <section id="personnage">
        <h3>Personnage</h3>
    </section>

    <section id="dialogue">
        <h3>Dialogue</h3>
    </section>


    <section id="list">
        <h2>Liste des histoires / personnages / dialogues</h2>
    </section>
</body>
</html>