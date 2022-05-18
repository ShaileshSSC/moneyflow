<?php

class Menu extends DB {

    public static function all()
    {
        $sql = "SELECT * FROM menuitems";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    public static function dranken()
    {
        //query de menuitems die dranken zijn
        $sql = "SELECT a.id, a.code, a.naam, a.gerechtsoort_id, b.id as soort_id, b.naam as soort, c.id as categorie_id, c.code as cat_code, c.naam as catgorie_naam, a.prijs from menuitems a
        join gerechtsoorten b on a.gerechtsoort_id = b.id
        join gerechtcategorien c on b.gerechtcategorien_id = c.id
        where c.code = 'drk'";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    public static function eten()
    {
        //query de menuitems die dranken zijn
        $sql = "SELECT a.id, a.code, a.naam, a.gerechtsoort_id, b.id as soort_id, b.naam as soort, c.id as categorie_id, c.code as cat_code, c.naam as catgorie_naam, a.prijs from menuitems a
        join gerechtsoorten b on a.gerechtsoort_id = b.id
        join gerechtcategorien c on b.gerechtcategorien_id = c.id
        where c.code != 'drk'";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    public static function allSoorten()
    {
        $sql = "SELECT * FROM gerechtsoorten";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    public static function allCategorien()
    {
        $sql = "SELECT * FROM gerechtcategorien";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM menuitems WHERE id = ?;";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    public static function voeg($naam, $soort, $prijs)
    {
        $sql = "INSERT INTO menuitems (naam, gerechtsoort_id, prijs)
        VALUES (?,?,?);";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$naam, $soort, $prijs]);
    }

    public static function drankSoorten()
    {
        //query alle dranksoorten die bestaan
        $sql = "SELECT a.id, a.naam, b.id as cat_id, b.code as cat_code from gerechtsoorten a
        join gerechtcategorien b on a.gerechtcategorien_id = b.id
        WHERE b.code = 'drk';";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    public static function gerechtSoorten()
    {
        //query alle dranksoorten die bestaan
        $sql = "SELECT a.id, a.naam, b.id as cat_id, b.code as cat_code from gerechtsoorten a
        join gerechtcategorien b on a.gerechtcategorien_id = b.id
        WHERE b.code != 'drk';";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    public static function opslaan($id, $naam, $soort, $prijs)
    {
        $sql = "UPDATE menuitems set naam = ?, gerechtsoort_id = ?, prijs = ? where id = ?";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$naam, $soort, $prijs, $id]);
    }
}