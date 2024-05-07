<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include("../db/db_connect.php");

?>
<html>
	<head>
	<meta charset="UTF-8">
	</head>
<?php

?>
	<body>
        

		<form method="post" action="menu_connexion_vue.php">
		<table class='table_2'>
			<tr >
				<td> <h2> Inscription </h2> </td>
			</tr>   
			<tr>
				<td class="formulaire"> Nom d'utilisateur <input type="text" name = "addNomUti"> </td>
			</tr>
			<tr >
				<td class="formulaire">	Mot de passe <input type="text" name = "addMdp"> </td>
			</tr>
			<tr>
				<td> <input type="submit" value="S'inscrire"> </td>
			</tr>

			
			
		</table>

	</form>
	</body>

</html>
<?php
?>