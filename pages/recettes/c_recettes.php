<?php
session_start(); // permet d'accéder à $_SESSION
$isConnected = $_SESSION['isConnected'] ?? false;
$css = "../../CSS/recettes.css";
include "./m_recettes.php";

$recette = new Recettes();
$recette->connect_to_db();

$recipes = $recette->recipes();
$recipes = $recipes->fetchAll();

$user = $recette->get_user();
$user = $user->fetchAll();

include "../../header.php";
include "./v_recettes.php";
include "../../footer.php";
