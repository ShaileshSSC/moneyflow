<?php

// pagin voor klanten om te reserveren



require '../controllers/RequestController.php';

include 'navbar.php';


?>
<form class="bg-gray-100" action="../controllers/RequestController.php">
    <input type="hidden" name="class" value="reservering">
    <input type="hidden" name="method" value="toevoegen">
    <label class="p-2 m-2" for="">Naam</label>
    <input class="p-2 m-2"type="text" name="naam"><br>
    <label class="p-2 m-2" for="">Datum</label>
    <input class="p-2 m-2" type="date" name="datum" id=""><br>
    <label class="p-2 m-2" for="tijd">Tijd</label>
    <input class="p-2 m-2" type="time" name="tijd" id=""><br>
    <label class="p-2 m-2" for="">Telefoon</label>
    <input class="p-2 m-2" type="tel" name="tel"><br>
    <label class="p-2 m-2" for="">Email</label>
    <input class="p-2 m-2" type="email" name="email"><br>
    <label class="p-2 m-2" for="">Aantal personen</label>
    <input class="p-2 m-2" type="number" name="aantal"><br>
    <label class="p-2 m-2" for="">Alergien</label>
    <input class="p-2 m-2" type="text" name="alergien"><br>
    <label class="p-2 m-2" for="">Opmerkingen</label>
    <input class="p-2 m-2" type="text" name="opmerkingen"><br>
    <input class="p-2 m-2 text-2xl hover:bg-blue-400 m-10 ml-5 bg-blue-300" type="submit" value="Reserveer">
</form>