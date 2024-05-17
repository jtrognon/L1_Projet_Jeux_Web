<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include("../lib/global/header.php");
    include("../lib/progression/progression_lib.php");
    include("../CRUD/CRUD_histoire.php");
    include("../CRUD/CRUD_progression.php");
    include("../CRUD/CRUD_dialogue.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleuh.css">
    <title>Home Page</title> 
    <script>
        <?php 
            if(isset($_SESSION["id_user"])){
                $id_user = $_SESSION["id_user"];  

                $tab_login= login_connexion($conn,$id_user);             
                
                $login = $tab_login[0]["login"];
                echo("let login = '$login';");
                
            }

            if(isset($_POST["nouveau_mdp"])){
                $passwd = $_POST["nouveau_mdp"];  

                update_mdp($conn,$id,$passwd);       
            }


            // Check le reset de la progression de l'histoire
            if (isset($_GET["action"]) && isset($_GET["id_histoire"])){
                $action = $_GET["action"];
                $id_histoire = $_GET["id_histoire"];

                if ($action == "reset"){
                    reset_progression_histoire($conn, $id_user, $id_histoire);
                }
            }

            // Donne le nom des histoires
            $histoires_list = liste_histoire($conn);
            $histoires_name_list = [];
            $histoires_id_list = [];
            $histoires_progress_list = [];
            for ($i=0; $i < count($histoires_list); $i++){
                $histoire = $histoires_list[$i];
                $histoires_name_list[] = $histoire["nom"];
                $histoires_id_list[] = $histoire["id"];
                $histoires_progress_list[] = pourcentage_progression($conn, $id_user, $histoire["id"]);
            }

            $histoires_name_str = json_encode($histoires_name_list);
            $histoires_id_str = json_encode($histoires_id_list);
            $histoires_progress_str = json_encode($histoires_progress_list);

            echo "let histoires_name_list = $histoires_name_str;";
            echo "let histoires_id_list = $histoires_id_str;";
            echo "let histoires_progress_list = $histoires_progress_str;";
        ?>


    </script>
    <script src="menu_fct_vue.js"></script> 
</head>
<body  onload="display_stories();">
    <div class= "header_menu">
        <img id="logo" src="images/titre.png" alt="Logo"/>

        <div> <button onclick="display_profil_menu()" id="profil"><img src="images/icon.png" alt="Profil"></button> 
            
        </div>
    </div>
   
    <br>

    <main class="main_menu">
        
        <h2>Histoires</h2>

        <section class="icon">
        </section>
    </main>

    <footer class= "footer_menu" >
        <div class="lien">
            <a href="menu_connexion_vue.php?action=disconnect">Deconnexion</a>
            <a href="https://l1.dptinfo-usmb.fr/~grp1/vue/admin/admin_vue.php">Admin</a>
        </div>
    </footer>

</body>
</html>
