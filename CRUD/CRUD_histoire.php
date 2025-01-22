<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$debeug=False ; 

$result = mysqli_query($conn , "select * from histoire");

/*---------------------------------------
CRUD: Gestion de l'histoire
---------------------------------------*/

/* Créer une histoire */
function create_histoire($conn, $nom, $url_img){
	$sql="INSERT INTO `histoire` (`id`, `nom`,`url_img`) VALUES (NULL, '$nom','$url_img');";
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
function update_histoire($conn, $id, $nom, $url_img){
	$sql="UPDATE `histoire` SET `nom`='$nom',`url_img`='$url_img' WHERE `id`='$id'" ;
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

/*Selectionner une id*/ 
function select_id_histoire($conn, $nom,$url_img){
	$sql="SELECT `id` FROM `histoire` WHERE `nom`='$nom' AND `url_img`='$url_img'";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab_histoire($res) ;
	return $tab ;
}

?>