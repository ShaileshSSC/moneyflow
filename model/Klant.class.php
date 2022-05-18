<?php

class Klant extends DB
{
    public static function register($naam, $email, $tel)
    {
        $sql = "INSERT INTO klanten (naam, telefoon, email)
        VALUES (?,?,?);";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$naam, $tel, $email]);
    }

    public static function find($name)
    {
        $sql = "SELECT * FROM klanten where naam = ?";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$name]);
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        return $data;
    }



}