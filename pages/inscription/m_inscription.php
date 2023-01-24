<?php
include "../BDD/bdd_connexion.php";

class Inscription extends Model
{
    private $nom;
    private $prenom;
    private $date_naissance;
    private $email;
    private $pseudo;
    private $pass;

    function setEmail($email)
    {
        $this->email = $email;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setPass($pass)
    {
        $this->pass = $pass;
    }

    function getPass()
    {
        return $this->pass;
    }

    function setNom($nom)
    {
        $this->nom = $nom;
    }

    function getNom()
    {
        return $this->nom;
    }

    function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    function getPrenom()
    {
        return $this->prenom;
    }

    function setDate_naissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }

    function getDate_naissance()
    {
        return $this->date_naissance;
    }

    function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    function getPseudo()
    {
        return $this->pseudo;
    }

    function __construct($nom, $prenom, $date_naissnace, $email, $pseudo, $pass)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_naissance = $date_naissnace;
        $this->email = $email;
        $this->pseudo = $pseudo;
        $this->pass = $pass;
    }

    function do_user_exist()
    {
        $user = $this->dbh->prepare('SELECT * FROM users WHERE email = ?');
        $user->execute(array($this->email));
        return $user;
    }

    function do_nickname_exist()
    {
        $nickname = $this->dbh->prepare('SELECT * FROM users WHERE nickname = ?');
        $nickname->execute(array($this->pseudo));
        return $nickname;
    }

    function insertUser()
    {
        $insert = $this->dbh->prepare('INSERT INTO users (lastname, name, birthday, email, nickname, password) VALUES (?, ?, ?, ?, ?, ?)');
        $insert->execute(array($this->nom, $this->prenom, $this->date_naissance, $this->email, $this->pseudo, $this->pass));
    }
}
