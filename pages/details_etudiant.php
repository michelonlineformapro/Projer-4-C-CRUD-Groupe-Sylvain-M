
<?php
//Demarrer la session php
session_start();

if(isset($_SESSION["email"])){


    //Connexion a la base de donnée ecommerce via PDO
    //Les variable de phpmyadmin
    $user = "root";
    $pass = "";
    //test d'erreur
    try {
        /*
         * PHP Data Objects est une extension définissant l'interface pour accéder à une base de données avec PHP. Elle est orientée objet, la classe s’appelant PDO.
         */
        //Instance de la classe PDO (Php Data Object)
        $dbh = new PDO('mysql:host=localhost;dbname=ecommerce;charset=UTF8', $user, $pass);
        //Debug de pdo
        /*
         * L'opérateur de résolution de portée (aussi appelé Paamayim Nekudotayim) ou, en termes plus simples,
         * le symbole "double deux-points" (::), fournit un moyen d'accéder aux membres static ou constant, ainsi qu'aux propriétés ou méthodes surchargées d'une classe.
         */
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p class='container alert alert-success text-center'>Vous êtes connectez a PDO MySQL</p>";

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

        ?>
    <!doctype html>
    <html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/mic_styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <title>PHP CRUD ETUDIANTS</title>
    </head>
<body>
<header>
    <?php
    require_once "menu.php";
    ?>
</header>
<?php
    $sql = "SELECT * FROM etudiants WHERE id_etudiant = ?";

    $details = $dbh->prepare($sql);
    $id = $_GET['etudiant'];

    $details->bindParam(1, $id);
    $details->execute();

    $details_etudiant = $details->fetch();
?>
<div id="details">
    <h2 class="text-center text-info"><?= $details_etudiant['nom_etudiant'] ?></h2>
    <h2 class="text-center text-info"><?= $details_etudiant['prenom_etudiant'] ?></h2>
</div>


<form method="post">
    <button class="btn btn-danger" name="btn-supprimer">
        Supprimer <?= $details_etudiant['nom_etudiant'] .$details_etudiant['prenom_etudiant'] ?>
    </button>
</form>

</body>
    </html>
    <?php
    if(isset($_POST['btn-supprimer'])){
        $sql = "DELETE FROM etudiants WHERE id_etudiant = ?";
        $id = $_GET['etudiant'];
        $delete = $dbh->prepare($sql);
        $delete->bindParam(1, $id);
        $delete->execute();

        if($delete){
            echo "Votre etudiant a été supprimer";
            echo "<a href='etudiants.php' class='btn btn-warning'>Retour</a>";

               ?>
                <style>
                    #details{
                        display: none;
                    }
                </style>
<?php
        }
    }




}else{
    header("Location: ../index.php");
}