<?php
session_start();
if(!isset($_SESSION["email"])){
    header('Location:../index.php');
}

if(isset($_POST["ajouter-formateur"])){

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
        $req = "INSERT INTO formateurs (
            nom_formateur,
            prenom_formateur,
            avatar_formateur,
            date_naissance_formateur,
            telephone_formateur,
            email_formateur,
            age_formateur,
            matiere_formateur) VALUES (?,?,?,?,?,?,?,?)";

        $insert = $connexion->prepare($req);
        $insert->bindParam(1,$_POST["nom"]);
        $insert->bindParam(2,$_POST["prenom"]);
        $insert->bindParam(3,$_POST["avatar"]);
        $insert->bindParam(4,$_POST["date-naissance"]);
        $insert->bindParam(5,$_POST["telephone"]);
        $insert->bindParam(6,$_POST["email"]);
        $insert->bindParam(7,$_POST["age"]);
        $insert->bindParam(8,$_POST["matiere"]);
        $insert->execute();
        if($insert){
            header('Location:formateurs.php');
        }
        else{
            echo "Erreur lors de l'ajout du formateur";
        }
    }
    else{
        echo "erreur";
    }

}else{
    echo "une erreur";
}