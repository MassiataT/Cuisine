<h1>Connexion</h1>

<?php
if (isset($erreur)) {
    echo "<p id='erreur'>" . $erreur . "</p>";
}
?>

<form action="" method="POST" id="form">

    <!-- email -->
    <label for="email">E-mail </label>
    <input required type="email" name="email" id="email" required>
    <br>

    <!-- mot de passe -->
    <label for="pwd">Mot de passe</label>
    <input type="password" name="pwd" id="pwd" minlength="5" required>
    <br>

    <!-- submit -->
    <input type="submit" value="Connexion">

</form>