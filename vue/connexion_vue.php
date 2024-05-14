<?php
$redirection = false;
session_start();
include("../db/db_connect.php");
include("../lib/global/header.php");

if(isset($_POST["login"])){
	$mdp = mdp_connexion($conn, $_POST["login"]); // select_mdp à faire
	if($_POST["passwd"]!= null
	&& $_POST["passwd"]==$mdp){
		
		/* session admin */
		$id = id_connexion($conn, $_POST["login"]); //requete
		$_SESSION["id_user"]=$id; # à conditionner
		print($_SESSION["id_user"]);
		header("Location: /~grp1/vue/menu_vue.php"); 
	}
}

?>
<html>
	<head>
	<meta charset="UTF-8">
	</head>

	<body>
	<form method="POST" action="">
	Login:	<input type="text" name="login">
	Passwd:	<input type="text" name="passwd">
		<input type="submit">
	</form>

	<a href="menu_connexion_vue.php" >Retour</a> </br>

	</body>
</html>