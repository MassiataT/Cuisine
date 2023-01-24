<?php
session_start(); // permet d'accéder à $_SESSION
$isConnected = $_SESSION['isConnected'] ?? false;
$css = "../../CSS/compte.css";
include "./m_compte.php";

if (isset($_GET['nickname'])) {
    $account = new Account($_GET['nickname'], $_SESSION["id"], $_GET['nickname']);
    $account->connect_to_db();
    $userinfo = $account->getinfo();
    $following = $account->get_following_id();
    $checkfollow = $account->is_following($following);
    if ($_GET['nickname'] == $_SESSION['nickname']) {
        $nb_following = $account->nb_followings($_SESSION["id"]);
        $nb_follower = $account->nb_followers($_SESSION["id"]);
    } else {
        $nb_following = $account->nb_followings($following);
        $nb_follower = $account->nb_followers($following);
    }

    if (isset($_POST['follow'])) {
        if ($checkfollow->rowCount() != 0) {
            $account->delete_following($following);
        } else {
            $account->insert_following($following);
        }
    }
}

$recette = new Mes_recettes();
$recette->connect_to_db();
if (count($recette->recipes($_SESSION['id'])) > 0) {
    $recipes = $recette->recipes($userinfo['id']);

    include "../../header.php";
    include "./v_compte.php";
    include "../../footer.php";
} else {
    echo "<h1>Vous n'avez ajouté aucune recette</h1>";
}
