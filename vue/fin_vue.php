<?php
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
		<link rel="stylesheet" href="css/style_fin_vu.css">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
		<title>Fin d'histoire</title>
	</head>

	<body id="body_fin">
		<div class="texte_fin">
			<p id="texte_de_fin"> Vos choix étaient-ils judicieux ou désastreux?<br> Le moment est passé, les dés sont déjà jetés...<br> Quelle que soit vôtre fin, l'aventure est désormais terminée.</p>
		</div>
		<div class="bouton_fin">
			<a id="bouton_de_fin" href="../index.php">Retour au menu</a>
		</div>
		
	</body>

	
</html>
