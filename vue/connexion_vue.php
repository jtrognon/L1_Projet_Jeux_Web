<?php
session_start() ;
include("db/db_connect.php");
include("../lib/connexion_lib.php");

?>
<html>
	<head>
	<meta charset="UTF-8">
	</head>

	<body>
	<form method="POST" action="">
	Login:	<input type="text" name="login">
	Passwd:	<input type="text" name="passwd">
		<input type="submit">
	</form>

	<h1> Lien vers page de Rania </h1>

	</body>
</html>