<?php
session_start(); // permet d'accéder à $_SESSION
$isConnected = $_SESSION['isConnected'] ?? false;
$css = "../../CSS/compte.css";
// $js = "../../jS/favoris.js";
include "./m_favoris.php";

$recette = new Favoris();
$recette->connect_to_db();

$favoris = $recette->select_favoris($_SESSION['id']);
if ($favoris->rowCount() > 0) {
    $favoris = $favoris->fetchAll();

    $user = $recette->get_user();
    $user = $user->fetchAll();

    include "../../header.php";
    include "./v_favoris.php";
    include "../../footer.php";
} else {
    echo "<h1>Vous n'avez ajouté aucune recette favorite</h1>";
}
