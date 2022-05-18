<?php

require '../model/Bestelling.class.php';

class BestellingController {

    public function all()
    {
        return Bestelling::all();
    }

    public function eten()
    {
        return Bestelling::eten();
    }

    //zet gerecht als geserveerd in de database
    public function geserveerd($req)
    {
        Bestelling::serveer($req->id);
        header("Location: ../views/ober.php");
    }

    //krijg alle dranken uit de database
    public function dranken()
    {
        return Bestelling::dranken();
    }

    //voeg een item to aan de bestellijst in het database
    public function toevoegen($req)
    {
        Bestelling::toevoegen($req->id, $req->res_id);
        header("Location: ../views/bestellen.php?id=$req->res_id");
    }

    public function delete($req)
    {
        Bestelling::delete($req->id);
        header("Location: ../views/bestellen.php?id=$req->res_id");
    }

    public function aantalMin($req)
    {
        Bestelling::min($req->id);
        header("Location: ../views/bestellen.php?id=$req->res_id");
    }

    public function aantalPlus($req)
    {
        Bestelling::plus($req->id);
        header("Location: ../views/bestellen.php?id=$req->res_id");
    }

    //haal alle bestellingen op die nog niet zijn geserveerd van een specifieke reservering
    public function vanReservering($id)
    {
        return Bestelling::vanReservering($id);
    }

    //haal alle bestellingen op die niet geserveerd zijn en wel geserveerd zijn voor de bon
    public function afrekenen($req)
    {
        header("Location: ../views/bon.php?id=$req->res_id");
    }

    public function afrekenBestellingen($id)
    {
        return Bestelling::alleBestellingenVoorAfrekenen($id);
    }

    //ga naar de bestel pagina
    public function bestellen($req)
    {
        header("Location: ../views/bestellen.php?id=$req->id");
    }
}