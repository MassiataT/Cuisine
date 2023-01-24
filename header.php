<?php
$username = $_SESSION['username'] ?? null;

$topmenu = [
    [
        'label' => 'Recettes',
        'url' => '../recettes/c_recettes.php',
    ],
    [
        'label' => ($isConnected) ? 'Ajout recette' : null,
        'url' => ($isConnected) ? '../ajout_recette/c_ajout_recette.php' : null,
    ],
    [
        'label' => ($isConnected) ? 'Favoris' : null,
        'url' => ($isConnected) ? '../favoris/c_favoris.php' : null,
    ],
    [
        'label' => ($isConnected) ? 'Deconnexion' : 'Connexion',
        'url' => ($isConnected) ? '../connexion/deconnexion.php' : '../connexion/c_connexion.php',
    ],
];
if (!$isConnected) {
    $topmenu[] = [
        'label' => 'Inscription',
        'url' => '../inscription/c_inscription.php',
    ];
}

if ($isConnected) {
    $topmenu[] = [
        'label' => 'Mon Compte',
        'url' => '../compte/c_compte.php?nickname=' . $_SESSION['nickname'],
    ];
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <charset="ISO-8859-1>
        <meta httap-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acceuil</title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


        <!-- Bootstrap core CSS -->
        <link href="../../CSS/bootstrap.css" rel="stylesheet" />
        <link href="../../CSS/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="../../<?= $css ?>" />

</head>

<body>

    <header>
        <!-- Fixed navbar -->
        <nav id="others" class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand  me-auto" href="../../index.php">Cookeasy</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <?php
                        foreach ($topmenu as $element) {
                            echo <<<HTML
                                <li class="nav-item">
                                        <a class="nav-link active $element[label]" aria-current="page" href="$element[url]"> $element[label]</a>
                                </li>
                            HTML;
                        }
                        ?>
                    </ul>
                    <form class="d-flex" method="POST" action="recherche">
                        <input class="form-control me-2" name="recherche" type="search" placeholder="Trouvez une recette" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Chercher</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>