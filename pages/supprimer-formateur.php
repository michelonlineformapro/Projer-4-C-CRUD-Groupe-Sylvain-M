<?php
session_start();
if(!isset($_SESSION["email"])){
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

$user = "root";
$pass = "";
$id = $_GET["id-formateur"];

try{
    $connexion = new PDO('mysql:host=localhost;dbname=ecommerce;charset=UTF8',$user,$pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    $retour = $e->getMessage();
    die();
}
$req = "SELECT * FROM formateurs WHERE id_formateur = ?";
$sth = $connexion->prepare($req);
$sth->bindParam(1, $id);
$sth->execute();
$res = $sth->fetch(PDO::FETCH_ASSOC);

if(isset($_POST["suppression"])){
    $requette = "DELETE FROM formateurs WHERE id_formateur = ?";
    $del = $connexion->prepare($requette);
    $del->bindParam(1, $id);
    $del->execute();
    if($del){
        echo "<p class='alert alert-success'>Formateur bien supprimé !</p>";
        echo "<a href='formateurs.php'>Retour</a>";
    }else{
        echo "<p class='alert alert-danger'>Erreur lors de la supression du formateur !</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <title>Supprimer un formateur</title>
</head>
<body>
    <div class="container">
        <h1>SUPPRIMER UN FORMATEUR</h1>
        <p style="color:#000000;">Vous êtes sur le point de supprimer le formateur : <strong><?= $res["prenom_formateur"] ?></strong></p>
        <form method="post">
            <button class="btn btn-danger" type="submit" name="suppression">CONFIRMER</button>
        </form>
    </div>
</body>
</html>