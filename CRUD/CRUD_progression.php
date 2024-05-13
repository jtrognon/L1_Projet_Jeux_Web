<?php

$debeug=false ; 
include('../db/db_connect.php');

$result = mysqli_query($conn , "select * from progression");

/*---------------------------------------
CRUD: Gestion de la progression
---------------------------------------*/

/*Liste de toutes les histoires*/ 
function liste_progression($conn){
	$sql="SELECT * FROM `progression`"; 
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return rs_to_tab($res) ;
}

/*Selectionner par id*/ 
function select_progression_id($conn, $id){
	$sql="SELECT * FROM `progression` WHERE `id`=$id ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab($res) ;
	return $tab[0] ;
}

/*Selectionner par id dialogue et user*/ 
function select_progression_dialogue_user($conn, $id_dialogue,$id_user){
	$sql="SELECT * FROM `progression` WHERE `id_user`=$id_user AND `id_dialogue`=$id_dialogue ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab($res) ;
	return $tab[0] ;
}



function rs_to_tab($rs){
	$tab=[] ; 
	while($row=mysqli_fetch_assoc($rs)){
		$tab[]=$row ;	
	}
	return $tab;
}
?>