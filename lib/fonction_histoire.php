<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// include('../db/db_connect.php');
include('progression/progression_lib.php');

$debeug=False ; 

/*Fonction qui renvois un entier aléatoire entre 2 bornes*/
function lancer_de($min,$max){
	$res = var_dump(random_int($min,$max));
	return $res;
}

/*Fonction qui retroune le lien de l'image selon le personnage*/
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
function nb_dialogue_suivant($conn,$id_user,$id_histoire){
	$id=last_dialogue($conn,$id_user,$id_histoire);
	$sql="SELECT `id_suite_dialogue_1`,`id_suite_dialogue_2`,`id_suite_dialogue_3` FROM `dialogue` WHERE `id`='$id' ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ;
    $tab=rs_to_tab_fonction_histoire($res) ;
    $count=0;

	// suite id dialogue
	$suite_dialogue_1 = $tab[0]['id_suite_dialogue_1'];
	$suite_dialogue_2 = $tab[0]['id_suite_dialogue_2'];
	$suite_dialogue_3 = $tab[0]['id_suite_dialogue_3'];

	// Test si il y a une suite de dialogue numéro 1 et si le dialogue nécessaire est validé
	if ($suite_dialogue_1 !=0 && dialogue_necessaire_est_ok($conn, $id_user, $id_histoire, $suite_dialogue_1)){
		$count = $count +1;
	}

	if ($suite_dialogue_2 !=0 && dialogue_necessaire_est_ok($conn, $id_user, $id_histoire, $suite_dialogue_2)){
		$count = $count +1;
	}

	if ($suite_dialogue_3 !=0 && dialogue_necessaire_est_ok($conn, $id_user, $id_histoire, $suite_dialogue_3)){
		$count = $count +1;
	}
	return $count;
}

// Regarde si le dialogue nécessaire est validé
function dialogue_necessaire_est_ok($conn, $id_user, $id_histoire, $suite_dialogue){
	$id_dialogue_necessaire = select_id_dialogue_necessaire($conn, $suite_dialogue)[0]["id_dialogue_necessaire"]; // Récupère l'id du dialogue nécessaire
	return ($id_dialogue_necessaire == 0 || is_saved($conn, $id_user, $id_histoire, $id_dialogue_necessaire)); // regarde si il y a un dialogue nécessaire et si il a été validé
}

/*Selectionne les id des 3 prochains dialogues.
Retourne sous forme de tableau.*/ 
function return_dialogue_suivant($conn,$id, $id_user, $id_histoire){
    $sql="SELECT `id_suite_dialogue_1`,`id_suite_dialogue_2`,`id_suite_dialogue_3` FROM `dialogue` WHERE `id`='$id' ";
    global $debeug ;
	if($debeug) echo $sql ; 
	$final=[];
	$res=mysqli_query($conn, $sql) ;
    $tab=rs_to_tab_fonction_histoire($res)[0];
	
	// récupération des ids suite dialogue
	$id_suite_dialogue_1 = $tab["id_suite_dialogue_1"];
	$id_suite_dialogue_2 = $tab["id_suite_dialogue_2"];
	$id_suite_dialogue_3 = $tab["id_suite_dialogue_3"];

	if ($id_suite_dialogue_1 !=0 && dialogue_necessaire_est_ok($conn, $id_user, $id_histoire, $id_suite_dialogue_1)){
		$final[] = $id_suite_dialogue_1;
	}
	if ($id_suite_dialogue_2 !=0 && dialogue_necessaire_est_ok($conn, $id_user, $id_histoire, $id_suite_dialogue_2)){
		$final[] = $id_suite_dialogue_2;
	}
	if($id_suite_dialogue_3 !=0 && dialogue_necessaire_est_ok($conn, $id_user, $id_histoire, $id_suite_dialogue_3)){
		$final[] = $id_suite_dialogue_3;
	}
	return $final;
}

/*Renvoie les prochains dialogues*/ 
function dialogue_suivant($conn,$id_user,$id_histoire){
	$id = last_dialogue($conn,$id_user,$id_histoire);
	$dialogues_id = return_dialogue_suivant($conn,$id, $id_user, $id_histoire);
	$nb = count($dialogues_id);
	$res=[];
	for ($i=0;$i<$nb;$i++){
		$dialogue_id=$dialogues_id[$i];
		$texte_dialogue = select_texte_dialogue($conn,$dialogue_id);
		$res[]= $texte_dialogue[0]["texte"];
	}
	return $res;
}


function rs_to_tab_fonction_histoire($rs){
	$tab=[] ; 
	while($row=mysqli_fetch_assoc($rs)){
		$tab[]=$row ;	
	}
	return $tab;
}

?>


<script>
	function disable_button(num_button){
		button_list = document.querySelectorAll("button");

		button_list[num_button - 1].disabled = true;
	}
</script>