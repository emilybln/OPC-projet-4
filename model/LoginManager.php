<?php

class LoginManager
{
    public function getLogin($login)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, password, login FROM members WHERE login = ?');
        $req->execute(array($login));
        $result = $req->fetch();
        return $result;
    }

    private function dbConnect()
    {
        return new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
    }
}