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

    <title>Accueil</title>
</head>
<body>
<form method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" name="btn-connexion" class="btn btn-primary">Submit</button>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php
if(isset($_POST['btn-connexion'])){
    connexion();
}


function connexion()
{
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

    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
        //sanitize = desinfecter les champs
        $emailUser = trim(htmlspecialchars($_POST['email']));
        $passwordUser = trim(htmlspecialchars($_POST['password']));

        //requète SQL
        $sql = "SELECT * FROM utilisateurs WHERE email_user = ? && pass_user = ?";

        $connexion = $db->prepare($sql);
        $connexion->bindParam(1, $emailUser);
        $connexion->bindParam(2, $passwordUser);

        $connexion->execute();

        if($connexion->rowCount() >= 0){
            $ligne = $connexion->fetch();
            if($ligne){
                $email = $ligne['email_user'];
                $password = $ligne['pass_user'];

                if($emailUser === $email && $passwordUser === $password){
                    $_SESSION['email'] = $emailUser;
                    header("Location: pages/accueil.php");
                }else{
                    echo "Merci de verifié votre email + mot de passe";
                }

            }else{
                echo "pas d'utilisateur dans la table phpmyadmin";
            }
        }else{
            echo "pas d'utilisateur dans la table phpmyadmin";
        }

    }else{
        echo "merci de remplir tous les champs";
    }
}
?>




</body>
</html>


