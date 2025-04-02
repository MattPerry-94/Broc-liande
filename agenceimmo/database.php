<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=brocéliande;charset=utf8',
	'root',
	''
);

try{
    $database = new PDO('mysql:host=localhost;dbname=brocéliande', 'root', '');

}
catch(PDOException $e){
    die('Erreur : ' .$e->getMessage());
}