<?php

include("../db/db_connect.php");
include("../CRUD/CRUD.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="admin_fct_vue.js"></script>
</head>

<script>
    <?php

    $stories = liste_histoire($conn);
    $stories_str = json_encode($stories);
    echo "let stories = $stories_str;";

    ?>


    function body_onload(){
        // Story
        create_story_form_vue(); 
        update_story_form_vue(['', '', 'Modifier']);
        delete_story_form_vue(['', 'Supprimer']);

    
        // Character
        create_char_form_vue();
        update_char_form_vue(["", "", "", "", "Modifier"]);
        delete_char_form_vue(["", "Supprimer"]);


        // Display 
        display_stories_vue(stories);

    }
</script>

<body onload="body_onload();">
    <h1>Page Admin</h1>

    <section id="story">
        <h2>Histoire</h2>
    </section>

    <section id="character">
        <h2>Personnage</h2>
    </section>


    <section id="list"></section>
</body>
</html>