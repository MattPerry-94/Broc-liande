<?php
include_once("functions.php");
include_once("database.php");

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(
        
        isset($_POST["title_2"]) and
        !empty($_POST["title_2"] )  and
        isset($_POST["image_2"]) and
        !empty($_POST["image_2"] ) and
        isset($_POST["content_2"]) and
        !empty($_POST["content_2"]) and
        isset($_POST["space_2"]) and
        !empty($_POST["space_2"]) and
        isset($_POST["price_2"]) and
        !empty($_POST["price_2"]) 
        
        ){
            $id = htmlspecialchars($_POST["id"]); 
            $title_2 = htmlspecialchars($_POST["title_2"]);
            $image_2 = htmlspecialchars($_POST["image_2"]);
            $content_2 = htmlspecialchars($_POST["content_2"]);
            $space_2 = htmlspecialchars($_POST["space_2"]);
            $price_2 = htmlspecialchars($_POST["price_2"]);
        
            $result = update_annonce_sale($pdo, $id, $title_2, $content_2, $space_2, $image_2,  $price_2);

            header("Location: admin.php");
        }
}