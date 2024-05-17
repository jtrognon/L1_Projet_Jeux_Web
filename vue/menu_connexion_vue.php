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
	</head>

	<body>
	<h1>Page de connexion</h1>
	<a href="connexion_vue.php" >J'ai un compte</a> </br>
	<a href="inscription_vue.php" >Je souhaite m'inscrire</a> </br>
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