<?php
session_start();
include("../lib/global/header.php");
include("../lib/fonction_histoire.php");
include("/home/grp1/public_html/CRUD/CRUD_progression.php");
include("/home/grp1/public_html/CRUD/CRUD_dialogue.php");
include("/home/grp1/public_html/CRUD/CRUD_personnage.php");
?>
<html>
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style_fin_vue.css">
	</head>

<body id="Fin_Vue">
    <h1> Page de Fin </h1>
	<h2> Vous avez finit cette histoire !!! ^o^</h2>
	<a href="../index.php">Retour au menu</a>
</body>
</html>