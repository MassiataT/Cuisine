<?php
include "../BDD/bdd_connexion.php";

class Account extends Model
{
    public $nickname;
    public $follower;
    public $following;

    public function __construct($nickname, $follower, $following)
    {
        $this->nickname = $nickname;
        $this->follower = $follower;
        $this->following = $following;
    }

    function getinfo()
    {
        $requser = $this->dbh->prepare('SELECT * FROM users WHERE nickname = ?');
        $requser->execute(array($this->nickname));
        return $requser->fetch();
    }

    function get_following_id()
    {
        $id_following = $this->dbh->prepare("SELECT id FROM users WHERE nickname = ?");
        $id_following->execute(array($this->following));
        return $id_following->fetch()['id'];
    }

    function insert_following($user_following)
    {
        $following = $this->dbh->prepare("INSERT INTO link_user_follower_user_following (id_follower, id_following) VALUES (?, ?)");
        $following->execute(array($this->follower, $user_following));
    }

    function delete_following($user_following)
    {
        $following = $this->dbh->prepare("DELETE FROM link_user_follower_user_following WHERE id_follower = ? AND id_following = ?");
        $following->execute(array($this->follower, $user_following));
    }

    function is_following($user_following)
    {
        $checkfollow = $this->dbh->prepare("SELECT * FROM link_user_follower_user_following WHERE id_follower = ? AND id_following = ?");
        $checkfollow->execute(array($this->follower, $user_following));
        return $checkfollow;
    }

    function nb_followings($user)
    {
        $nb = $this->dbh->prepare("SELECT COUNT(*) FROM link_user_follower_user_following WHERE id_follower = ?");
        $nb->execute(array($user));
        return $nb->fetch(\PDO::FETCH_ASSOC)['COUNT(*)'];
    }

    function nb_followers($user)
    {
        $nb = $this->dbh->prepare("SELECT COUNT(*) FROM link_user_follower_user_following WHERE id_following = ?");
        $nb->execute(array($user));
        return $nb->fetch(\PDO::FETCH_ASSOC)['COUNT(*)'];
    }
}

class Mes_recettes extends Model
{
    function recipes($id)
    {
        $recipes = $this->dbh->prepare('SELECT * FROM recipes WHERE user_id = ? ORDER BY id DESC');
        $recipes->execute(array($id));
        return $recipes->fetchAll();
    }

    function image($id)
    {
        $image = $this->dbh->prepare('SELECT * FROM image WHERE recipes_id = ?');
        $image->execute(array($id));
        return $image;
    }

    // function ingredient($id) {
    //     $ingredient = $this->dbh->prepare('SELECT * FROM ingredients WHERE recipes_id = ?');
    //     $ingredient->execute(array($id));
    //     return $ingredient;
    // }

    // function steps($id) {
    //     $steps = $this->dbh->prepare('SELECT * FROM steps WHERE recipes_id = ?');
    //     $steps->execute(array($id));
    //     return $steps;
    // }

    // function ustensils($id) {
    //     $ustensils = $this->dbh->prepare('SELECT * FROM ustensils WHERE recipes_id = ?');
    //     $ustensils->execute(array($id));
    //     return $ustensils;
    // }
}
