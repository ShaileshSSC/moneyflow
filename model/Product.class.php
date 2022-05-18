<?php

class Product extends DB
{
    public static function all()
    {
        $sql = "SELECT a.id, a.naam, b.naam as soort, c.naam as magazijn, a.image, a.totaal from bloem a
        join soort b on a.soort_id = b.id
        join magazijn c on a.magazijn_id = c.id;";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    public static function find($id)
    {
        $sql = "SELECT a.id, a.naam, b.naam as soort, c.naam as magazijn, a.image, a.totaal from bloem a
        join soort b on a.soort_id = b.id
        join magazijn c on a.magazijn_id = c.id
        where a.id = ?";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$id]);

        $data = $stmt->fetch(PDO::FETCH_OBJ);

        return $data;
    }


    public static function create($name) 
    {
        $sql = "INSERT INTO magazijn (naam)
        VALUES (?);";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$name]);
    }

    public static function update($name, $id)
    {
        $sql = "UPDATE magazijn set naam = ? where id = ?";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$name, $id]);
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM magazijn WHERE id = ?;";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}