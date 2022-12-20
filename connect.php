<?php

try{
    //connexion à la base
    $db = new PDO('mysql:host=localhost;dbname=evaluation_crud', 'root', '');
    $db->exec('SET NAMES "UTF8"');
} catch(PDOException $e){
    echo 'Erreur : ' . $e->getMessage();
    die();
}

?>