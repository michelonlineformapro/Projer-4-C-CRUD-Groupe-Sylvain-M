
<?php
//Demarrer la session php
session_start();

if(isset($_SESSION["email"])){
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
    <div class="container-fluid">
            <span class="mt-3 d-flex justify-content-around">
                <h3 class="mt-3 text-warning">BIENVENUE <?= $_SESSION['email'] ?></h3>
                <form method="post">
                    <div class="d-flex justify-content-center">
                        <button id="btn-deconnexion" name="btn-deconnexion" class="btn btn-danger">DECONNEXION</button>
                        <a href="inscription.php" class="mx-3 btn btn-info">Ajouter un administrateur</a>
                    </div>

                </form>
            </span>


        <?php
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

        if($dbh){
            //ATTENTION A CHAQUE REDIRECTION VERS LA PAGE PRODUITS on ajoute ?page=1



            //Requète SQL de selection des produits avec une limte et un point de depart = OFFSET
            $sql = "SELECT * FROM etudiants";
            //Grace a PDO on accède à la methode query()
            //PDO::query() prépare et exécute une requête SQL en un seul appel de fonction, retournant la requête en tant qu'objet PDOStatement. (etat des sonnées)
            //PDOStatement = Représente une requête préparée et, une fois exécutée, le jeu de résultats associé.
            $statement = $dbh->query($sql);

            ?>
            <?php
        }

        ?>

        <div class="container">
            <div class="text-center">
                <a href="ajouter_etudiant.php" class="mt-3 btn btn-outline-secondary">Ajouter un etudiants</a>
            </div>

            <h4 class="mt-3 text-warning">Liste des etudiants</h4>

            <div class="row">
                <!--Pour chaque col on affiche une ligne de la table produits de la BDD ecommerce-->
                <?php
                foreach ($statement as $etudiants){
                    $date_depot = new DateTime($etudiants['date_naissance_etudiant']);
                    ?>
                    <div class="col-sm-12 col-lg-4 mt-5">
                        <div class="card">
                            <div class="text-center">
                                <h4 class="card-title text-info"><?= $etudiants['nom_etudiant'] ?></h4>
                                <h5 class="card-title text-info"><?= $etudiants['prenom_etudiant'] ?></h5>
                                <img src="<?= $etudiants['avatar_etudiant'] ?>" class="card-img-top img-fluid img-etudiant" alt="<?= $etudiants['prenom_etudiant'] ?>" title="<?= $etudiants['prenom_etudiant'] ?>">
                            </div>

                            <div class="card-body">

                                <p class="card-text">Téléphone : <?= $etudiants['telephone_etudiant'] ?></p>
                                <p class="card-text text-success fw-bold">email : <?= $etudiants['email_etudiant'] ?> €</p>
                                <p class="card-text">Bacalauréat :
                                    <?php
                                    //var_dump($etudiants['stock_produit']);
                                    if($etudiants['bac_etudiant'] == true){
                                        echo "OUI";
                                    }else{
                                        echo "NON";
                                    }
                                    ?>
                                </p>

                                <em class="card-text">Date de naissance : <?= $date_depot->format('d-m-Y') ?></em>
                                <br />
                                <div class="container-fluid d-flex justify-content-center">

                                    <a href="details_etudiant.php?etudiant=<?= $etudiants['id_etudiant'] ?>" class="mt-2 btn btn-success mx-2">Détails</a>
                                    <a href="editer_etudiant.php?etudiant=<?= $etudiants['id_etudiant'] ?>" class="mt-2 btn btn-info mx-2">Editer</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
    </body>
    </html>


    <?php
    //Deconnexion et destruction de la session $_SESSION['email']
    function deconnexion(){
        session_unset();
        session_destroy();
        header('Location: ../index.php');
    }

    //Click sur le bouton de deconnexion
    if(isset($_POST['btn-deconnexion'])){
        deconnexion();
    }

}else{
    echo "<a href='' class='btn btn-warning'>S'inscrire</a>";
    header('Location: ../index.php');
}


