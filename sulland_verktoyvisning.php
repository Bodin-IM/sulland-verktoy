<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sulland's verktøy</title>
    <link rel="stylesheet" href="meny.css">
    <link rel="stylesheet" href="sulland.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>

table {
    width: 100%;
    height: 100%;
    border: 1px solid black;
    background-color: #f2f2f2;
    border-collapse: collapse;
    background: #0b2028;
    color: #f2f2f2;
   
}
th, td {
border-left: 1px solid black;
border-right: 1px solid black;
border-collapse: collapse;
padding-left: 10px
}
tr {
  height: 4vh;
  
}
tr:nth-child(odd) {
  background: #032530;
}
tr:nth-child(even) {
  background: #0b2028;
}
tr:hover {
  background: #0d313f;
  height: 60px;
}
.stil {
    width: 70%;
    height: 50%;
    display: flex;
    justify-content: center;
    font-family: Drive,Helvetica,Arial,sans-serif;
    position: relative;
    left: 15%;
    
}
.logo {
    position: relative;
    height: 100px;
    width: 100%;
    background-color: #0b2028;
    margin: 0;
}





#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 70%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  position: relative;
  left: 15%;
}

#myTable {
  border-collapse: collapse;
  width: 70%;
  border: 1px solid #ddd;
  font-size: 18px;
  position: relative;
  left: 15%;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}


    </style>
</head>

<body>
<div class='logo'>
<img src='SUllAND.png' alt='SUllAND' style= 'width:250px;'>
</div>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

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


<script>

function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();

  
  table = document.getElementById("verktoytabell");
  var rows = table.getElementsByTagName("tr");
 
  for (i = 1; i < rows.length; i++) {
    var cells = rows[i].getElementsByTagName("td");
    var j;
    var rowContainsFilter = false;
    for (j = 0; j < cells.length; j++) {
      if (cells[j]) {
        if (cells[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
          rowContainsFilter = true;
          continue;
        }
      }
    }

    if (! rowContainsFilter) {
      rows[i].style.display = "none";
    } else {
      rows[i].style.display = "";
    }
  }
}

</script>

</body>
</html>