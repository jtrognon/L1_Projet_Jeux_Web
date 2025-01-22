<?php
session_start();
// affichage des erreurs
error_reporting(E_ALL);
ini_set('display_errors', '1');

include(__DIR__."/../../db/db_connect.php");
include(__DIR__."/../../CRUD/CRUD_connexion.php");
include(__DIR__."/../../lib/global/global_fct_lib.php");

is_admin();


if(isset($_GET["action"])){
	$action=$_GET["action"] ;
	if($action=="disconnect"){
		unset($_SESSION["action"]);
		unset($_SESSION["id_user"]);
	}
}

?>