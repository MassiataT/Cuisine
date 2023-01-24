<?php
session_start(); // permet d'accéder à $_SESSION
$isConnected = $_SESSION['isConnected'] ?? false;
$css = "../../CSS/ajout_recette.css";
$js = "../../JS/ajout_recette.js";
include "./m_ajout_recette.php";

$ajout = new Ajout();
$ajout->connect_to_db();
$max = $ajout->count_recipes();
$max = $max->fetch();
$id = $max['nb'] + 1;

if (isset($_POST['json'])) {
    $json = json_decode($_POST['json']);
    $etape = $ajout->add_steps($id, $json);
}

if (isset($_POST['jsonsupp'])) {
    $jsonsupp = json_decode($_POST['jsonsupp']);
    $etape = $ajout->delete_step($jsonsupp);
}

if (isset($_POST['jsonIngredient'])) {
    $jsonIngredient = json_decode($_POST['jsonIngredient']);
    $etape = $ajout->add_ingredient($id, $jsonIngredient);
}

if (isset($_POST['jsonSuppIngredient'])) {
    $jsonSuppIngredient = json_decode($_POST['jsonSuppIngredient']);
    $etape = $ajout->delete_ingredient($jsonSuppIngredient);
}

if (isset($_POST['submit'])) {
    $image = $ajout->add_image($_FILES["image"]["name"], $_FILES["image"]["size"], $_FILES["image"]["type"], file_get_contents($_FILES["image"]["tmp_name"]), $id);
    if (isset($_POST['four'])) {
        $u = $ajout->add_ustansils($id, 'Four');
    }
    if (isset($_POST['micro-onde'])) {
        $u = $ajout->add_ustansils($id, 'Micro-onde');
    }
    if (isset($_POST['poele'])) {
        $u = $ajout->add_ustansils($id, 'Poêle');
    }
    if (isset($_POST['casserole'])) {
        $u = $ajout->add_ustansils($id, 'Casserole');
    }
    if (isset($_POST['fouet'])) {
        $u = $ajout->add_ustansils($id, 'Fouet');
    }
    if (isset($_POST['maryse'])) {
        $u = $ajout->add_ustansils($id, 'Maryse');
    }
    if (isset($_POST['poche-a-douille'])) {
        $u = $ajout->add_ustansils($id, 'Poche à douille');
    }
    if (isset($_POST['batteur'])) {
        $u = $ajout->add_ustansils($id, 'Batteur');
    }

    if (isset($_POST['moule'])) {
        $u = $ajout->add_ustansils($id, 'Moule');
    }

    if (isset($_POST['saladier'])) {
        $u = $ajout->add_ustansils($id, 'Saladier');
    }

    if (isset($_POST['balance'])) {
        $u = $ajout->add_ustansils($id, 'Balance');
    }
    $recipes = $ajout->add_recipes($_SESSION['id'], $_POST['titre'], $_POST['nb'], $_POST['description']);

    header('Location: admin?nickname=' . $_SESSION['nickname']);
}

include "../../header.php";
include "./v_ajout_recette.php";
include "../../footer.php";
