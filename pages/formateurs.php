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
if($connexion){
$req = "SELECT * FROM formateurs";
$formateurs = $connexion->query($req);

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
<div class="container">
    <div class="menu">
        <a class="btn btn-primary ajout" href="ajouter-formateur.php">Ajouter un formateur</a>
        <form action="../index.php" method="post">
            <button type="submit" class="btn btn-dark" name="deconnexion" id="btn-deco">Déconnexion</button>
        </form>
    </div>
    <div class="row-formateurs">
        <h1>Gestion des formateurs</h1>
        <div class="formateurs">
            <?php
                foreach($formateurs as $formateur){ ?>
                    <div class="formateur">
                        <h2><?= $formateur["prenom_formateur"]. " ".strtoupper($formateur["nom_formateur"]); ?></h2>
                        <hr>
                        <p><?= $formateur["email_formateur"]; ?></p>
                        <a class="btn btn-primary" href="editer-formateur.php?id-formateur=<?= $formateur["id_formateur"]; ?>">Modifier</a>
                        <a class="btn btn-danger" href="supprimer-formateur.php?id-formateur=<?= $formateur["id_formateur"]; ?>">Supprimer</a>
                        <a class="btn btn-dark" href="details-formateur.php?id-formateur=<?= $formateur["id_formateur"]; ?>">Détails</a>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
