<?php

class Bestelling extends DB {

    public static function all()
    {
        //query de bestellingen die geen dranken zijn
        $sql = "SELECT a.id, b.tafel, a.aantal, c.naam as gerecht, a.geserveerd, e.code as cat from bestellingen a
        join reserveringen b on a.reservering_id = b.id
        join menuitems c on a.menuitem_id = c.id
        join gerechtsoorten d on c.gerechtsoort_id = d.id
        join gerechtcategorien e on d.gerechtcategorien_id = e.id;";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    public static function eten()
    {
        //query de bestellingen die geen dranken zijn
        $sql = "SELECT a.id, b.tafel, a.aantal, c.naam as gerecht, a.geserveerd, e.code as cat from bestellingen a
        join reserveringen b on a.reservering_id = b.id
        join menuitems c on a.menuitem_id = c.id
        join gerechtsoorten d on c.gerechtsoort_id = d.id
        join gerechtcategorien e on d.gerechtcategorien_id = e.id 
        where e.code != 'drk' and geserveerd = 0";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    public static function toevoegen($menu_id, $res_id)
    {

        $sql = "SELECT * FROM bestellingen where reservering_id = ? and menuitem_id = ? and geserveerd = 0";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$res_id, $menu_id]);
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        //alleen als het item nog niet in de lijst staat kan je hem toevoegen
        if(count($data) == 0){
        $sql = "INSERT INTO bestellingen (reservering_id, menuitem_id, aantal, geserveerd)
        VALUES (?,?,1,0);";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$res_id, $menu_id]);
        }
    }

    public static function serveer($id)
    {
        $sql = "UPDATE bestellingen set geserveerd = 1 where id = ?";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    public static function dranken()
    {
        //query de bestellingen die dranken zijn
        $sql = "SELECT a.id, b.tafel, a.aantal, c.naam as drank, a.geserveerd, e.code as cat from bestellingen a
        join reserveringen b on a.reservering_id = b.id
        join menuitems c on a.menuitem_id = c.id
        join gerechtsoorten d on c.gerechtsoort_id = d.id
        join gerechtcategorien e on d.gerechtcategorien_id = e.id
        where e.code = 'drk' and geserveerd = 0;";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    public static function vanReservering($id)
    {
        $sql = "SELECT a.id, a.reservering_id, c.tafel, b.naam, a.aantal, b.prijs from bestellingen a
        join menuitems b on a.menuitem_id = b.id
        join reserveringen c on a.reservering_id = c.id
        where a.reservering_id = ? and geserveerd = 0;";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$id]);

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    //dit zijn alle bestllingen uit het database die voor een reservering afgerekend moeten worden
    public static function alleBestellingenVoorAfrekenen($id)
    {
        $sql = "SELECT a.id, a.reservering_id, c.tafel, b.naam, a.aantal, b.prijs from bestellingen a
        join menuitems b on a.menuitem_id = b.id
        join reserveringen c on a.reservering_id = c.id
        where a.reservering_id = ?;";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$id]);

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM bestellingen WHERE id = ?;";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$id]);
    }


    //tel de aantal eraf van een bestelling
    public static function min($id)
    {
        $sql = "SELECT aantal from bestellingen where id = ?;";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$id]);

        $data = $stmt->fetch(PDO::FETCH_OBJ);


        //als aantal 1 is kan je niet minder 
        $aantal_int = (int)$data->aantal;
        if($aantal_int > 1){
            $aantal_int = $aantal_int - 1;
        }

        $sql2 = "UPDATE bestellingen set aantal = ? where id = ?";
        $stmt2 = DB::connect()->prepare($sql2);
        $stmt2->execute([$aantal_int, $id]);
    }

    //tel de aantal op van eeen bestelling
    public static function plus($id)
    {
        $sql = "SELECT aantal from bestellingen where id = ?;";
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_OBJ);

        $aantal_int = (int)$data->aantal;
        $aantal_int = $aantal_int + 1;

        $sql2 = "UPDATE bestellingen set aantal = ? where id = ?";
        $stmt2 = DB::connect()->prepare($sql2);
        $stmt2->execute([$aantal_int, $id]);
    }
}