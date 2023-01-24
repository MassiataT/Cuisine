<input type="hidden" name="jsonnote" id="jsonnote" value="<?= $jsonnote ?>">
<section id="part1">

    <section id="presentation">

        <div id="titre">
            <h1 class="text-center"><?= $value['name'] ?></h1>
            <div id="footer3">
                <?php
                foreach ($user as $u) {
                    if ($u['nickname'] != $_SESSION['nickname']) {
                ?>
                        <div id="etoiles">
                            <div class="etoile etoile1"></div>
                            <div class="etoile etoile2"></div>
                            <div class="etoile etoile3"></div>
                            <div class="etoile etoile4"></div>
                            <div class="etoile etoile5"></div>
                        </div>
                <?php
                    }
                }
                ?>
                <?= $notetotal ?>
            </div>
        </div>

        <div id="img">
            <?php echo '<img width="70%" class="image-fluid rounded" src="data:image/jpeg;base64,' . base64_encode($im['bin']) . '"/>' ?>
        </div>

        <div id="footer2">

            <?php
            foreach ($user as $u) {
                if ($u['nickname'] != $_SESSION['nickname']) {
            ?>
                    <div id="etoiles">
                        <div class="etoile etoile1"></div>
                        <div class="etoile etoile2"></div>
                        <div class="etoile etoile3"></div>
                        <div class="etoile etoile4"></div>
                        <div class="etoile etoile5"></div>
                    </div>
            <?php
                }
            }
            ?>
            <?= $notetotal ?>
        </div>

    </section>

    <section id="info">
        <h2 class="text-center mb-3">Ingredients</h2>

        <div class="number">
            <input type="number" id="number" name="number" min="1" max="100" value="<?= $value['nb_pers'] ?>">
            <label for="number">personnes</label>
        </div>


        <article id="ingredients">
            <div class="row mt-3 mb-3">

                <?php

                foreach ($ingredient as $ing) {
                    $texte = str_replace('"', '', $ing["texte"]);
                    echo '
                            <div class="col-12">
                                <input type="checkbox" id="' . $texte . '" name="' . $texte . '">
                                <label for="' . $texte . '">' . $texte . '</label>
                            </div>
                        ';
                }

                ?>
            </div>
        </article>

        <article id="ustanciles">
            <h2 class="text-center">Ustansiles</h2>

            <div class="row text-center">
                <?php

                foreach ($ustensils as $u) {
                    echo '
                        <p class="col-6">' . $u["texte"] . '</p>
                        ';
                }

                ?>
            </div>
        </article>
    </section>

    <div id="part2">
        <section id="etapes" class="mt-3">

            <?php

            foreach ($steps as $s) {
                $etape = str_replace('"', '', $s["texte"]);
                echo '
                    <h3>Etape ' . $i . ' : </h3>
                    <p>' . $etape . '</p>
                    ';
                $i++;
            }

            ?>
        </section>
    </div>
    <form action="" method="post">
        <input type="text" name="sessionNickname" id="sessionNickname" value="<?= $_SESSION['nickname'] ?>">
        <?php
        if (isset($fav)) {
            if ($fav == true) {
                $favactive = 'fav-active';
            } elseif ($fav == false) {
                $favactive = '';
            }
        }
        ?>
        <button type="button" class="fav <?= $favactive ?>"></button>
    </form>
</section>

<section id="info2">
    <h2 class="text-center mb-3">Ingredients</h2>

    <div class="number">
        <input type="number" id="number" name="number" min="1" max="100" value="<?= $value['nb_pers'] ?>">
        <label for="number">personnes</label>
    </div>


    <article id="ingredients">
        <div class="row mt-3 mb-3">

            <?php
            foreach ($ingredient as $ing) {
                $texte = str_replace('"', '', $ing["texte"]);
                echo '
                            <div class="col-12">
                                <input type="checkbox" id="' . $texte . '" name="' . $texte . '">
                                <label for="' . $texte . '">' . $texte . '</label>
                            </div>
                        ';
            }

            ?>
        </div>
    </article>

    <article id="ustanciles">
        <h2 class="text-center">Ustansiles</h2>

        <div class="row text-center">
            <?php

            foreach ($ustensils as $u) {
                echo '
                <p class="col-6">' . $u["texte"] . '</p>
                ';
            }

            ?>
        </div>
    </article>
</section>