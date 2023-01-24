<h1>Inscription</h1>

<?php
if (isset($erreur)) {
    echo "<p id='erreur'>" . $erreur . "</p>";
}
?>

<form id="form" action="" method="post">

    <!-- nom -->
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" required>
    <br>

    <!-- prenom -->
    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" id="prenom" required>
    <br>

    <!-- date de naissance -->
    <label for="date_naissance">Date de naissance :</label>
    <input type="date" name="date_naissance" id="date_naissance" required>
    <br>

    <!-- email -->
    <label for="email">E-mail </label>
    <input required type="email" name="email" id="email" required>
    <br>
    <!-- pseudo -->
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo" required>
    <br>

    <!-- mot de passe -->
    <label for="pwd">Mot de passe</label>
    <input type="password" name="pwd" id="pwd" minlength="5" required>
    <br>

    <!-- Vérification du mot de passe -->
    <label for="pwd_verif">Vérification du mot de passe</label>
    <input type="password" name="pwd_verif" id="pwd_verif">
    <br>

    <!-- submit -->
    <input type="submit" name="submit" value="S'inscrire">

</form>