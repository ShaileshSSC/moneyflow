<?php 

require '../controllers/RequestController.php';

include 'navbar.php';


//reservering overzicht pagina voor medewerkers
$reservering_id = $_GET['id'];
$reserveringController = new ReserveringController();
$reservering = $reserveringController->find($reservering_id);
?>


<form action="../controllers/RequestController.php">
  <input type="hidden" name="id" value="<?php echo $reservering_id; ?>">
  <input type="hidden" name="class" value="reservering">
  <input type="hidden" name="method" value="update">
<table>
  <tr>
    <th>Datum</th>
    <th>Tijd</th>
    <th>Tafel</th>
    <th>Aantal</th>
    <th>#</th>
  </tr>
  <tr>
    <td class="p-4 m-5"><input type="date" name="datum" value="<?php echo $reservering->datum; ?>"></td>
    <td class="p-4 m-5"><input type="time" name="tijd" value="<?php echo $reservering->tijd; ?>"></td>
    <td class="p-4 m-5"><input type="number" name="tafel" value="<?php echo $reservering->tafel; ?>"></td>
    <td class="p-4 m-5"><input type="number" name="aantal" value="<?php echo $reservering->aantal; ?>"></td>
    <td class="p-4 m-5"><input class="p-2 text-xs hover:bg-green-300 bg-green-200" type="submit" value="Opslaan"></td>
  </tr>
</table>
</form>