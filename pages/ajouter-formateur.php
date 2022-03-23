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
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>Ajouter un formateur</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Ajouter un formateur</h1>
        <hr>
        <form method="post" action="traitement-ajout-formateur.php" enctype="multipart/form-data">
            <label for="nom">Nom :</label><br>
            <input type="text" name="nom" id="nom"><br><br>

            <label for="prenom">Prénom :</label><br>
            <input type="text" name="prenom" id="prenom"><br><br>

            <label for="avatar">Avatar :</label><br>
            <input type="file" name="avatar" id="avatar" class="long"><br><br>

            <label for="date-naissance">Date de naissance :</label><br>
            <input type="text" name="date-naissance" id="date-naissance"><br><br>

            <label for="telephone">Téléphone :</label><br>
            <input type="tel" name="telephone" id="telephone"><br><br>

            <label for="email">Email :</label><br>
            <input type="email" name="email" id="email"><br><br>

            <label for="age">Age :</label><br>
            <input type="number" name="age" id="age" class="small"><br><br>

            <label for="matiere">Matière enseignée :</label><br>
            <input type="text" name="matiere" id="matiere" class="long"><br><br>

            <button type="submit" class="btn btn-primary" name="ajouter-formateur">Ajouter le formateur</button>
        </form>
    </div>
</div>
</body>
</html>

