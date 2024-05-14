<?php
$redirection = false;
session_start();
include("../lib/global/header.php");


?>
<html>
	<head>
	<meta charset="UTF-8">
	</head>

	<body>
	

		<form method="POST" action="menu_connexion_vue.php">
		<table class='table_2'>
			<tr >
				<td> <h2> Inscription </h2> </td>
			</tr>   
			<tr>
				<td class="formulaire"> Nom d'utilisateur <input type="text" name = "login"> </td>
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

</html>