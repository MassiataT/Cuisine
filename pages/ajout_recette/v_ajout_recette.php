<form action="" method="POST" name="form" id="form" enctype="multipart/form-data">
    <div>
        <input type="text" name="titre" id="titre" placeholder="Nom de la recette" required>
    </div>
    <br>
    <div id="photo">
        <label for="photo">Ajouter une image :</label>
        <input type="file" id="image" name="image" required>
    </div>
    <br>
    <div id="nb-pers">
        <label for="nb">Nombre de personnes :</label>
        <input type="number" id="nb" name="nb" required>
    </div>
    <br>
    <div id="description">
        <label for="description">Ajouter une description :</label>
        <textarea name="description" id="description" rows="2" cols="50"></textarea>
    </div>
    <br>
    <div id="ingredients">
        <input type="number" name="nombre" id="nombre" width="20px">
        <select name="type" id="type">
            <option value="">Choisir une option</option>
            <option value=""></option>
            <option value="g">grammes</option>
            <option value="mg">miligrammes</option>
            <option value="l">litres</option>
            <option value="cl">centilitres</option>
            <option value="cuillère à café">cuillère à café</option>
            <option value="cuillère à soupe">cuillère à soupe</option>
            <option value="pincée">pincée</option>
            <option value="sachet">sachet(s)</option>
            <option value="pot">pot(s)</option>
        </select>
        <input id="aliment" type="text" placeholder="ingredient ex: de farine" />
        <input type="button" value="Ajouter" id="ajouter">
        <div id="affiche_ingredients">

        </div>
    </div>
    <br>
    <div id="materiel">
        <input type="checkbox" class="checkbox" name="four" id="four">
        <label for="four">Four</label>

        <input type="checkbox" class="checkbox" name="micro-onde" id="micro-onde">
        <label for="micro-onde">Micro-onde</label>

        <input type="checkbox" class="checkbox" name="poele" id="poele">
        <label for="poele">Poêle</label>

        <input type="checkbox" class="checkbox" name="casserole" id="casserole">
        <label for="casserole">Casserole</label>

        <input type="checkbox" class="checkbox" name="moule" id="moule">
        <label for="moule">Moule</label>

        <input type="checkbox" class="checkbox" name="saladier" id="saladier">
        <label for="saladier">Saladier</label>

        <input type="checkbox" class="checkbox" name="balance" id="balance">
        <label for="balance">Balance</label>

        <input type="checkbox" class="checkbox" name="fouet" id="fouet">
        <label for="fouet">Fouet</label>

        <input type="checkbox" class="checkbox" name="maryse" id="maryse">
        <label for="maryse">Maryse</label>

        <input type="checkbox" class="checkbox" name="poche-a-douille" id="poche-a-douille">
        <label for="poche-a-douille">Poche à douille</label>

        <input type="checkbox" class="checkbox" name="batteur" id="batteur">
        <label for="batteur">Batteur électrique</label>
    </div>
    <br>
    <div id="etapes">
        <textarea name="etape" id="etapeTexte" rows="2" cols="50"></textarea>
        <input type="button" name="etape" id="etape" value="Ajouter étape">
    </div>
    <div id="affiche_etapes">

    </div>
    <br>
    <input type="submit" name="submit" id="submit" value="Envoyer">

</form>