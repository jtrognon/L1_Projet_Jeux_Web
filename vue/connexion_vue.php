<?php
$redirection = false;
session_start();
include(__DIR__."/../db/db_connect.php");
include(__DIR__."/../lib/global/header.php");

if(isset($_POST["login"])){
	$mdp = mdp_connexion($conn, $_POST["login"]); // select_mdp à faire
	if($_POST["passwd"]!= null
	&& $_POST["passwd"]==$mdp){
		
		/* session admin */
		$id = id_connexion($conn, $_POST["login"]); //requete
		$admi = admin_connexion($conn,$_POST["login"]);
		$_SESSION["id_user"] = $id;
		$_SESSION["admin"] = $admi ;
		header("Location: /index.php"); 
	}
}

?>
<html>
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style_connexion.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">

	<title>Connexion</title>
	</head>

	<body>
	<div class = "div_connexion">
		<h1>Connexion</h1>
		<form method="POST" action="">
			Pseudo:<input type="text" name="login">
			<br>
			Mot de passe:<input type="password" name="passwd">
			<br>
			<input type="submit" value="Connexion" id="bouton_connexion">
		</form>

		<a href="menu_connexion_vue.php" >Retour</a> 
		</br>
	</div>
	</body>
</html>