<?php

//DIT IS DE CRUD DRANKEN
require '../controllers/RequestController.php';

include 'navbar.php';


$menuController = new MenuController();
$menuGerechten = $menuController->eten();
//krijg alle dranksoorten
$gerechtSoorten = $menuController->getGerechtSoorten();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-gray-100">


<!-- Hier is het CRUD formulier van dranken -->


    <h1 class="text-5xl ml-5">Eten</h1> <br>
    <div class="m-4 p-2">
    <?php foreach ($menuGerechten as $eten) { ?>
    <form method="post" action="../controllers/RequestController.php">
        <input type="hidden" name="class" value="menu">
        <input type="hidden" name="method" value="gerechtOpslaan">
        <input type="hidden" value="<?php echo $eten->id; ?>" name="id">
        <label for="naam">Drank naam</label>
        <input type="text" name="naam" value="<?php echo $eten->naam; ?>">
        <select name="soort" id="">
            <?php foreach ($gerechtSoorten as $key => $eetSoort) { ?>
                <!-- hieronder if statement als de id's overeenkomen zet dan een selected voor de input element -->
                <?php if($eetSoort->id == $eten->gerechtsoort_id) { ?>
            <option selected  value="<?php echo $eetSoort->id; ?>"><?php echo $eetSoort->naam; ?></option>
            <?php } else { ?>
                <option  value="<?php echo $eetSoort->id; ?>"><?php echo $eetSoort->naam; ?></option>
                <?php } ?>
            <?php } ?>
        </select>
        <label for="">Prijs</label>
        <input type="number" step=".01" name="prijs" value="<?php echo $eten->prijs; ?>">
        <input class="p-2 hover:bg-green-300 bg-green-200" type="submit" value="opslaan">
    </form>
    <form action="../controllers/RequestController.php">
        <input type="hidden" name="class" value="menu">
        <input type="hidden" name="method" value="gerechtDelete">
        <input type="hidden" name="id" value="<?php echo $eten->id; ?>">
        <input class="p-2 hover:bg-red-400 bg-red-300" type="submit" value="verwijder">
    </form> <br>
    <?php } ?>
    <br>

        <!-- Hier is het toevoeg formulier -->

    <h1 class="text-2xl ml-5">Nieuwe Gerecht toevoegen</h1> <br>
    <form action="../controllers/RequestController.php">
        <input type="hidden" name="class" value="menu">
        <input type="hidden" name="method" value="gerechtToevoegen">
        <label for="Nieuw drank toevoegen">Naam</label>
            <input type="text" name="naam" >
            <select name="soort" id="">
            <?php foreach ($gerechtSoorten as $key => $eetSoort) { ?>
                <option  value="<?php echo $eetSoort->id; ?>"><?php echo $eetSoort->naam; ?></option>
                <?php } ?>
            </select>
            <label for="">Prijs</label>
            <input type="number" step=".01" name="prijs">
            <input class="p-2 hover:bg-gray-300 bg-gray-200" type="submit" value="toevoegen">
    </form>
    </div>
</body>
</html>