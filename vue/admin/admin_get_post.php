<?php
// ---------------------------
// Auto remplissage des champs
// ---------------------------
if (isset($_GET["id_histoire"])){
    $id_histoire = $_GET["id_histoire"];
    
    $histoire_infos = select_histoire($conn, $id_histoire)[0];
    $histoire_list = dict_to_list($histoire_infos);
    $histoire_str = json_encode($histoire_list);

    echo "let histoire_infos = $histoire_str;";
    echo "let id_histoire = ['$id_histoire'];";
} else {
    echo "let histoire_infos = ['', '', ''];";
    echo "let id_histoire = [''];";
}


if (isset($_GET["id_dialogue"])){
    $id_dialogue = $_GET["id_dialogue"];
    
    $dialogue_infos = select_dialogue($conn, $id_dialogue)[0];
    $dialogue_list = dict_to_list($dialogue_infos);
    $dialogue_str = json_encode($dialogue_list);

    echo "let dialogue_infos = $dialogue_str;";
    echo "let id_dialogue = ['$id_dialogue'];";
} else {
    echo "let dialogue_infos = ['', '', '', '', '', '', '', '', '', ''];";
    echo "let id_dialogue = [''];";
}


if (isset($_GET["id_personnage"])){
    $id_personnage = $_GET["id_personnage"];
    
    $personnage_infos = select_personnage($conn, $id_personnage);
    $personnage_list = dict_to_list($personnage_infos);
    $personnage_str = json_encode($personnage_list);

    echo "let personnage_infos = $personnage_str;";
    echo "let id_personnage = ['$id_personnage'];";
} else {
    echo "let personnage_infos = ['', '', '', ''];";
    echo "let id_personnage = [''];";
}


// ----------------------------------
// Gestion des envoies des formulaire
// ----------------------------------

if (isset($_POST["action"]) && isset($_POST["table"])){
    // Infos du formulaire
    $action = $_POST["action"];
    $table = $_POST["table"];

    if ($action == "create"){
        if ($table == "histoire"){
            if (isset($_POST["name"]) && isset($_POST["url_img"])){
                $name = $_POST["name"];
                $url_img = $_POST["url_img"];

                create_histoire($conn, $name, $url_img);
            }
        }
        if ($table == "personnage"){
            if (isset($_POST["image"]) && isset($_POST["name"]) && isset($_POST["color"])){
                $image = $_POST["image"];
                $name= $_POST["name"];
                $color = $_POST["color"];
                create_perso($conn, $image, $name, $color);
            }
        }
        if ($table == "dialogue"){
            if (isset($_POST["id_histoire"]) && isset($_POST["id_personnage"]) && isset($_POST["texte"]) && isset($_POST["id_suite_dialogue_1"]) && isset($_POST["id_suite_dialogue_2"]) && isset($_POST["id_suite_dialogue_3"]) && isset($_POST["id_dialogue_necessaire"]))
            {
                $id_histoire = $_POST["id_histoire"];
                $id_personnage = $_POST["id_personnage"];
                $texte = $_POST["texte"];
                $id_suite_dialogue_1 = $_POST["id_suite_dialogue_1"];
                $id_suite_dialogue_2 = $_POST["id_suite_dialogue_2"];
                $id_suite_dialogue_3 = $_POST["id_suite_dialogue_3"];
                $des = isset($_POST["dés"]); // Il n'existe que si la case est cochée
                $premier_dialogue = isset($_POST["premier_dialogue"]);
                $id_dialogue_necessaire = $_POST["id_dialogue_necessaire"];

                // PHP écrit false comme une chaine vide à la place d'un 0
                if (! $des) {
                    $des = 0;
                }
                if (! $premier_dialogue){
                    $premier_dialogue = 0;
                }

                create_dialogue($conn, $id_histoire,$id_personnage,$texte,$id_suite_dialogue_1,$id_suite_dialogue_2,$id_suite_dialogue_3,$des,$premier_dialogue,$id_dialogue_necessaire);
            }
            
        }
    } else if ($action == "update"){
        if ($table == "histoire"){
            if (isset($_POST["id"]) && isset($_POST["name"])){
                $id = $_POST["id"];
                $name = $_POST["name"];
                $url_img = $_POST["url_img"];

                update_histoire($conn, $id, $name, $url_img);
            }
        } else if ($table == "personnage") {
            if (isset($_POST["id"]) && isset($_POST["image"]) && isset($_POST["name"]) && isset($_POST["color"])){
                $id = $_POST["id"];
                $image = $_POST["image"];
                $name= $_POST["name"];
                $color = $_POST["color"];
                update_perso($conn, $id, $image, $name, $color);
            }
        } else if ($table == "dialogue"){
            if (isset($_POST["id"]) && isset($_POST["id_histoire"]) && isset($_POST["id_personnage"]) && isset($_POST["texte"]) && isset($_POST["id_suite_dialogue_1"]) && isset($_POST["id_suite_dialogue_2"]) && isset($_POST["id_suite_dialogue_3"]) && isset($_POST["dés"]) && isset($_POST["premier_dialogue"]) && isset($_POST["id_dialogue_necessaire"]))
            {
                $id = $_POST["id"];
                $id_histoire = $_POST["id_histoire"];
                $id_personnage = $_POST["id_personnage"];
                $texte = $_POST["texte"];
                $id_suite_dialogue_1 = $_POST["id_suite_dialogue_1"];
                $id_suite_dialogue_2 = $_POST["id_suite_dialogue_2"];
                $id_suite_dialogue_3 = $_POST["id_suite_dialogue_3"];
                $dés = $_POST["dés"];
                $premier_dialogue = $_POST["premier_dialogue"];
                $id_dialogue_necessaire = $_POST["id_dialogue_necessaire"];

                update_dialogue($conn, $id, $id_histoire,$id_personnage,$texte,$id_suite_dialogue_1,$id_suite_dialogue_2,$id_suite_dialogue_3,$dés,$premier_dialogue,$id_dialogue_necessaire);
            }
        }
    } else if ($action == "delete") {

        if ($table == "histoire"){
            if (isset($_POST["id"])){
                $id = $_POST["id"];

                delete_histoire($conn, $id);
            }
        } else if ($table == "personnage"){
            if (isset($_POST["id"])){
                $id = $_POST["id"];

                delete_perso($conn, $id);
            }
        } else if ($table == "dialogue"){
            if (isset($_POST["id"])){
                $id = $_POST["id"];

                delete_dialogue($conn, $id);
            }
        }
    }
}

?>