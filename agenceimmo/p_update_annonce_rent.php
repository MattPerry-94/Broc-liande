<?php
include_once("functions.php");
include_once("database.php");

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(
        
        isset($_POST["title_1"]) and
        !empty($_POST["title_1"] )  and
        isset($_POST["image_1"]) and
        !empty($_POST["image_1"] ) and
        isset($_POST["content_1"]) and
        !empty($_POST["content_1"]) and
        isset($_POST["space_1"]) and
        !empty($_POST["space_1"]) and
        isset($_POST["price_1"]) and
        !empty($_POST["price_1"]) 
        
    ){

        $id = htmlspecialchars($_POST["id"]); 
        $title_1 = htmlspecialchars($_POST["title_1"]);
        $image_1 = htmlspecialchars($_POST["image_1"]);
        $content_1 = htmlspecialchars($_POST["content_1"]);
        $space_1 = htmlspecialchars($_POST["space_1"]);
        $price_1 = htmlspecialchars($_POST["price_1"]);
        
        $result = update_annonce_rent($pdo, $id, $title_1, $content_1, $image_1, $space_1, $price_1);

        header("Location: admin.php");
    }
}