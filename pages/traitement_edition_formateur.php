<?php session_start();
if(!isset($_SESSION["email"])){
    header('Location:../index.php');
}

if(isset($_POST["deconnecte"])){
    deconnexion();
}
function deconnexion(){
    session_unset();
    session_destroy();
    header('Location:../index.php');
}

// On se connecte à la base de données
$id= $_GET["id"];
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
    $req = "UPDATE `formateurs` SET
        `nom_formateur` = ?,
        `prenom_formateur` = ?,
        `avatar_formateur` = ?,
        `date_naissance_formateur` = ?,
        `telephone_formateur` = ?,
        `email_formateur` = ?,
        `age_formateur`= ?,
        `matiere_formateur` = ?
        WHERE `id_formateur` = ?";
    $update = $connexion->prepare($req);


    $update->execute(array(
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["avatar"],
        $_POST["date-naissance"],
        $_POST["telephone"],
        $_POST["email"],
        $_POST["age"],
        $_POST["matiere"],
        $id
    ));

    if($update){
        header('Location:formateurs.php');
    }
    else{
        echo "Erreur lors de la modification";
    }
}


?>