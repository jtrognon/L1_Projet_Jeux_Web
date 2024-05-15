<?php


function split_list($list){
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

    return [$list_1, $list_2];
}

function not_in_both($list_1, $list_2){
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

    return $res;
}


function last_dialogue($conn, $id_user){
    $ids_list = select_ids_progression($conn, $id_user);
    [$id_progression_list, $id_progression_precedent_list] = split_list($ids_list);

    $last_dialogue = not_in_both($id_progression_list, $id_progression_precedent_list);

    return $last_dialogue;
}


function last_3_progression_id($conn, $id_user){
    $last_dialogue_id = last_dialogue($conn, $id_user);
    $last_dialogue_list = [$last_dialogue_id];

    for ($i=0; $i < 2; $i++){
        $id_dialogue_suivant = $last_dialogue_list[$i];
        $id_dialogue = select_dialogue_precedent($conn, $id_dialogue_suivant)[0]["id_progression_precedent"];
        $last_dialogue_list[] = $id_dialogue;
    }

    return $last_dialogue_list;
}

function last_3_dialogue_id($conn, $id_user){
    $progression_id_list = last_3_progression_id($conn, $id_user);
    $dialogue_id_list = [];

    for ($i=0; $i < count($progression_id_list); $i++){
        $id_progression = $progression_id_list[$i];
        $id_dialogue = select_id_dialogue($conn, $id_progression)[0]["id_dialogue"];
        $dialogue_id_list[] = $id_dialogue;
    }

    return $dialogue_id_list;
}


function last_3_dialogue($conn, $id_user){
    $dialogue_id_list = last_3_dialogue_id($conn, $id_user);
    print_r($dialogue_id_list);
    $dialogue_list = [];

    foreach ($dialogue_id_list as $id){
        $dialogue = select_texte_dialogue($conn,$id)[0]["texte"];
        $dialogue_list[] = $dialogue;
    }

    return $dialogue_list;
}


?>