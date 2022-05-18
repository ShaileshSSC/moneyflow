<?php 
require '../controllers/RequestController.php';

include 'navbar.php';

$reservering_id = $_GET['id'];

$bestellingController = new BestellingController();
//dit zijn alle totale bestellingen die de tafel heeft gekregen 
$bestellingen = $bestellingController->afrekenBestellingen($reservering_id);

$totaal = 0;

?>


<!-- Hieronder zijn de bestellingen die afgerekent moeten worden-->

<table>
  <tr>
    <th>Artikel</th>
    <th>Aantal</th>
    <th>Prijs</th>
    <th>Totaal</th>
  </tr>
  <?php foreach ($bestellingen as $bestelling) { 
    $subtotaal = $bestelling->aantal * $bestelling->prijs;
    $totaal += $subtotaal;
    ?>
  <tr >
    <td class="p-4 m-5"><?php echo $bestelling->naam; ?></td>
    <td class="p-4 m-5"><?php echo $bestelling->aantal; ?></td>
    <td class="p-4 m-5"><?php echo $bestelling->prijs; ?></td>
    <td class="p-4 m-5"><?php echo $subtotaal; ?></td>
  </tr>
  <?php } ?>
  <tr class="ml-10">
    <td></td>
    <td>Totaal</td>
    <td></td>
    <td class=" ml-10 text-2xl"><?php echo $totaal; ?></td>
  </tr>
</table>



