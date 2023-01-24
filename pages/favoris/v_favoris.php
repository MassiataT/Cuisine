<h1>Mes recettes favorites</h1>
<br><br>
<?php

foreach ($favoris as $fav) {
    $recipes = $recette->recipes($fav['recipes_id']);
    $recipes = $recipes->fetchAll();

    foreach ($recipes as $value) {
        // var_dump($value);
        // echo '<br><br>';
        echo '<a href="../recette/c_recette.php?id=' . $value['id'] . '">';
        echo '<div id="part">';

        $image = $recette->image($value['id']);
        $image = $image->fetch();
        echo '<img class="image-fluid rounded" src="data:image/jpeg;base64,' . base64_encode($image['bin']) . '"/>';

        echo '<div>';

        echo "<h2>" . $value['name'] . "</h2>";

        echo "<p>" . $value['description'] . "</p>";

        foreach ($user as $u) {
            if ($u['id'] === $value['id']) {
                echo "<a href=\"admin?nickname=" . $u['nickname'] . "\">De " . $u['nickname'] . "</a>";
            }
        }

        echo '</div>';

        echo '</div>';
        echo '</a>';
        echo '<br><br>';
    }
}
?>