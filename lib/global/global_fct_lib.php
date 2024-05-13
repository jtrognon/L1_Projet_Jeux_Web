<?php
function is_connected($conn, $redirection){
    // Check dans session si connecté
    if (!isset($_SESSION["id_user"])){
        
        if ($redirection){
            header("Location: /~grp1/vue/menu_connexion_vue.php");
         }
    }
}



function is_admin(){
    // Check dans session si admin

    echo true;
}

?>

