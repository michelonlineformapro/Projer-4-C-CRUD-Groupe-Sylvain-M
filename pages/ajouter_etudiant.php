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

    <form method="post">

        <form action="traitement_ajouter_etudiant.php"  id="form-login" method="post" enctype="multipart/form-data">
            <div class="text-center">
                <img src="../../assets/img/Onlineformapro.jpg" alt="logo online" title="Onlineformapro.com">
            </div>
            <div class="mb-3">
                <label for="nom_etudiant" class="form-label">Nom étudiants</label>
                <input type="text" class="form-control" id="nom_etudiant" name="nom_etudiant" required>
            </div>

            <div class="mb-3">
                <label for="pernom_etudiant" class="form-label">Prenom étudiants</label>
                <input type="text" class="form-control" id="prenom_etudiant" name="prenom_etudiant" required>
            </div>

            <div class="mb-3">
                <label for="image_produit" class="form-label">Avatar</label>
                <input type="file" class="form-control" id="image_produit" name="avatar_etudiant" required>
            </div>

            <div class="mb-3">
                <label for="date_depot" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="date_depot" name="date_naissance_etudiant" required>
            </div>

            <div class="mb-3">
                <label for="telephone_etudiant" class="form-label">Téléphone</label>
                <input type="text"  class="form-control" id="telephone_etudiant" name="telephone_etudiant" required>
            </div>

            <div class="mb-3">
                <label for="email_etudiant" class="form-label">Email</label>
                <input type="email" class="form-control"  id="email_etudiant" name="email_etudiant" required>
            </div>
            <div class="mb-3">
                <label for="age_etudiant" class="form-label">age</label>
                <input type="number" step="0.01" class="form-control" id="age_etudiant" name="age_etudiant" required>
            </div>

            <div class="mb-3">
                <label for="prix_produit" class="form-label">Nom de la formation</label>
                <input type="text" step="0.01" class="form-control" id="prix_produit" name="formation" required>
            </div>

            <div class="mb-3">
                <label for="stock_produit" class="form-label">Bacalauréat</label>
                <select class="form-control" name="bac_etudiant" id="bac_etudiant" required>
                    <option value="0">OUI</option>
                    <option value="1">NON</option>
                </select>
            </div>

            <div class="d-flex justify-content-around">
                <button type="submit" name="btn-connexion" class="btn btn-warning">Ajouter</button>
                <a href="../accueil.php" class="btn btn-success">Annuler</a>
            </div>
        </form>

    </form>



    </body>
    </html>

<?php
}else{
    header("Location: ../index.php");
}