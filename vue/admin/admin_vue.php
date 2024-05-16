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
?>

</script>

<script>
    console.log(histoires);

    function body_onload(){
        

        // Display 
        display_histoires_vue(histoires);
    }
</script>

<body onload="body_onload();">

    <h1>Page Admin</h1>


    <h2>Formulaires des histoires / personnages / dialogues</h2>

    <section id="forms">

        
    </section>

    <section id="list">
        <h2>Liste des histoires / personnages / dialogues</h2>
    </section>
</body>
</html>