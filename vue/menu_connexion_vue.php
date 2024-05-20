<?php
$redirection = false;
session_start();
include("../lib/global/header.php");
include("/home/grp1/public_html/CRUD/CRUD_progression.php");
include("/home/grp1/public_html/CRUD/CRUD_dialogue.php");
include("/home/grp1/public_html/CRUD/CRUD_histoire.php");
include("../lib/progression/progression_lib.php");


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
		<h1>Bienvenue Joueur ! </h1>
		<br><br>
		<div>
				<a href="connexion_vue.php">Continuer l'aventure </a> 
		</div>
		<br><br><br>
		<div>
			<a href="inscription_vue.php">Rejoindre l'aventure</a>
		</div>


	</div>
	</body>

</html>

<?php
if (isset($_POST["login"]) && isset($_POST["mdp"])){

	ajout_utilisateur($conn,$_POST["login"],$_POST["mdp"]);
	$id_user = id_connexion_login_passwd($conn,$_POST["login"],$_POST["mdp"]);

	$liste_histoires = liste_histoire($conn);

	foreach ($liste_histoires as $histoire){
		init_progression_histoire($conn, $id_user, $histoire["id"]);
	}
}
?>