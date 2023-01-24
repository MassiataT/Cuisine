<?php

$time = strtotime($userinfo['registration_date']);
$date = date('d-m-Y', $time);


?>

<h1>Profil</h1>
<div id="container">
    <div id="profil">
        <p>
            Pseudo : <?php echo $userinfo['nickname']; ?> <br />
            <span class='date'>Inscrit(e) depuis le <?php echo $date; ?></span> <br />
            <span class='nb'><a href="../Controllers/followings.php?nickname=<?php echo $_GET['nickname']; ?>"><?php echo $nb_following; ?> abonnements</a></span>
            <span class='nb'><a href="../Controllers/followers.php?nickname=<?php echo $_GET['nickname']; ?>"><?php echo $nb_follower; ?> abonnés</a></span> <br />


        </p>
        <form action="../Controllers/account.php?nickname=<?php echo $_GET['nickname']; ?>" method="post">
            <input type="button" class="follow" name="follow" value="Suivre">
        </form>

        <?php
        if (isset($_SESSION['nickname']) && $userinfo['nickname'] == $_SESSION['nickname']) {
        ?>

            <a href="edit_profile?id=<?= $_SESSION['id'] ?>" class="edit-profil">Editer le profil</a>
            <script>
                $(document).ready(function() {
                    $(".follow").css("display", "none");
                });
            </script>

        <?php
        }
        ?>
    </div>

    <hr>
    <h2>Recettes</h2>
    <br><br>
    <?php

    foreach ($recipes as $key => $value) {
        echo '<a href="recette?id=' . $value['id'] . '">';
        echo '<div id="part">';

        $image = $recette->image($value['id']);
        $image = $image->fetch();
        echo '<img class="image-fluid rounded" src="data:image/jpeg;base64,' . base64_encode($image['bin']) . '"/>';

        echo '<div>';

        echo "<h2>" . $value['name'] . "</h2>";

        echo "<p>" . $value['description'] . "</p>";

        echo '</div>';

        echo '</div>';
        echo '</a>';

        if (isset($_SESSION['nickname']) && $userinfo['nickname'] == $_SESSION['nickname']) {
            echo "<a class=\"edit\" href=\"modifier?recipe_id=" . $value['id'] . "\">Modifier</a>";
            echo "  ";
            echo "<a class=\"edit\" href=\"delete?recipe_id=" . $value['id'] . "\">Supprimer</a>";
        }
        echo "<br><br>";
    }

    ?>
</div>