<?php
class Model
{
    public $dbh;

    public function connect_to_db()
    {
        try {
            $this->dbh = new PDO('mysql:host=127.0.0.1:3306;dbname=cookieasy;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
