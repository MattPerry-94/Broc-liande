<?php

include_once("functions.php");
include_once("database.php");

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(
        isset($_POST["firstname"]) and
        $_POST["firstname"] != "" and
        isset($_POST["lastname"]) and
        $_POST["lastname"] != "" and
        isset($_POST["mail"]) and
        $_POST["mail"] != "" and
        isset($_POST["tel"]) and
        $_POST["tel"] != "" and
        isset($_POST["content"]) and
        $_POST["content"] != ""
    )
        {
            $firstname = htmlspecialchars($_POST["firstname"]);
            $lastname = htmlspecialchars($_POST["lastname"]);
            $mail = htmlspecialchars($_POST["mail"]);
            $tel = htmlspecialchars($_POST["tel"]); 
            $content = htmlspecialchars($_POST["content"]); 
            $result = send_contact($pdo,$firstname,$lastname,$mail,$tel,$content);
            if($result){
                echo("La demande a bien été transmise !");?><br>
                <?php
                echo('<a href="homepage.php">Retournez à la page principale</a>');
            
            }else{
                header("Location: contact.php");
           }
           
        }
}

?>
    





