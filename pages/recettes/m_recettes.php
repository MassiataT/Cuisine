<?php
include "../BDD/bdd_connexion.php";
class Recettes extends Model
{
    function recipes()
    {
        $recipes = $this->dbh->prepare('SELECT * FROM recipes ORDER BY id DESC');
        $recipes->execute(array());
        return $recipes;
    }

    function image($id)
    {
        $image = $this->dbh->prepare('SELECT bin FROM image WHERE recipes_id = ?');
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

    function get_user()
    {
        $user = $this->dbh->prepare('SELECT nickname, recipes.id FROM users INNER JOIN recipes ON users.id = recipes.user_id ');
        $user->execute();
        return $user;
    }
}
