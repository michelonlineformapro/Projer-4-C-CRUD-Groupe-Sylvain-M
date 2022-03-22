<?php
session_start();
if (!isset($_SESSION["email"])) {
    header('Location:../index.php');
}
if(isset($_POST["deconnecte"])){
    deconnexion();
}
function deconnexion(){
    session_unset();
    session_destroy();
    header('Location:index.php');
}

// On se connecte à la base de données
$user = "root";
$pass = "";

try {
    $connexion = new PDO('mysql:host=localhost;dbname=ecommerce;charset=UTF8', $user, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $retour = $e->getMessage();
    die();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>Formateurs</title>
</head>
<body>

</body>
</html>
