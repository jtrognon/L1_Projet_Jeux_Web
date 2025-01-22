<?php
function is_connected($redirection){
    // Check dans session si connecté
    if(!isset($_SESSION["id_user"])){
        
        if ($redirection){
            header("Location: /vue/menu_connexion_vue.php");
        }
    }
}



function is_admin(){
    if(!isset($_SESSION["admin"]) || $_SESSION["admin"] == '0'){
        header("Location: /vue/menu_connexion_vue.php");
    }
}

?>

