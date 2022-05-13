<?php 
session_start();
?>

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

:root,
:root.light {
  --bg-url: url('sulland_bakgrunn.png');
  --bg-size: 20%;
  --sok-bord: 5px solid #cccccc;
}

:root.dark {
  --bg-url: url('sulland_bakgrunn_dark.png');
  --bg-size: 20%;
  --bg-color: #3E3E3D;
  --sok-bord: 5px solid #262626;
}

body {
  margin: 0;
  background-color: var(--bg-color);
  background-image: var(--bg-url);
  background-size: var(--bg-size);
}

table {
    width: 100%;
    height: 100%;
    border: 1px solid black;
    background-color: #f2f2f2;
    border-collapse: collapse;
    background: #0b2028;
    color: #f2f2f2;
    box-shadow: 5px 5px 5px 5px #032530; 
   
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
    color: white;
}





#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 70%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: var(--sok-bord);
  margin-bottom: 12px;
  margin-top: 12px;
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

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #333;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}


    </style>
</head>

<body>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<?php 
 include "conn.php";
?>

<div class='logo'>
<h1 style="font-family: Helvetica; font-size: 400%" >SUllAND</h1>



<!-- skjema valg av bruker -->
<?php
$sql2 = "SELECT * FROM bruker";
$resultat_bruker = $kobling->query($sql2);
?>

<!-- kjører POST bruker når vi endrer valgt bruker -->


<form id="bruker_valg" method="POST">
<select name="bruker" required onchange="this.form.submit()" >
      <option value="no_bruker">velg en bruker</option>
      <?php
                while($rad = $resultat_bruker->fetch_assoc()) {
                    $id_bruker = $rad["id_bruker"];
                    $brukernavn = $rad["brukernavn"];

                    echo "<option value=$id_bruker>$brukernavn</option>";
                }

                
                ?>
     
    </select>
</form>



<?php 

// tar imot post fra valgt bruker
if (isset($_POST['bruker'])){

  $_SESSION["valgt_bruker"] = $_POST['bruker'];
  echo "<h1>";
  echo $_SESSION['valgt_bruker'] ;
  echo "</h1>";

} else {

}


if (isset($_POST['submit_lan']) and isset($_SESSION["valgt_bruker"])   ){

    $id_verktoylan = $_POST['verktoy_lan'];
    $insert_bruker = $_SESSION["valgt_bruker"];

    $sql_lånupdate = "UPDATE verktoy SET id_bruker = $insert_bruker WHERE id_verktoy=$id_verktoylan";

    $kobling->query($sql_lånupdate);



} 


?>




<select name="theme-select" id="theme-select">
  <option value="light">Light</option>
  <option value="dark">Dark</option>
</select>





</div>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Søk her..." title="Type in a name">

<?php

 

  $sql = "SELECT * FROM verktoy LEFT JOIN bruker ON verktoy.id_bruker=bruker.id_bruker";
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
        echo "<th>Lånt av</th>";
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
      $brukernavn = $rad["brukernavn"];

        echo "<tr>";
          //echo "<td>$id_verktøy</td>";
          echo "<td>$hylle</td>";
          echo "<td>$kasse</td>";
          echo "<td>$delenummer</td>";
          echo "<td>$id_kit</td>";
          echo "<td>$verktøynummer</td>";
          echo "<td class='beskrivelse'>$beskrivelse</td>";
          echo "<td>";
          
          if  ($id_bruker == NULL){
            echo "<form method='post'>
              <input type='hidden' value='$id_verktøy' name='verktoy_lan'>
              <input type='submit' value='Lån' name='submit_lan'>
            </form>";
          } else{
            echo "$brukernavn";
          }
                   
          
          
          
          echo "</td>";
          echo "<td>$status</td>";
        echo "</tr>";
    }

    echo "</table>";
  echo "</div>"
    ?>





<script>


// search function
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


// select theme
const setTheme = theme => document.documentElement.className = theme;
document.getElementById('theme-select').addEventListener('change', function() {
  setTheme(this.value);
});
</script>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</body>
</html>