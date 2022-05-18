<?php

require '../model/Reservering.class.php';
require '../model/Klant.class.php';

class ReserveringController {

    public function all()
    {
        return Reservering::all();
    }

    public function delete($req)
    {
        Reservering::delete($req->id);
        header("Location: ../views/reserveringen.php");
    }

    public function reserveringenVandaag($req)
    {
        echo 'deze functionailteitWerkt nog niet :/';
    }

    public function find($id)
    {
        return Reservering::find($id);
    }

    public function toevoegen($req)
    {
        //eerst klant registreren voor het reserveren
        Klant::register($req->naam, $req->email, $req->tel);

        $klant = Klant::find($req->naam);

        Reservering::toevoegen($req->datum, $req->tijd, $klant->id, $req->aantal, $req->alergien, $req->opmerkingen);
        header("Location: ../views/reserveren.php");
    }

    public function create($id)
    {
        header("Location: ../views/reserveren.php");
    }

    public function edit($req)
    {
        header("Location: ../views/res_edit.php?id=$req->id");
    }

    public function update($req)
    {
        Reservering::update($req->id, $req->datum, $req->tijd, $req->tafel, $req->aantal);
        header("Location: ../views/reserveringen.php");
    }
}