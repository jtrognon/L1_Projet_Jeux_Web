<?php

function load_histoires($conn){
    $histoires = liste_histoire($conn);
    $histoire_list = []; // liste d'histoires avec comme clé les identifiants des histoires

    for ($i=0; $i < count($histoires); $i++){
        $id_histoire = $histoires[$i]["id"];
        
        // récupère les dialogues de l'histoire
        $dialogues = select_dialogue_histoire($conn, $id_histoire);
        $dialogue_list = []; // liste avec id_dialogue comme clé

        for ($j=0; $j < count($dialogues); $j++){
            $dialogue = $dialogues[$j];
            $id_dialogue = $dialogue["id"];
            
            // Récupère le personnage du dialogue
            $personnage = select_perso($conn, $dialogue["id_personnage"])[0]; // Il y a un seul personnage
            $dialogue["personnage"] = $personnage;

            // Ajout du dialogue modifié dans la liste des dialogues
            $dialogue_list["$id_dialogue"] = $dialogue;
        }
        
        $histoires[$i]["dialogues"] = $dialogue_list;

        $histoire_list["$id_histoire"] = $histoires[$i];
    }

    $histoires_str = json_encode($histoire_list);
    echo "let histoires = $histoires_str;"; // ecrit dans les balises 'script'
}


?>