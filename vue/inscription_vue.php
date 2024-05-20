<?php
$redirection = false;
session_start();
include("../lib/global/header.php");


?>
<html>
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style_connexion.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">

	<title>Inscription</title>
	</head>

	<body>
	
	<div class = "div_connexion">			
		<h1> Inscription </h1>
		<form method="POST" action="menu_connexion_vue.php">

			Pseudo <input type="text" name = "login"> 
			<br>
			Mot de passe <input type="text" name = "mdp">
			<br>
			<input type="submit" value="S'inscrire" class="bouton_connexion"> 
		<br>
		<a href="menu_connexion_vue.php" >Retour</a> </br>
	</div>
	</form>
	</body>

</html>



<!--
<body>
	

	<form method="POST" action="menu_connexion_vue.php">
	<table class='table_2'>
		<tr >
			<td> <h2> Inscription </h2> </td>
		</tr>   
		<tr>
			<td class="formulaire"> Pseudo <input type="text" name = "login"> </td>
		</tr>
		<tr >
			<td class="formulaire">	Mot de passe <input type="text" name = "mdp"> </td>
		</tr>
		<tr>
			<td> <input type="submit" value="S'inscrire"> </td>
			
		</tr>

		
		
	</table>

	<a href="menu_connexion_vue.php" >Retour</a> </br>

</form>
</body>
-->