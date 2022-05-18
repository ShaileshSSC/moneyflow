<?php 
require '../controllers/RequestController.php';

include 'navbar.php';

//haal alle dranken op voor de barman
$bestellingController = new BestellingController();
$bestelling_dranken = $bestellingController->dranken();
?>

<table>
  <tr>
    <th>Tafel</th>
    <th>Aantal</th>
    <th>Gerecht</th>
  </tr>
  <?php foreach ($bestelling_dranken as $bestelling_drank) { ?>
  <tr >
    <td class="p-4 m-5"><?php echo $bestelling_drank->tafel; ?></td>
    <td class="p-4 m-5"><?php echo $bestelling_drank->aantal; ?></td>
    <td class="p-4 m-5"><?php echo $bestelling_drank->drank; ?></td>
  </tr>
  <?php } ?>
</table>