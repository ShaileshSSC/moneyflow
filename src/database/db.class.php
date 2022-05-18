<?php

class DB
{


    public static function connect()
    {
        $usernme = 'root';
        $password = '';

        $dsn = "mysql:host=localhost;dbname=ext;charset=utf8mb4";
        $pdo = new PDO($dsn, $usernme, $password);
        return $pdo;
    }
}
