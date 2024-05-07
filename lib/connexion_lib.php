<?php
include("../CRUD/CRUD.php");

if(isset($_POST["login"])){
	$mdp = mdp_connexion($conn, $_POST["login"]); // select_mdp à faire
	if($_POST["passwd"]!= null
	&& $_POST["passwd"]==$mdp){
		
		/* session admin */
		$_SESSION["admin"]=time() ; 
		/* redirection */
		header("Location: page.php") ; 
	}
}

?>