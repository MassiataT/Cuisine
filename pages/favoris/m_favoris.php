<?php
include "../BDD/bdd_connexion.php";
class Favoris extends Model
{
    function select_favoris($id)
    {
        $favoris = $this->dbh->prepare('SELECT * FROM favourite WHERE `user_id` = ? ORDER BY id DESC');
        $favoris->execute(array($id));
        return $favoris;
    }

    function recipes($id)
    {
        $recipes = $this->dbh->prepare('SELECT * FROM recipes WHERE id = ? ORDER BY id DESC');
        $recipes->execute(array($id));
        return $recipes;
    }

    function image($id)
    {
        $image = $this->dbh->prepare('SELECT * FROM image WHERE recipes_id = ?');
        $image->execute(array($id));
        return $image;
    }

    function get_user()
    {
        $user = $this->dbh->prepare('SELECT nickname, recipes.id FROM users INNER JOIN recipes WHERE users.id = recipes.user_id ');
        $user->execute();
        return $user;
    }
}
