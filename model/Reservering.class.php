<?php

class Reservering extends DB {

    public static function all()
    {
        $sql = "SELECT a.id, a.datum, a.tijd, a.tafel, b.naam as naam, b.telefoon, a.aantal from reserveringen a
        join klanten b on a.klant_id = b.id";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM reserveringen WHERE id = ?;";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    public static function find($id)
    {
        $sql = "SELECT * from reserveringen where id = ?";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        return $data;    
    }

    public static function update($id, $datum, $tijd, $tafel, $aantal)
    {
        $sql = "UPDATE reserveringen set tafel = ?, datum = ?, tijd = ?, aantal = ? where id = ?";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$tafel, $datum, $tijd, $aantal, $id]);
    }

    public static function toevoegen($datum, $tijd, $id, $aantal, $alergien, $opmerkingen)
    {
        $sql = "INSERT INTO reserveringen (datum, tijd, klant_id, aantal, allergieen, opmerkingen)
        VALUES (?,?,?,?,?,?);";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$datum, $tijd, $id, $aantal, $alergien, $opmerkingen]);
    }
}