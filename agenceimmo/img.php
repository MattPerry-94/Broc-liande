<?php

    require("database.php");

    if(isset($_FILES['file'])){
        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        $type = $_FILES['file']['type'];

        $tabExtension = explode('.',$name);
        $extension = strtolower(end($tabExtension));
         
        $extentionsAutorisees = ['jpg', 'jpeg', 'gif', 'png'];
        $tailleMax = 4000000;

        if(in_array($extension, $extentionsAutorisees) && $size <= $tailleMax && $error == 0){

            $uniqueName = uniqid('', true);
            $fileName = $uniqueName.'.'.$extension;
            move_uploaded_file($tmpName, './upload/'.$fileName);

            $req = $database->prepare('INSERT INTO file (name) VALUES (?)');
            $req->execute([$fileName]);

        }

        
    }