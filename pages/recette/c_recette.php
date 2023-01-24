<?php
session_start(); // permet d'accéder à $_SESSION
$isConnected = $_SESSION['isConnected'] ?? false;
$css = "../../CSS/recette.css";
$js = "../../JS/recette.js";
include "./m_recette.php";

$recette = new Recette();
$recette->connect_to_db();

$recipes = $recette->recipes($_GET['id']);
$recipes = $recipes->fetchAll();

if (isset($_POST['addfav'])) {
    $recette->add_favoris($_GET['id'], $_SESSION['id']);
}

if (isset($_POST['removefav'])) {
    $recette->delete_favoris($_GET['id']);
}

$noteuser = $recette->select_noteuser($_GET['id'], $_SESSION['id']);
if ($noteuser->rowCount() == 1) {
    $noteuser = $noteuser->fetch();
    var_dump($noteuser);
    $jsonnote = $noteuser['note'];
} else {
    $jsonnote = 0;
}

$user = $recette->get_user($_GET['id']);
$user = $user->fetchAll();

$somme = 0;
$i = 0;
$notevue = $recette->select_notes($_GET['id']);
if ($notevue->rowCount() > 0) {
    $notevue = $notevue->fetchAll();
    if (isset($_POST['addnote'])) {
        $noteinsert = json_decode($_POST['addnote']);
        $recette->insert_note($noteinsert, $_GET['id'], $_SESSION['id']);
    }
    $notevue = $recette->select_notes($_GET['id']);
    $notevue = $notevue->fetchAll();

    $noteuser = $recette->select_noteuser($_GET['id'], $_SESSION['id']);
    $noteuser = $noteuser->fetch();

    foreach ($notevue as $no) {
        $somme += $no['note'];
        $i++;
    }
    $moy = $somme / $i;
    $notetotal = "(Note moyenne : " . $moy . ")";
} else {
    $notetotal = "(Aucune note pour le moment)";
    if (isset($_POST['addnote'])) {
        $note = json_decode($_POST['addnote']);
        $recette->add_note($_GET['id'], $note, $_SESSION['id']);
    }
}

foreach ($recipes as $value) {
    $image = $recette->image($value['id']);
    $image = $image->fetchAll();
    foreach ($image as $im) {
    }

    $ingredient = $recette->ingredient($value['id']);
    $ingredient = $ingredient->fetchAll();

    $ustensils = $recette->ustensils($value['id']);
    $ustensils = $ustensils->fetchAll();

    $steps = $recette->steps($value['id']);
    $steps = $steps->fetchAll();
    $i = 1;

    $favoris = $recette->select_favoris($value['id']);
    if ($favoris->rowCount() == 1) {
        $fav = true;
    } else {
        $fav = false;
    }
}

include "../../header.php";
include "./v_recette.php";
include "../../footer.php";
