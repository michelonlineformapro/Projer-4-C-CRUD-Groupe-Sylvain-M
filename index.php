<?php
session_start();

//Connexionn a MysQl via la classe PDO

$user = "root";
$pass = "";
$dbname = "ecommerce";
$host = "localhost";

try {

    $db = new PDO("mysql:host=".$host.";dbname=".$dbname.";charset=UTF8", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion a PDO MYSQL";

}catch (PDOException $exception){
    echo "Erreur " . $exception->getMessage();
    die();
}


