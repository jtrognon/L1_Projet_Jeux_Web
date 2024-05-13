<?php
session_start();
// affichage des erreurs
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("/home/grp1/public_html/db/db_connect.php");
include("/home/grp1/public_html/CRUD/CRUD_connexion.php");
include("/home/grp1/public_html/lib/global/global_fct_lib.php");

if (!isset($redirection)){
    $redirection = true;
}

is_connected($conn, $redirection);


if(isset($_GET["action"])){
	$action=$_GET["action"] ;
	if($action=="disconnect"){
		unset($_SESSION["action"]);
		unset($_SESSION["id_user"]);
	}
}

?>