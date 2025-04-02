<?php
include_once("functions.php");
include_once("database.php");

if($_SERVER['REQUEST_METHOD'] === 'POST'){ 
    if(
        isset($_POST["id"]) and
        !empty($_POST["id"]) 
    ){ 
            $id = $_POST["id"];
            $result = delete_annonce_rent($pdo, $id);
            header("Location: admin.php");
    }
}