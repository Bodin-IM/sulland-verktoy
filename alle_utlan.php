<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sulland - verktøy</title>
  <link rel="stylesheet" href="css/admin_meny.css">
  <link rel="stylesheet" href="css/alle_utlån.css">
  <!-- En link for å hente font fra google  -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
  <?php
  if ($_SESSION['logged_in'] == TRUE) {
  } else {
    header('location: logg_inn_admin.php');
    exit;
  }
  include "conn.php";
  include "meny.php";
  ?>
  <br>
  <?php
  if (isset($_POST['submit_fjern_lan'])) {
    $id_verktoylan = $_POST['verktoy_lan'];
    $sql_lånupdate = "UPDATE verktoy SET id_bruker = NULL WHERE id_verktoy=$id_verktoylan";
    $kobling->query($sql_lånupdate);
  }
  $sql = "SELECT* FROM verktoy JOIN bruker ON verktoy.id_bruker=bruker.id_bruker LEFT JOIN kit ON verktoy.id_kit = kit.id_kit";

  $resultat = $kobling->query($sql);
  echo "<div id='big_box'>";
  echo "<table id='tabell'>";
  echo "<tr>";
  echo "<th> Hylle </th>";
  echo "<th> Kasse </th>";
  echo "<th> Delenummer </td>";
  echo "<th> Kit </th>";
  echo "<th> Verktøynummer </th>";
  echo "<th> Beskrivelse </th>";
  echo "<th> Brukernavn </th>";
  echo "<th> Fjern Lån </th>";
  echo "<th> Status </th>";
  echo "</tr>";
  while ($rad = $resultat->fetch_assoc()) {
    $verktoynummer = $rad["verktoynummer"];
    $hylle = $rad["hylle"];
    $brukernavn = $rad["brukernavn"];
    $id_verktøy = $rad["id_verktoy"];
    $kasse = $rad["kasse"];
    $delenummer = $rad["delenummer"];
    $beskrivelse = $rad["beskrivelse"];
    $status = $rad["status"];
    $kit_navn = $rad["kit_navn"];
    $id_bruker = $rad["id_bruker"];


    echo "<tr>";
    echo "<td> $hylle </td>";
    echo "<td> $kasse </td>";
    echo "<td> $delenummer </td>";
    echo "<td> $kit_navn </td>";
    echo "<td> $verktoynummer </td>";
    echo "<td> $beskrivelse </td>";
    echo "<td> $brukernavn </td>";
    echo "<td>";
    if ($id_bruker != NULL) {
      echo "<form method='post'>
                <input type='hidden' value='$id_verktøy' name='verktoy_lan'>
                <input class='fjern_knapp' type='submit' value='Fjern Lån' name='submit_fjern_lan'>
              </form>";
    } else {
      echo "$brukernavn";
    }
    echo "<td> $status </td>";
    //tabel for alle utlån
    echo " </td>";
    echo "</tr>";
  }
  echo "</table>";
  echo "</div>"
  ?>

</body>

</html>