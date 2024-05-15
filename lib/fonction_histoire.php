<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('../db/db_connect.php');
include('progression/progression_lib.php');
$debeug=False ; 

/*Fonction qui renvois un entier aléatoire entre 2 bornes*/
function lancer_de($min,$max){
	$res = var_dump(random_int($min,$max));
	return $res;
}

/*Fonction qui retroune le lien de l'image selon le personnage*/
/*NE FONCTIONNE PASSSSSS*/
function url_img($conn){
    $sql="SELECT `url_image` FROM `Personnage` WHERE `id`='$id_histoire' ";
    global $debeug ;
	if($debeug) echo $sql ;
	$res=mysqli_query($conn, $sql) ; 
	$ret= rs_to_tab_pb($res) ;
    return $ret[0]['url_img'];
}

/*Renvoie l'url de l'image correspondant à l'histoire*/
function url_img_histoire($conn){
    if(isset($_GET["id_histoire"])){
        $id_histoire = $_GET["id_histoire"];
    }
    $sql="SELECT `url_img` FROM `histoire` WHERE `id`='$id_histoire' ";
    global $debeug ;
	if($debeug) echo $sql ;
	$res=mysqli_query($conn, $sql) ; 
	$ret= rs_to_tab_pb($res) ;
    return $ret[0]['url_img'];
}

function rs_to_tab_pb($rs){
	$tab=[] ; 
	while($row=mysqli_fetch_assoc($rs)){
		$tab[]=$row ;	
	}
	return $tab;
}

/*Fonction qui renvois le nombre de dialogue suivant*/ 
function nb_dialogue_suivant($conn,$id){
	$sql="SELECT `id_suite_dialogue_1`,`id_suite_dialogue_2`,`id_suite_dialogue_3` FROM `dialogue` WHERE `id`='$id' ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ;
    $tab=rs_to_tab_fonction_histoire($res) ;
    $count=0;
	if ($tab[0]['id_suite_dialogue_1'] !=0) {
		$count = $count +1;
	}
	if ($tab[0]['id_suite_dialogue_2'] !=0){
		$count = $count +1;
	}
	if ($tab[0]['id_suite_dialogue_3'] !=0){
		$count = $count +1;
	}
	return $count;
}



/*Selectionne les id des 3 prochains dialogues.
Retourne sous forme de tableau.*/ 
function return_dialogue_suivant($conn,$id){
    $sql="SELECT `id_suite_dialogue_1`,`id_suite_dialogue_2`,`id_suite_dialogue_3` FROM `dialogue` WHERE `id`='$id' ";
    global $debeug ;
	if($debeug) echo $sql ; 
	$final=[];
	$res=mysqli_query($conn, $sql) ;
    $tab=rs_to_tab_fonction_histoire($res);
	$table = [$tab[0]["id_suite_dialogue_1"], $tab[0]["id_suite_dialogue_2"],$tab[0]["id_suite_dialogue_3"]];
	if ($table[0] !=0){
		$final = $final + [$table[0]];
	}
	if ($table[1] !=0){
		$final = $final + [$table[1]];
	}
	if($table[2]!=0){
		$final = $final +[$table[2]];
	}
	return $table;
}

/*Rnevoie les prochains dialogues*/ 
function dialogue_suivant($conn,$id_user){
	$id = last_dialogue($conn,$id_user);
	$dialogues = return_dialogue_suivant($conn,$id);
}



function select_id_dialogue_histoire($conn,$id){
	if(isset($_GET["id_histoire"])){
        $id_histoire = $_GET["id_histoire"];
    }
	$sql="SELECT `texte` FROM `dialogue` WHERE `id_histoire`='$id_histoire' AND `id`= '$id' ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab_dialogue($res) ;
	return $tab ;
}

function rs_to_tab_fonction_histoire($rs){
	$tab=[] ; 
	while($row=mysqli_fetch_assoc($rs)){
		$tab[]=$row ;	
	}
	return $tab;
}



?>