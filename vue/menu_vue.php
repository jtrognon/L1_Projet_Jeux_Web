<?php
include("../lib/global/header.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleuh.css">
    <title>Home Page</title>
    <style>
    #logo {
            width: 300px; 
            height: 300px; 
            display: block; 
            margin: 0 auto;
    }
    </style>
  
</head>
<body>


    <header >
    <img id="logo" src="images/titre.png" alt="Logo">

        
    
        <div> <a href="profil_vue.php" > <img src="images/icon.png" alt="Profil" ></div>
        </a>
    
        
    
    
    </header>
   
    <br>

    <main class="main_menu">
        
    <div class= "centered"><h2>Histoires</h2></div>

        <section class="icon">
            
            
                <a href="histoire_vue.php?id_histoire=1"><img src="images/test1.jpg" ></a>
                <br>
                <a href="histoire_vue.php?id_histoire=2"><img src="images/test2.jpg"></a>
            
        </section>
    </main>

 

    <footer class= "footer_menu" >
        
        <div><a href="menu_connexion_vue.php?action=disconnect">Deconnexion</a></div>
    </footer>


</body>
</html>
