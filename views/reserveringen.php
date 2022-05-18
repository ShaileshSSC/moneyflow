<?php 

require '../controllers/RequestController.php';

include 'navbar.php';


//reservering overzicht pagina voor medewerkers
$reserveringController = new ReserveringController();
$reserveringen = $reserveringController->all();
?>

<table>
  <tr>
    <th>Datum</th>
    <th>Tijd</th>
    <th>Tafel</th>
    <th>Klantnaam</th>
    <th>Telefoonnumer</th>
    <th>Aantal</th>
    <th>+</th>
    <th>-</th>
    <th>#</th>
  </tr>
  <?php foreach ($reserveringen as $reservering) { ?>
  <tr >
    <td class="p-4 m-5"><?php echo $reservering->datum; ?></td>
    <td class="p-4 m-5"><?php echo $reservering->tijd; ?></td>
    <td class="p-4 m-5"><?php echo $reservering->tafel; ?></td>
    <td class="p-4 m-5"><?php echo $reservering->naam; ?></td>
    <td class="p-4 m-5"><?php echo $reservering->telefoon;?></td>
    <td class="p-4 m-5"><?php echo $reservering->aantal; ?></td>
    <td class="p-4 m-5"><a class="p-2 bg-blue-200 hover:bg-blue-100" href="../controllers/RequestController.php?method=edit&class=reservering&id=<?php echo $reservering->id; ?>">Edit</a></td>
    <td class="p-4 m-5"><a class="p-2 bg-red-200 hover:bg-red-100" href="../controllers/RequestController.php?method=delete&class=reservering&id=<?php echo $reservering->id; ?>"><i style="font-size:24px" class="fa">&#xf014;</i></a></td>
    <!-- als klant gerserveerd heeft kan je niet gelijk bestellen zonder tafel -->
    <?php if($reservering->tafel != null) { ?>
    <td class="p-4 m-5"><a class="p-2 bg-green-200 hover:bg-green-100" href="../controllers/RequestController.php?method=bestellen&class=bestelling&id=<?php echo $reservering->id; ?>">Bestellen</a></td>
      <?php } ?>
  </tr>
  <?php } ?>
</table>