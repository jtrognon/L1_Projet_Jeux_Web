<?php

// Dérouler les dialogues
if (isset($_GET["id_histoire"])){
    $id_histoire = $_GET["id_histoire"];
    echo "let id_histoire = $id_histoire;";
} else {
    echo "let id_histoire = 0;";
}


if (isset($_POST["action"]) && isset($_POST["table"])){
    // Infos du formulaire
    $action = $_POST["action"];
    $table = $_POST["table"];

    if ($action == "create"){
        if ($table == "histoire"){
            if (isset($_POST["name"])){
                $name = $_POST["name"];

                create_histoire($conn, $name);
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

                update_histoire($conn, $id, $name);
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