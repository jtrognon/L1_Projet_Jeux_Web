<?php

$debeug=False ; 
$result = mysqli_query($conn , "select * from progression");

/*---------------------------------------
CRUD: Gestion de la progression
---------------------------------------*/
/*Céer une <progression></progression>/* Créer un personnage */
function create_progression($conn, $id_histoire,$id_dialogue,$id_progression_precedent,$id_user){
	
	$sql="INSERT INTO `progression`(`id_histoire`, `id_dialogue`, `id_progression_precedent`,`id_user`) value('$id_histoire','$id_dialogue','$id_progression_precedent','$id_user')";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return $res ;	
}


/*Liste de toutes les histoires*/ 
function liste_progression($conn){
	$sql="SELECT * FROM `progression`"; 
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return rs_to_tab_progression($res) ;
}

/*Selectionner par id*/ 
function select_progression_id($conn, $id){
	$sql="SELECT * FROM `progression` WHERE `id`='$id' ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab_progression($res) ;
	return $tab ;
}

/*Selectionner par id dialogue et user*/ 
function select_progression_dialogue_user($conn, $id_dialogue,$id_user,$id_histoire){
	$sql="SELECT * FROM `progression` WHERE `id_user`='$id_user' AND `id_dialogue`='$id_dialogue' AND `id_histoire`='$id_histoire' ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab_progression($res) ;
	return $tab ;
}



function rs_to_tab_progression($rs){
	$tab=[] ; 
	while($row=mysqli_fetch_assoc($rs)){
		$tab[]=$row ;	
	}
	return $tab;
}

/*Selectionne l'id et id dialogue precedent en fonction de l'user*/
function select_ids_progression($conn,$user_id,$id_histoire){
	$sql="SELECT `id`,`id_progression_precedent` FROM `progression` WHERE `id_user`='$user_id' AND `id_histoire`='$id_histoire' ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab_progression($res) ;
	return $tab ;
}

/*Selection du dialogue précédent*/
function select_dialogue_precedent($conn, $id){
	$sql="SELECT `id_progression_precedent` FROM `progression` WHERE `id`='$id'";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab_progression($res) ;
	return $tab ;
}

/*Selection de l'id dialogue*/ 
function select_id_dialogue($conn, $id){
	$sql="SELECT `id_dialogue` FROM `progression` WHERE `id`='$id' ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab_progression($res) ;
	return $tab ;
}

/* Suprimer progression une histoire */
function delete_progression($conn, $id_user,$id_histoire){
	$sql="DELETE FROM `progression` WHERE `id_user`='$id_user' AND `id_histoire`='$id_histoire'" ;
	$ret=mysqli_query($conn, $sql) ;
	return $ret ; 
}

?>