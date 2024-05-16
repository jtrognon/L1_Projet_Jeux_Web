<?php

$debeug=False ; 

$result = mysqli_query($conn , "select * from dialogue");

/*---------------------------------------
CRUD: Gestion des dialogues
---------------------------------------*/

/* Créer un dialogue:Premier dialogue est un booléen*/
function create_dialogue($conn, $id_histoire,$id_personnage,$texte,$id_suite_dialogue_1,$id_suite_dialogue_2,$id_suite_dialogue_3,$dé,$premier_dialogue,$id_dialogue_necessaire){
	$sql="INSERT INTO `dialogue` (`id`, `id_histoire`, `id_personnage`, `texte`, `id_suite_dialogue_1`, `id_suite_dialogue_2`, `id_suite_dialogue_3`, `dé`, `premier_dialogue`,`id_dialogue_necessaire`) VALUES (NULL, '$id_histoire','$id_personnage','$texte','$id_suite_dialogue_1','$id_suite_dialogue_2','$id_suite_dialogue_3','$dé','$premier_dialogue','$id_dialogue_necessaire');";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return $res ;	
}

/* Suprimer un dialogue */
function delete_dialogue($conn, $id){
	$sql="DELETE FROM `dialogue` WHERE `id`='$id'" ;
	$ret=mysqli_query($conn, $sql) ;
	return $ret ; 
}

/* Modifier un dialogue */ 
function update_dialogue($conn, $id, $id_histoire,$id_personnage,$texte,$id_suite_dialogue_1,$id_suite_dialogue_2,$id_suite_dialogue_3,$dé,$premier_dialogue,$id_dialogue_necessaire){
	$sql="UPDATE `dialogue` set `id_histoire`='$id_histoire',`id_personnage`='$id_personnage', `texte`='$texte',`id_suite_dialogue_1`='$id_suite_dialogue_1',`id_suite_dialogue_2`='$id_suite_dialogue_2', `id_suite_dialogue_3`='$id_suite_dialogue_3',`dé`='$dé',`premier_dialogue`='$premier_dialogue',`id_dialogue_necessaire`='$id_dialogue_necessaire' WHERE `id`=$id" ;
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return $res ;
}

/*Selectionner un dialogue*/ 
function select_dialogue($conn, $id){
	$sql="SELECT * FROM `dialogue` WHERE `id`='$id' ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab_dialogue($res) ;
	return $tab ;
}

/*Liste de toutes les dialogues*/ 
function liste_dialogue($conn){
	$sql="SELECT * FROM `dialogue`"; 
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return rs_to_tab_dialogue($res) ;
}

function rs_to_tab_dialogue($rs){
	$tab=[] ; 
	while($row=mysqli_fetch_assoc($rs)){
		$tab[]=$row ;	
	}
	return $tab;
}

/*Selectionner les dialogues avec l'id de l'histoire*/ 
function select_dialogue_histoire($conn, $id_histoire){
	$sql="SELECT * FROM `dialogue` WHERE `id_histoire`='$id_histoire' ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab_dialogue($res) ;
	return $tab ;
}

/*Selectionner le 1er dialogue d'une histoire*/ 
function select_first_dialogue_histoire($conn, $id_histoire){
	$sql="SELECT `texte` FROM `dialogue` WHERE `id_histoire`='$id_histoire' AND `premier_dialogue`= 1 ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab_dialogue($res) ;
	return $tab ;
}


/*Selectionner dialogue d'une histoire avec son id*/ 
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

/*Selectionner dialogue d'une histoire avec son id*/ 
function select_texte_dialogue($conn,$id){
	$sql="SELECT `texte` FROM `dialogue` WHERE `id`= '$id' ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab_dialogue($res) ;
	return $tab ;
}

/*Selectionner le 1er dialogue d'une histoire*/ 
function select_id_first_dialogue_histoire($conn, $id_histoire){
	$sql="SELECT `id` FROM `dialogue` WHERE `id_histoire`='$id_histoire' AND `premier_dialogue`= 1 ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab_dialogue($res) ;
	return $tab ;
}

/*Selectionner l'id personnage*/ 
function select_id_personnage($conn, $id){
	$sql="SELECT `id_personnage` FROM `dialogue` WHERE `id`='$id' ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab_dialogue($res) ;
	return $tab ;
}


?>