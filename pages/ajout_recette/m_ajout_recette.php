<?php
include "../BDD/bdd_connexion.php";

class Ajout extends Model
{
    function count_recipes()
    {
        $count = $this->dbh->prepare('SELECT MAX(id) AS "nb" FROM recipes');
        $count->execute();
        return $count;
    }

    function add_steps($id, $texte)
    {
        $add = $this->dbh->prepare('INSERT INTO steps (recipes_id,texte) VALUES (?, ?)');
        $add->execute(array($id, $texte));
    }

    function delete_step($texte)
    {
        $delete = $this->dbh->prepare('DELETE FROM steps WHERE texte = ?');
        $delete->execute(array($texte));
    }

    function add_ingredient($id, $texte)
    {
        $add = $this->dbh->prepare('INSERT INTO ingredients (recipes_id,texte) VALUES (?, ?)');
        $add->execute(array($id, $texte));
    }

    function delete_ingredient($texte)
    {
        $delete = $this->dbh->prepare('DELETE FROM ingredients WHERE texte = ?');
        $delete->execute(array($texte));
    }

    function add_image($nom, $taille, $type, $bin, $id)
    {
        $add = $this->dbh->prepare('INSERT INTO image (nom, taille, type, bin, recipes_id) VALUES (?, ?, ?, ?, ?)');
        $add->execute(array($nom, $taille, $type, $bin, $id));
    }

    function add_ustansils($id, $texte)
    {
        $add = $this->dbh->prepare('INSERT INTO ustensils (recipes_id, texte) VALUES (?, ?)');
        $add->execute(array($id, $texte));
    }

    function add_recipes($user, $name, $nb_pers, $description)
    {
        $add = $this->dbh->prepare('INSERT INTO recipes (user_id, name, nb_pers, description) VALUES (?, ?, ?, ?)');
        $add->execute(array($user, $name, $nb_pers, $description));
    }
}
