<h1>Recettes</h1>
<br><br>
<div class="page">
    <?php

    foreach ($recipes as $value) {
        echo '<div id="part">';
        echo '<a class="lien" href="../recette/c_recette.php?id=' . $value['id'] . '">';

        $image = $recette->image($value['id']);
        $image = $image->fetch();
        echo '<img class="image-fluid rounded" src="data:image/jpeg;base64,' . base64_encode($image['bin']) . '"/>';

        echo '<div id="text">';

        echo "<h2>" . $value['name'] . "</h2>";

        echo "<p>" . $value['description'] . "</p>";
        echo '</a>';
        foreach ($user as $u) {
            if ($u['id'] === $value['id']) {
                echo "<a href=\"../compte/c_compte.php?nickname=" . $u['nickname'] . "\">De " . $u['nickname'] . "</a>";
            }
        }

        echo '</div>';

        echo '</div>';

        echo "<br><br>";
    }

    ?>
</div>