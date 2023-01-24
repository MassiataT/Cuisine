<?php
session_start(); // permet d'accéder à $_SESSION
$isConnected = $_SESSION['isConnected'] ?? false;
$css = "../../CSS/formulaires.css";
include "./m_connexion.php";

if (isset($_POST['email']) && isset($_POST['pwd'])) {
    $connexion = new Connexion($_POST['email'], $_POST['pwd']);
    $connexion->connect_to_db();
    $check_user = $connexion->checkUser();
    if ($check_user->rowCount() == 1) {
        $row = $check_user->fetch();
        if ($_POST['pwd'] == $row['password']) {
            $_SESSION['isConnected'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['birthday'] = $row['birthday'];
            $_SESSION['nickname'] = $row['nickname'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['registration_date'] = $row['registration_date'];
            header('Location: ../../index.php');
            exit();
        } else {
            $erreur = "Le mot de passe ne correspond pas au pseudo !";
        }
    } else {
        $erreur = "Le pseudo saisi n'existe pas dans notre base de donnée !";
    }
}

include "../../header.php";
include "./v_connexion.php";
include "../../footer.php";
