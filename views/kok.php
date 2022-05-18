<?php 
require '../controllers/RequestController.php';

include 'navbar.php';

//haal alle bestellingen op voor de kok
$bestellingController = new BestellingController();
$bestellingen = $bestellingController->eten();
?>

<table>
  <tr>
    <th>Tafel</th>
    <th>Aantal</th>
    <th>Gerecht</th>
  </tr>
  <?php foreach ($bestellingen as $bestelling) { ?>
  <tr >
    <td class="p-4 m-5"><?php echo $bestelling->tafel; ?></td>
    <td class="p-4 m-5"><?php echo $bestelling->aantal; ?></td>
    <td class="p-4 m-5"><?php echo $bestelling->gerecht; ?></td>
  </tr>
  <?php } ?>
</table>