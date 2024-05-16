<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include("../lib/global/header.php");
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
                $id = $_SESSION["id_user"];  

                $tab_login= login_connexion($conn,$id);             
                
                $login = $tab_login[0]["login"];
                
                echo("let login = '$login';");
            }

        ?>
    </script>
    <script>
        function myFunction(){

                
            let div= document.createElement("div");
                document.body.appendChild(div);
                div.classList.add("page_profil");
                
            let button = document.createElement("button");

            let texte = document.createElement("h1");
            let image = document.createElement("img");

            let img = document.createElement("img");
            let user_name = document.createElement("p");
            let passwd = document.createElement("p");
            let lien_deconnexion = document.createElement("p");
            let progressionh1 = document.createElement("p");
            let progressionh2 = document.createElement("p");
            let reset = document.createElement("p");

            image.src="images/retour.png";
            button.appendChild(image);
            
            texte.innerHTML = "PROFIL";
            img.src="images/icon.png";
            user_name.innerHTML = login;
            passwd.innerHTML = "Votre passwd";
            lien_deconnexion.innerHTML = "lien_deconnexion";
            progressionh1.innerHTML = "progression histoire1";
            progressionh2.innerHTML = "progression histoire2";
            reset.innerHTML = "reset";

            div.appendChild(button);
            div.appendChild(texte);
            div.appendChild(img);
            div.appendChild(user_name);
            div.appendChild(passwd);
            div.appendChild(lien_deconnexion);
            div.appendChild(progressionh1);
            div.appendChild(progressionh2);
            div.appendChild(reset);

            button.onclick= myFunction2;
        }

        function myFunction2(){
            let div = document.querySelector(".page_profil")
            document.body.removeChild(div);
        }
    </script> 
</head>
<body>
    <div class= "header_menu">
        <img id="logo" src="images/titre.png" alt="Logo"/>

        <div> <button onclick="myFunction()" id="profil"><img src="images/icon.png" alt="Profil"></button> 
            
        </div>
    </div>
   
    <br>

    <main class="main_menu">
        
        <h2>Histoires</h2>

        <section class="icon">
                <a href="histoire_vue.php?id_histoire=1"><img src="images/test1.jpg" ></a>
                <br>
                <a href="histoire_vue.php?id_histoire=2"><img src="images/test2.jpg"></a>
            
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
