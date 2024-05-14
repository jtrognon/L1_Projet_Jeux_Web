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
	<h1>Page de connexion</h1>
	<a href="connexion_vue.php" >J'ai un compte</a> </br>
	<a href="inscription_vue.php" >Je souhaite m'inscrire</a> </br>
	</body>

</html>

<?php
if (isset($_POST["login"]) && isset($_POST["mdp"])){

	ajout_utilisateur($conn,$_POST["login"],$_POST["mdp"]);
}
?>