<?php 
require '../controllers/RequestController.php';

include 'navbar.php';

$reservering_id = $_GET['id'];
$reserveringController = new ReserveringController();
$reservering = $reserveringController->find($reservering_id);


$bestellingController = new BestellingController();
//dit zijn alle bestellingen die nog gemaakt moeten worden voor een tafel
$bestellingen_op_reserveringnummer = $bestellingController->vanReservering($reservering_id);

$menuController = new MenuController();
$menuCategorien = $menuController->getAllCategorien();
$menuSoorten = $menuController->getAllSoorten();
$menu = $menuController->all();

?>


<!-- Hieronder zijn de bestellingen die bij de tafel horen -->
<h1 class="m-4 text-5xl">Tafel <?php echo $reservering->tafel; ?></h1>
<table>
  <tr>
    <th>Artikel</th>
    <th>Aantal</th>
    <th>Prijs</th>
    <th>Totaal</th>
    <th>-</th>
    <th>+</th>
    <th></th>
  </tr>
  <?php foreach ($bestellingen_op_reserveringnummer as $bestelling) { 
    $totaal = $bestelling->aantal * $bestelling->prijs;
    ?>
  <tr >
    <td class="p-4 m-5"><?php echo $bestelling->naam; ?></td>
    <td class="p-4 m-5"><?php echo $bestelling->aantal; ?></td>
    <td class="p-4 m-5"><?php echo $bestelling->prijs; ?></td>
    <td class="p-4 m-5"><?php echo $totaal; ?></td>
    <td class="p-4 m-5"><a class="p-2 bg-red-200 hover:bg-red-100" href="../controllers/RequestController.php?method=aantalMin&class=bestelling&id=<?php echo $bestelling->id;?>&res_id=<?php echo $reservering_id; ?>">-</a></td>
    <td class="p-4 m-5"><a class="p-2 bg-green-200 hover:bg-green-100" href="../controllers/RequestController.php?method=aantalPlus&class=bestelling&id=<?php echo $bestelling->id; ?>&res_id=<?php echo $reservering_id; ?>">+</a></td>
    <td class="p-4 m-5"><a class="p-2 bg-gray-200 hover:bg-gray-100" href="../controllers/RequestController.php?method=delete&class=bestelling&id=<?php echo $bestelling->id; ?>&res_id=<?php echo $reservering_id; ?>">Verwijder</a></td>
  </tr>
  <?php } ?>
</table>

<!-- Hier kan je afrekenen voor een specifieke tafel -->

<form method="get" action="../controllers/RequestController.php">
  <input type="hidden" name="class" value="bestelling">
  <input type="hidden" name="method" value="afrekenen">
  <input type="hidden" name="res_id" value="<?php echo $reservering_id; ?>">
  <input class="p-2 text-2xl hover:bg-blue-400 m-10 ml-5 bg-blue-300" type="submit" value="Afrekenen">
</form>


<!-- hieronder is het menu voor de ober -->

<div class="m-5 p-3 bg-gray-100">

<h5 class="text-3xl">Menu</h5>

<?php foreach ($menuCategorien as $cat) { ?>
<h5 class="text-2xl"><?php echo $cat->naam; ?></h5>
<?php foreach ($menuSoorten as $soort) { ?>

  <?php if ($soort->gerechtcategorien_id == $cat->id) { ?>

    <h5 class="text-1xl"><?php echo $soort->naam; ?></h5>

        <?php foreach ($menu as $item) { ?>

          <?php if($item->gerechtsoort_id == $soort->id) { ?>
            <form action="../controllers/RequestController.php">
              <input type="hidden" name="class" value="bestelling">
              <input type="hidden" name="method" value="toevoegen">
              <input type="hidden" name="res_id" value="<?php echo $reservering_id; ?>">
              <input type="hidden" name="id" value="<?php echo $item->id; ?>">
              <label class=" m-5 p-1 w-1/4 text-md "for=""> - <?php echo $item->naam; ?></label>
              <input class="p-2 text-xs hover:bg-green-300 bg-green-200" type="submit" value="Toevoegen aan bestelling">
              <label class=" m-5 p-1 w-1/4 text-md "for=""> € <?php echo $item->prijs; ?></label>
            </form>
            <?php } ?>
 <?php } ?>
 <?php } ?>
 <?php } ?>
 <?php } ?>

  </div>