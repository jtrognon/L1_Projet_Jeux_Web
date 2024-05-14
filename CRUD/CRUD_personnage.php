<?php

$debeug=False ; 

$result = mysqli_query($conn , "select * from Personnage");

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
	$sql="DELETE FROM `Personnage` WHERE `id`='$id'" ;
	$ret=mysqli_query($conn, $sql) ;
	return $ret ; 
}

/*Modifier un personnage*/ 
function update_perso($conn, $id,$url_image, $nom, $couleur){
	$sql="UPDATE `Personnage` SET `url_image`='$url_image',`nom`='$nom', `couleur`='$couleur'  WHERE `id`=$id" ; 
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return $res ; 
}

/*Selectionner un personnage*/ 
function select_perso($conn, $id){
	$sql="SELECT * FROM `Personnage` WHERE `id`='$id' " ; 
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	$tab=rs_to_tab_personnage($res) ;
	return $tab ;
}

/*Liste de tous les personnages*/ 
function list_perso($conn){
	$sql="SELECT * FROM `Personnage`"; 
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return rs_to_tab_personnage($res) ;
}

function rs_to_tab_personnage($rs){
	$tab=[] ; 
	while($row=mysqli_fetch_assoc($rs)){
		$tab[]=$row ;	
	}
	return $tab;
}

?>