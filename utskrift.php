<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utskriftsvisning</title>
    <link rel="stylesheet" href="css/meny.css">
    <link rel="stylesheet" href="css/utskrift.css">
</head>
<body>
<?php include "meny_forside.html"; ?>
<?php include "conn.php";

$sql = "SELECT * FROM verktoy LEFT JOIN bruker ON verktoy.id_bruker=bruker.id_bruker LEFT JOIN kit ON verktoy.id_kit = kit.id_kit ORDER BY hylle, kasse";
$resultat = $kobling->query($sql);

?>
<table id='verktoytabell'>
<thead>
  <tr> 
    <th data-type="number" style='width:5%'>Hylle</th>
    <th style='width:5%'>Kasse</th>
    <th>Delenummer</th>
    <th style='width:5%'>Kit</th>
    <th style='width:11%'>Verktøynummer</th>
    <th style='width:80%'>Beskrivelse</th>
    <th>Lånt av</th>
    <th>Status</th>
  </tr>
</thead>
<tbody>
<?php

while($rad = $resultat->fetch_assoc()) {
$id_verktøy = $rad["id_verktoy"];
$hylle = $rad["hylle"];
$kasse = $rad["kasse"];
$delenummer = $rad["delenummer"];
$kit_navn = $rad["kit_navn"];
$beskrivelse = $rad["beskrivelse"];
$verktøynummer = $rad["verktoynummer"];
$id_bruker = $rad["id_bruker"];
$status = $rad["status"];
$brukernavn = $rad["brukernavn"];

  echo "<tr>";
    echo "<td>$hylle</td>";
    echo "<td>$kasse</td>";
    echo "<td>$delenummer</td>";
    echo "<td>$kit_navn</td>";
    echo "<td>$verktøynummer</td>";
    echo "<td class='beskrivelse'>$beskrivelse</td>";
    echo "<td>$brukernavn</td>";
    echo "<td>$status</td>";
  echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "</div>"

?>

</body>
</html>

