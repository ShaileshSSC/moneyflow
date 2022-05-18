<?php

class User extends DB
{
    static function login($user, $pass)
    {
        $sql = "SELECT * FROM beheerder where gebruikersnaam = ? and wachtwoord = ?";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$user, $pass]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    static function changepass($newpass)
    {
        $sql = "UPDATE beheerder set wachtwoord = ? where gebuikersnaam = 'admin'";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$newpass]);
    }


}