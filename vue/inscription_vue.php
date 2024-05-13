<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include("../db/db_connect.php");
include("../CRUD/CRUD_connexion.php")

?>
<html>
	<head>
	<meta charset="UTF-8">
	</head>

	<body>
	

		<form method="post" action="menu_connexion_vue.php">
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

<?php

if (isset($_POST["login"]) && isset($_POST["mdp"])){
	ajout_utilisateur($conn,$_POST["login"],$_POST["mdp"]);
}	
?>
