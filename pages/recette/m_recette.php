<?php
include "../BDD/bdd_connexion.php";
class Recette extends Model
{
    function recipes($id)
    {
        $recipes = $this->dbh->prepare('SELECT * FROM recipes WHERE id = ?');
        $recipes->execute(array($id));
        return $recipes;
    }

    function image($id)
    {
        $image = $this->dbh->prepare('SELECT * FROM image WHERE recipes_id = ?');
        $image->execute(array($id));
        return $image;
    }

    function ingredient($id)
    {
        $ingredient = $this->dbh->prepare('SELECT * FROM ingredients WHERE recipes_id = ?');
        $ingredient->execute(array($id));
        return $ingredient;
    }

    function steps($id)
    {
        $steps = $this->dbh->prepare('SELECT * FROM steps WHERE recipes_id = ?');
        $steps->execute(array($id));
        return $steps;
    }

    function ustensils($id)
    {
        $ustensils = $this->dbh->prepare('SELECT * FROM ustensils WHERE recipes_id = ?');
        $ustensils->execute(array($id));
        return $ustensils;
    }

    function select_favoris($recipe)
    {
        $favoris = $this->dbh->prepare('SELECT * FROM favourite WHERE recipes_id = ?');
        $favoris->execute(array($recipe));
        return $favoris;
    }

    function add_favoris($recipe,  $user)
    {
        $add = $this->dbh->prepare('INSERT INTO favourite (recipes_id, user_id) VALUES (?, ?)');
        $add->execute(array($recipe,  $user));
    }

    function delete_favoris($recipe)
    {
        $delete = $this->dbh->prepare('DELETE FROM favourite WHERE recipes_id = ?');
        $delete->execute(array($recipe));
    }

    function add_note($id,  $nb, $user)
    {
        $add = $this->dbh->prepare('INSERT INTO notes (recipe_id, note, user_id) VALUES (?, ?, ?)');
        $add->execute(array($id,  $nb, $user));
    }

    function select_notes($id)
    {
        $notes = $this->dbh->prepare('SELECT * FROM notes WHERE recipe_id = ?');
        $notes->execute(array($id));
        return $notes;
    }

    function insert_note($note, $recipe, $user)
    {
        $insert = $this->dbh->prepare('UPDATE notes SET note = ? WHERE recipe_id = ? AND user_id = ?');
        $insert->execute(array($note, $recipe, $user));
    }

    function select_noteuser($id, $user)
    {
        $noteuser = $this->dbh->prepare('SELECT note FROM notes WHERE recipe_id = ? AND user_id = ?');
        $noteuser->execute(array($id, $user));
        return $noteuser;
    }

    function get_user($id)
    {
        $user = $this->dbh->prepare('SELECT nickname, recipes.id FROM users INNER JOIN recipes ON users.id = recipes.user_id WHERE recipes.id = ?');
        $user->execute(array($id));
        return $user;
    }
}
