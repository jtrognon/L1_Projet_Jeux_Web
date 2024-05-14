<?php

$debeug=False ; 

$result = mysqli_query($conn , "select * from histoire");

/*---------------------------------------
CRUD: Gestion de l'histoire
---------------------------------------*/

/* Créer une histoire */
function create_histoire($conn, $nom){
	$sql="INSERT INTO `histoire` (`id`, `nom`) VALUES (NULL, '$nom');";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return $res ;	
}

/* Suprimer une histoire */
function delete_histoire($conn, $id){
	$sql="DELETE FROM `histoire` WHERE `id`='$id'" ;
	$ret=mysqli_query($conn, $sql) ;
	return $ret ; 
}

/*Modifier une histoire*/ 
function update_histoire($conn, $id, $nom){
	$sql="UPDATE `histoire` set `nom`='$nom' WHERE `id`='$id'" ;
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return $res ;
}

/*Selectionner une histoire*/ 
function select_histoire($conn, $id){
	$sql="SELECT * FROM `histoire` WHERE `id`='$id' ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab_histoire($res) ;
	return $tab ;
}

/*Liste de toutes les histoires*/ 
function liste_histoire($conn){
	$sql="SELECT * FROM `histoire`"; 
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return rs_to_tab_histoire($res) ;
}

function rs_to_tab_histoire($rs){
	$tab=[] ; 
	while($row=mysqli_fetch_assoc($rs)){
		$tab[]=$row ;	
	}
	return $tab;
}

?>