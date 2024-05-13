<?php


if (isset($_GET["json"]) && isset($_GET["user_id"])){
    $data = $_GET["json"];
    
    header("Content-Type: application/json; charset=utf-8");

    echo($data);
}

?>