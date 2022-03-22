<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<?php
//Connexionn a MysQl via la classe PDO

$user = "root";
$pass = "";
$dbname = "ecommerce";
$host = "localhost";

try {

    $db = new PDO("mysql:host=" . $host . ";dbname=" . $dbname . ";charset=UTF8", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion a PDO MYSQL";

} catch (PDOException $exception) {
    echo "Erreur " . $exception->getMessage();
    die();
}

//requet sql
$sql = "SELECT * FROM `etudiants`";
$etudiants = $db->query($sql);


?>
<div class="container"></div>
    <div class="row">
        <?php
        foreach ($etudiants as $etudiant){
            ?>
            <div class="col-md-4 col-sm-12">
                <h4 class="text-info"><?= $etudiant['nom_etudiant'] ?> <?= $etudiant['prenom_etudiant'] ?></h4>

            </div>
        <?php
        }
?>

    </div>


?>
</body>
</html>
