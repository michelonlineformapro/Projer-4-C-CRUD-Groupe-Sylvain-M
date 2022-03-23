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

try{
    $connexion = new PDO('mysql:host=localhost;dbname=ecommerce;charset=UTF8',$user,$pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    $retour = $e->getMessage();
    die();
}
if($connexion) {
    $id = $_GET["id-formateur"];
    $req = "SELECT * FROM formateurs WHERE id_formateur= ?";
    $select = $connexion->prepare($req);
    $select->bindParam(1,$id);
    $select->execute();
    $res = $select->fetch(PDO::FETCH_ASSOC);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>Détails profil de <?= $res["prenom_formateur"]; ?></title>
</head>
<body>
<div class="container">
    <div class="menu">
        <a class="btn btn-primary ajout" href="ajouter-formateur.php">Ajouter un formateur</a>
        <form action="accueil.php" method="post">
            <button type="submit" class="btn btn-dark" name="deconnexion" id="btn-deco">Déconnexion</button>
        </form>
    </div>
    <div class="row">
        <?php $date = new DateTime($res["date_naissance_formateur"]); ?>
        <h1><?= $res["prenom_formateur"]. " " .strtoupper($res["nom_formateur"]); ?></h1>
        <hr>
        <h2 class="text-center"><?= $res["matiere_formateur"]; ?></h2>
        <img src="<?= $res["avatar_formateur"] ?>" />
        <p>Né le <?= $date->format("d-m-Y")." (<strong>" .$res["age_formateur"] . "ans</strong>)"; ?></p>
        <p>Joignable au <strong><?= $res["telephone_formateur"] ?></strong></p>
        <p>Adresse email : <?= $res["email_formateur"]; ?></p>
        

    </div>
</div>
</body>
</html>
