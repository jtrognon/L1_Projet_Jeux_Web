<?php

// affichage des erreurs
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("db/db_connect.php");

include("lib/global/global_fct.php");

is_connected();
?>