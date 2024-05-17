<?php
session_start();
include("../../lib/global/header_admin.php");

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
    <link rel="stylesheet" href="../css/style_temp_julie.css">
    <script src="form_vue.js"></script>
    <script src="admin_fct_vue.js"></script>
</head>

<script>

<?php
    include("admin_get_post.php");
    load_histoires($conn);

    load_personnage_list($conn);
?>

</script>

<script>
    console.log(histoires);

    function body_onload(){


        // Display 
        display_histoires_vue(histoires);

        display_all_personnage_vue(personnage_list);
    }

    
</script>

<body onload="body_onload();">

    <h1>Page Admin</h1>


    <h2>Formulaires des histoires / personnages / dialogues</h2>

    <section id="forms">

    <label for="choix_forms">Choix de la table à modifier : </label>
    
    <select id="choix_forms" onchange="forms_choice()">
        <option value="histoire">Histoire</option>
        <option value="personnage">Personnage</option>
        <option value="dialogue">Dialogue</option>
    </select>
        
    <select id="choix_form_type" onchange="form_type_choice()">
        <option value="all">Tout</option>
        <option value="create">Ajouter</option>
        <option value="update">Modifier</option>
        <option value="delete">Supprimer</option>
    </select>

    </section>

    <section id="list">
        <h2>Liste des histoires / personnages / dialogues</h2>
    </section>

    <a href="../../index.php">Menu</a>
</body>
</html>