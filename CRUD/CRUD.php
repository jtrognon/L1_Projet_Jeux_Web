<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
$debeug=True ; 
include('../db/db_connect.php');

/*---------------------------------------
CRUD: Gestion de l'histoire
---------------------------------------*/

$result = mysqli_query($conn , "select * from histoire");

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
	$sql="DELETE FROM `histoire` WHERE `id`=$id" ;
	$ret=mysqli_query($conn, $sql) ;
	return $ret ; 
}

/*Modifier une histoire*/ 
function update_histoire($conn, $id, $nom){
	$sql="UPDATE `histoire` set `nom`='$nom' WHERE `id`=$id" ;
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return $res ;
}

/*Selectionner une histoire*/ 
function select_histoire($conn, $id){
	$sql="SELECT * FROM `histoire` WHERE `id`=$id ";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab($res) ;
	return $tab[0] ;
}

/*Liste de toutes les histoires*/ 
function liste_histoire($conn){
	$sql="SELECT * FROM `histoire`"; 
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return rs_to_tab($res) ;
}

/*---------------------------------------
CRUD: Connexion
---------------------------------------*/
/* on donne login et renvois mdp associer*/ 


function mdp_connexion($conn,$login){
	$sql="SELECT passwd FROM `connexion` WHERE login= $login";

	$res=mysqli_query($conn, $sql) ;
	$passwd = mysqli_fetch_assoc($res);
	if $passwd == false{
		return null;
	}
	return $passwd['passwd'];
}
/*---------------------------------------
CRUD: Gestion des personnages
---------------------------------------*/

$result = mysqli_query($conn , "select * from Personnage");

/* Créer un personnage */
function create_perso($conn, $url_image, $nom, $couleur){
	$sql="INSERT INTO `Personnage`(`url_image`, `nom`, `couleur`) value('$url_image','$nom','$couleur')";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return $res ;	
}

/* Suprimer un personnage*/
function delete_perso($conn, $id){
	$sql="DELETE FROM `Personnage` WHERE `id`=$id" ;
	$ret=mysqli_query($conn, $sql) ;
	return $ret ; 
}

/*Modifier un personnage*/ 
function update_perso($conn, $url_image, $nom, $couleur){
	$sql="UPDATE `Personnage` SET `url_image`='$url_image',`nom`='$nom', `couleur`='$couleur'  WHERE id = $id" ; 
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return $res ; 
}

/*Selectionner un personnage*/ 
function select_perso($conn, $id){
	$sql="SELECT * FROM `Personnage` WHERE id=$id" ; 
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab($res) ;
	return $tab[0] ;
}

/*Liste de tous les personnages*/ 
function list_etudiant($conn){
	$sql="SELECT * FROM `Personnage`"; 
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return rs_to_tab($res) ;
}


/*---------------------------------------
CRUD: Gestion des dialogues
---------------------------------------*/
$result = mysqli_query($conn , "select * from dialogue");

/*Créer un personnage*/ 
/*function create_dialogue($conn, $id, $id_histoire, $id_personnage,$id_suite_dialogue_1,$id_suite_dialogue_2,$id_suite_dialogue_3,$dé){
	$sql="INSERT INTO `dialogue`(`id`, `id_histoire`, `id_personnage`,`id_suite_dialogue_1`,`id_suite_dialogue_2`,`id_suite_dialogue_3`,`dé`) value('$id', '$id_histoire', '$id_personnage','$id_suite_dialogue_1','$id_suite_dialogue_2','$id_suite_dialogue_3','$dé')";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return $res ;	
}
*/















function rs_to_tab($rs){
	$tab=[] ; 
	while($row=mysqli_fetch_assoc($rs)){
		$tab[]=$row ;	
	}
	return $tab;
}
