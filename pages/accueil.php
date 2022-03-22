<?php
session_start();
if(isset($_SESSION['email'])){
    echo "Bienvenue " . $_SESSION['email'];
}else{
    header("Location: ../index.php");
}