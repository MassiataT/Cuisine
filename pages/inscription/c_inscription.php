<?php
session_start(); // permet d'accéder à $_SESSION
$isConnected = $_SESSION['isConnected'] ?? false;
$css = "../../CSS/formulaires.css";
include "./m_ajout_recette.php";

if (isset($_POST['submit'])) {
    $salt = $_POST["pwd"] . "vive le projet cookieasy";
    $pass = hash('ripemd160', $salt);
    $insert = new Inscription($_POST['nom'], $_POST['prenom'], $_POST['date_naissance'], $_POST['email'], $_POST['pseudo'], $pass);
    $insert->connect_to_db();
    if ($insert->do_user_exist()->rowCount() == 1) {
        $erreur = "Cete adresse mail est déjà utilisée";
    } else {
        if ($insert->do_nickname_exist()->rowCount() == 1) {
            $erreur = "Ce pseudo est déjà utilisé";
        } else {
            if ($_POST['pwd'] != $_POST['pwd_verif']) {
                $erreur = "Les mots de passes ne correspondent pas";
            } else {
                $insert->insertUser();
                $_SESSION['isConnected'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['birthday'] = $row['birthday'];
                $_SESSION['nickname'] = $row['nickname'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['registration_date'] = $row['registration_date'];
                header('Location: HomePage');
                exit();
            }
        }
    }
}

include "../../header.php";
include "./v_inscription.php";
include "../../footer.php";
