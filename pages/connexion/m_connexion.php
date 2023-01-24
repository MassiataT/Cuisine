<?php
include "../BDD/bdd_connexion.php";
class Connexion extends Model
{
    private $email;
    private $password;

    function setEmail($email)
    {
        $this->email = $email;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    function getPassword()
    {
        return $this->password;
    }

    function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    function checkUser()
    {
        $user = $this->dbh->prepare('SELECT * from users where email = ?');
        $user->execute(array($this->email));
        return $user;
    }
}
