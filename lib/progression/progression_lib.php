<?php


function split_list($list){
    if (count($list) == 1){
        $list_1 = [$list[0]["id"]];
        $list_2 = [$list[0]["id_progression_precedent"]];
    } else {

        
        $list_1 = [];
        $list_2 = [];
        
        for ($i=0; $i < count($list); $i++){
            $ids = $list[$i];
            
            $id = $ids["id"];
            $id_prog = $ids["id_progression_precedent"];
            
            if ($id_prog != 0){
                $list_1[] = $id;
                $list_2[] = $id_prog;
            }
        }
        
    }
    return [$list_1, $list_2];
}

function not_in_both($list_1, $list_2){
    if (count($list_1) == 1){
        $res = $list_1[0];
    } else {

        $res = 0;
        foreach ($list_1 as $element_1){
            $trouve = false;
            $i = 0;
            while ($i < count($list_2) && ! $trouve){
                $element_2 = $list_2[$i];
                
                if ($element_1 == $element_2 || $element_2 == 0){
                    $trouve = true;
                }
                
                $i += 1;
            }
            
            if (! $trouve){
                $res = $element_1;
            }
        }
    }
    
    return $res;
}


function last_progression($conn, $id_user, $id_histoire){
    $ids_list = select_ids_progression($conn, $id_user, $id_histoire);
    [$id_progression_list, $id_progression_precedent_list] = split_list($ids_list);

    $last_progression = not_in_both($id_progression_list, $id_progression_precedent_list);

    return $last_progression;
}

function last_dialogue($conn, $id_user, $id_histoire){
    $id_progression = last_progression($conn, $id_user, $id_histoire);
    $id_dialogue = select_id_dialogue($conn, $id_progression)[0]["id_dialogue"];

    return $id_dialogue;
}


function last_3_progression_id($conn, $id_user, $id_histoire){
    $last_progression_id = last_progression($conn, $id_user, $id_histoire);
    $last_progression_list = [$last_progression_id];

    $id_progression_list = select_ids_progression($conn,$id_user,$id_histoire); // permet d'avoir la liste de toutes les progression du user sur l'histoire
    $i=0;
    while ($i < 2 && count($id_progression_list) - 1 > $i){ // permet de vérifier qu'il y ai assez de progression à donner
        $id_progression_suivant = $last_progression_list[$i];
        $id_progression = select_dialogue_precedent($conn, $id_progression_suivant)[0]["id_progression_precedent"];
        $last_progression_list[] = $id_progression;

        $i += 1;
    }

    return $last_progression_list;
}

function last_3_dialogue_id($conn, $id_user, $id_histoire){
    $progression_id_list = last_3_progression_id($conn, $id_user, $id_histoire);
    $dialogue_id_list = [];

    for ($i=0; $i < count($progression_id_list); $i++){
        $id_progression = $progression_id_list[$i];
        $id_dialogue = select_id_dialogue($conn, $id_progression, $id_histoire)[0]["id_dialogue"];

        if ($id_dialogue != 0){
            $dialogue_id_list[] = $id_dialogue;
        }
    }

    return $dialogue_id_list;
}


function last_3_dialogue($conn, $id_user, $id_histoire){
    $dialogue_id_list = last_3_dialogue_id($conn, $id_user, $id_histoire);
    $dialogue_list = [];

    if (count($dialogue_id_list) != 0){        
        foreach ($dialogue_id_list as $id){
            $dialogue = select_texte_dialogue($conn,$id)[0]["texte"];
            $dialogue_list[] = $dialogue;
        }
        
        for ($i=count($dialogue_list)-1; $i < 3; $i++){
            $dialogue_list[] = "";
        }
    }

    return $dialogue_list;
}


function last_3_personnage($conn, $id_user, $id_histoire){
    $dialogue_id_list = last_3_dialogue_id($conn, $id_user, $id_histoire);
    $personnage_list = [];

    foreach ($dialogue_id_list as $id){
        $id_personnage = select_id_personnage($conn,$id)[0]["id_personnage"];
        $url = select_url_perso($conn, $id_personnage)[0]["url_image"];
        $personnage_list[] = $url;
    }

    for ($i=count($personnage_list)-1; $i < 3; $i++){
        $personnage_list[] = "";
    }

    return $personnage_list;
}

function save_choice($conn, $id_user, $id_histoire, $choice){
    // Progression précédente
    $id_progression = last_progression($conn, $id_user, $id_histoire);

    // Dernier dialogue choisi 
    $id_dialogue = select_id_dialogue($conn, $id_progression)[0]["id_dialogue"];
    $dialogue = select_dialogue($conn, $id_dialogue)[0];
    
    $id_prochain_dialogue = $dialogue["id_suite_dialogue_".$choice];
    
    create_progression($conn, $id_histoire,$id_prochain_dialogue,$id_progression,$id_user);
}

function init_progression_histoire($conn, $id_user, $id_histoire){
    $id_dialogue = select_id_first_dialogue_histoire($conn, $id_histoire)[0]["id"];
    create_progression($conn, $id_histoire, $id_dialogue, 0, $id_user);
}

function reset_progression_histoire($conn, $id_user, $id_histoire){
    delete_progression($conn, $id_user, $id_histoire);
    init_progression_histoire($conn, $id_user, $id_histoire);
}


function pourcentage_progression($conn, $id_user, $id_histoire){
    $ids_progression_list = select_ids_progression($conn, $id_user, $id_histoire);
    $dialogue_list = select_dialogue_histoire($conn, $id_histoire);

    return (count($ids_progression_list) / count($dialogue_list));  
}


function is_saved($conn, $id_user, $id_histoire, $id_dialogue){
    $progression = select_progression_dialogue_user($conn, $id_dialogue,$id_user,$id_histoire);

    return ($progression != []);
}
?>