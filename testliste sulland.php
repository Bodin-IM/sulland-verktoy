<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sulland - verktøy</title>
    <link rel="stylesheet" href="meny.css">
    <link rel="stylesheet" href="sulland.css">
    <link rel="stylesheet" href="testliste_sulland.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    
</head>

<body>
<div class='logo'>
<img src='SUllAND.png' alt='SUllAND' style= 'width:250px;'>
</div>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Søk her..." title="Type in a name">

<?php

  $tjener = "10.100.0.2";
  $brukernavn = "im2a";
  $passord = "Passord2";
  $database = "sulland_verktoy";

  $kobling = new mysqli ($tjener, $brukernavn, $passord, $database);

  $sql = "SELECT * FROM verktoy";
  $resultat = $kobling->query($sql);

  echo "<div class='stil'>";
    echo "<table id='verktoytabell'>";
      echo "<tr>";

        //echo "<th>id_verktøy</th>";
        echo "<th>hylle</th>";
        echo "<th style='width:5%'>kasse</th>";
        echo "<th>delenummer</th>";
        echo "<th style='width:5%'>id_kit</th>";
        echo "<th style='width:11%'>verktøynummer</th>";
        echo "<th style='width:80%'>beskrivelse</th>";
        echo "<th>id_bruker</th>";
        echo "<th>status</th>";

      echo "</tr>";

    while($rad = $resultat->fetch_assoc()) {
      $id_verktøy = $rad["id_verktoy"];
      $hylle = $rad["hylle"];
      $kasse = $rad["kasse"];
      $delenummer = $rad["delenummer"];
      $id_kit = $rad["id_kit"];
      $beskrivelse = $rad["beskrivelse"];
      $verktøynummer = $rad["verktoynummer"];
      $id_bruker = $rad["id_bruker"];
      $status = $rad["status"];

        echo "<tr>";
          //echo "<td>$id_verktøy</td>";
          echo "<td>$hylle</td>";
          echo "<td>$kasse</td>";
          echo "<td>$delenummer</td>";
          echo "<td>$id_kit</td>";
          echo "<td>$verktøynummer</td>";
          echo "<td class='beskrivelse'>$beskrivelse</td>";
          echo "<td>$id_bruker</td>";
          echo "<td>$status</td>";
        echo "</tr>";
    }

    echo "</table>";
  echo "</div>"
?>

<script src="testliste_sulland.js"></script>


</body>
</html>