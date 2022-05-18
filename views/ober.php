<?php 
require '../controllers/RequestController.php';

include 'navbar.php';

//haal alle bestellingen op voor de kok
$bestellingController = new BestellingController();
$bestellingen = $bestellingController->all();
?>

<table>
  <tr>
    <th>Tafel</th>
    <th>Aantal</th>
    <th>Gerecht</th>
    <td>Geserveerd</td>
  </tr>
  <?php foreach ($bestellingen as $bestelling) { ?>
  <tr >
    <td class="p-4 m-5"><?php echo $bestelling->tafel; ?></td>
    <td class="p-4 m-5"><?php echo $bestelling->aantal; ?></td>
    <td class="p-4 m-5"><?php echo $bestelling->gerecht; ?></td>
    <!-- if statement voor als de bestelling al geserveerd is laat dan geen knop zien-->
    <?php if ($bestelling->geserveerd == false) { ?>
    <td class="p-4 m-5"><form action="../controllers/RequestController.php">
      <input type="hidden" name="class" value="bestelling">
      <input type="hidden" name="method" value="geserveerd">
      <input type="hidden" name="id" value="<?php echo $bestelling->id; ?>">
      <button class="m-0 bg-blue-200 hover:bg-blue-100 p-2" type="submit">Zet als geserveerd</button>
    </form></td> 
    <?php } else { ?>
      <td class="bg-green-300 p-4 m-5">Geserveerd</td> 
      <?php }?>
  </tr>
  <?php } ?>
</table>