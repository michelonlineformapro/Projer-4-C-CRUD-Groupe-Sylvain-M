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

$id = $_GET["id-formateur"];

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

if($connexion){
    $req = "SELECT * FROM formateurs WHERE id_formateur = ?";
    $select = $connexion->prepare($req);
    $select->bindParam(1,$id);
    $select->execute();
    $res = $select->fetch();
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
    <title>Editer un formateur</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Editer un formateur</h1>
        <hr>
        <form method="post" action="traitement_edition_formateur.php?id=<?= $res["id_formateur"] ?>">
            <label for="nom">Nom :</label><br>
            <input type="text" name="nom" id="nom" value="<?= $res["nom_formateur"] ?>"><br><br>

            <label for="prenom">Prénom :</label><br>
            <input type="text" name="prenom" id="prenom" value="<?= $res["prenom_formateur"] ?>"><br><br>

            <label for="avatar">Avatar :</label><br>
            <input type="text" name="avatar" id="avatar" class="long" value="<?= $res["avatar_formateur"] ?>"><br><br>

            <label for="date-naissance">Date de naissance :</label><br>
            <input type="text" name="date-naissance" id="date-naissance" value="<?= $res["date_naissance_formateur"] ?>"><br><br>

            <label for="telephone">Téléphone :</label><br>
            <input type="tel" name="telephone" id="telephone" value="<?= $res["telephone_formateur"] ?>"><br><br>

            <label for="email">Email :</label><br>
            <input type="email" name="email" id="email" value="<?= $res["email_formateur"] ?>"><br><br>

            <label for="age">Age :</label><br>
            <input type="number" name="age" id="age" class="small" value="<?= $res["age_formateur"] ?>"><br><br>

            <label for="matiere">Matière enseignée :</label><br>
            <input type="text" name="matiere" id="matiere" class="long" value="<?= $res["matiere_formateur"] ?>"><br><br>

            <button type="submit" class="btn btn-primary" name="editer-formateur">Editer le formateur</button>
        </form>
    </div>
</div>
</body>
</html>
