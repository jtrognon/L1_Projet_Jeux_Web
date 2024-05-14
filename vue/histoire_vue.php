<?php
session_start();
include("../lib/global/header.php");
?>
<html>
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	</head>
<body>
    <h1> Page d'histoire </h1>

	<table class="barre_menu">
		<thead>
			<tr>
				<th><a href="">Profil</a></th>
				<th><a href="">Aide</a></th>
				<th><a href="menu_vue.php">Menu</a></th>
			</tr>
		</thead>
	</table>

	<div class="onglet_histoire">
		<div class="box box_affichage_personnage">Box_affichage_personnage</div>
		<div class="box box_affichage_dialogues">Box_affichage_dialogues</div>
		<div class="box box_choix_dialogue">Box_choix_dialogue</div>
		<div class="box box_affichage_dé">Box_affichage_dé</div>
	</div>
	
	<a href="menu_connexion_vue.php?action=disconnect">Deconnexion</a>
</body>

</html>