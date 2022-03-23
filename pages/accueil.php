<?php
session_start();
if(isset($_SESSION['email'])){

}else{
    header("Location: ../index.php");
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

    <title>Accueil</title>
</head>
<body>
<header>
    <?php
    require_once "menu.php";
    ?>

</header>
<div class="container">
    <h3 class='text-center text-info'>Bienvenue <?= $_SESSION['email']?></h3>
    <div class="row bg-dark">
        <div class="col-md-4 col-sm-12 text-center p-5">
            <h4 class="text-success">
                ETUDIANTS
            </h4>
            <a href="etudiants.php" class="btn btn-success">CONSULTER</a>
        </div>

        <div class="col-md-4 col-sm-12 text-center p-5">
            <h4 class="text-warning">
               FORMATEURS
            </h4>
            <a href="formateurs.php" class="btn btn-warning">CONSULTER</a>
        </div>

        <div class="col-md-4 col-sm-12 text-center p-5">
            <h4 class="text-danger">
                ADMINISTRATEURS
            </h4>
            <a href="" class="btn btn-danger">CONSULTER</a>
        </div>
    </div>
</div>

</body>
</html>
