<?php

require '../model/Menu.class.php';

class MenuController {

    public function all()
    {
       return Menu::all();
    }


    public function drankDelete($req)
    {
        Menu::delete($req->id);
        header("Location: ../views/dranken.php");
    }

    public function gerechtDelete($req)
    {
        Menu::delete($req->id);
        header("Location: ../views/eten.php");
    }

    public function dranken()
    {
        return Menu::dranken();
    }

    public function eten()
    {
        return Menu::eten();
    }

    public function drankOpslaan($req)
    {
        Menu::opslaan($req->id, $req->naam, $req->soort, $req->prijs);
        header("Location: ../views/dranken.php");
    }

    public function gerechtOpslaan($req)
    {
        Menu::opslaan($req->id, $req->naam, $req->soort, $req->prijs);
        header("Location: ../views/eten.php");
    }

    public function getAllSoorten()
    {
        return Menu::allSoorten();
    }

    public function getAllCategorien()
    {
        return Menu::allCategorien();
    }


    public function getDrankSoorten()
    {
        return Menu::drankSoorten();
    }

    public function getGerechtSoorten()
    {
        return Menu::gerechtSoorten();
    }

    public function drankToevoegen($req)
    {
        Menu::voeg($req->naam, $req->soort, $req->prijs);
        header("Location: ../views/dranken.php");
    }

    public function gerechtToevoegen($req)
    {
        Menu::voeg($req->naam, $req->soort, $req->prijs);
        header("Location: ../views/eten.php");
    }
}
