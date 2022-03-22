<?php
session_start();
if(isset($_SESSION['email'])){
    echo "Bienvenue " . $_SESSION['email'];
    ?>
        <a href="etudiants.php" class="btn btn-info">Liste des etudiants</a>
    <?php
}else{
    header("Location: ../index.php");
}