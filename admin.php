<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin_side.css">
    <link rel="stylesheet" href="css/admin_meny.css">
    <!-- En link for å hente font fra google  --> 
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>

  <!-- START PHP Hente Data Fra Databasen --> 
  <?php
  if ($_SESSION['logged_in'] == TRUE) {
  }
  else {
      header('location: logg_inn_admin.php');
      exit;
  }

  include "meny.php";
  ?>
  <!-- Søke Feltet -->
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Søk her..." title="Type in a name">
  <?php
  include "conn.php";
  //START Slett Funksjon//
  if (isset($_POST['slett'])){
      $selected_verktoy = $_POST['slett'];
      $sql = "DELETE FROM verktoy WHERE id_verktoy=$selected_verktoy";
      $resultat = $kobling->query($sql);
  }
  //END Slett Funksjon//

  //START Endre Funksjon//
  if (isset($_POST['lagre_knapp']) || isset($_POST['kits'])) {
    $id_verktoy_update = $_POST['id_verktøy_innhold'];
    $hylle1 = $_POST['hylle_innhold'];
    $kasse1 = $_POST['kasse_innhold'];
    $delenummer1 = $_POST['delenummer_innhold'];
    $beskrivelse1 = $_POST['beskrivelse_innhold'];
    $verktoynummer1 = $_POST['verktoynummer_innhold'];
    $status1 = $_POST['status_innhold'];

    $sql_update = "UPDATE verktoy SET hylle='$hylle1', kasse='$kasse1', delenummer='$delenummer1', beskrivelse='$beskrivelse1', verktoynummer='$verktoynummer1', status='$status1' WHERE id_verktoy = '$id_verktoy_update'";
    $result = $kobling->query($sql_update);
  }
  //END Endre Funksjon//

  //START Endre Kit Funksjon//
  if (isset($_POST['kits'])) {
    $id_verktoy_update2 = $_POST['id_verktøy_innhold'];
    $get_kit = $_POST['kits'];

    $sql_update2 = "UPDATE verktoy SET id_kit='$get_kit' WHERE id_verktoy = '$id_verktoy_update2'";
    $result2 = $kobling->query($sql_update2);
  }
  //END Endre Kit Funksjon//

  $sql = "SELECT * FROM verktoy LEFT JOIN bruker ON verktoy.id_bruker=bruker.id_bruker LEFT JOIN kit ON verktoy.id_kit = kit.id_kit";
  $resultat = $kobling->query($sql);

  echo "<div id='mother_div'>";
      echo "<table id='verktoytabell'>";
          echo "<tr>";
              echo "<th>Hylle</th>";
              echo "<th>Kasse</th>";
              echo "<th>Delenummer</th>";
              echo "<th>Beskrivelse</th>";
              echo "<th>Verktøynummer</th>";
              echo "<th>Bruker</th>";
              echo "<th>Status</th>";
              echo "<th>Kit</th>";
              echo "<th>Slett Verktøy</th>";
              echo "<th>Endre Verktøy</th>";
          echo "</tr>";
      while($rad = $resultat->fetch_assoc()) {
          $id_verktøy = $rad["id_verktoy"];
          $hylle = $rad["hylle"];
          $kasse = $rad["kasse"];
          $delenummer = $rad["delenummer"];
          $idkit = $rad["id_kit"];
          $kitnavn_kit_tabel = $rad["kit_navn"];
          $beskrivelse = $rad["beskrivelse"];
          $verktøynummer = $rad["verktoynummer"];
          $id_bruker = $rad["id_bruker"];
          $status = $rad["status"];
          $brukernavn = $rad["brukernavn"];
          
        echo "<form method='POST'>"; 
            echo "<tr>";
 
                echo "<td>";
                echo "<input class='data' type='text' name='hylle_innhold' value='$hylle'>";
                echo "</td>";

                echo "<td>";
                echo "<input class='data' type='text' name='kasse_innhold' value='$kasse'>";
                echo "</td>";

                echo "<td>";
                echo "<input class='data' type='text' name='delenummer_innhold' value='$delenummer'>";
                echo "</td>";

                echo "<td>";
                echo "<input class='data' type='text' name='beskrivelse_innhold' value='$beskrivelse'>";
                echo "</td>";

                echo "<td>";
                echo "<input class='data' type='text' name='verktoynummer_innhold' value='$verktøynummer'>";
                echo "</td>";

                echo "<td>$brukernavn</td>";

                echo "<td>";
                echo "<input class='data' type='text' name='status_innhold' value='$status'>";
                echo "</td>";

                echo "<td style='width:10%'>";
                echo "<select class='data' name='kits' onchange='this.form.submit()'>";  
                echo "<option value='no_kit'>$kitnavn_kit_tabel</option>"; 
                $sql3 = "SELECT * FROM kit";
                $resultat3 = $kobling->query($sql3);
                while ($rad = $resultat3->fetch_assoc()) {
                    $id_kit = $rad["id_kit"];
                    $kitnavn = $rad["kit_navn"];
                    echo "<option value=$id_kit>$kitnavn</option>";
                }
                echo "</select>";
                echo "</td>";

                echo "<td>  <button class='slett_knapp' type='button' value='$id_verktøy'> Slett </button>  </td>";
                echo "<td> <button name='lagre_knapp' class='lagre_knapp'>Lagre</button></td>";

                echo "<td>";
                echo "<input type='hidden' name='id_verktøy_innhold' value='$id_verktøy'>";
                echo "</td>";
                
            echo "</tr>";  
        echo "</form>";
        
      }
      echo "</table>";
  echo "</div>";

  mysqli_close($kobling);
  ?>
  <!-- END PHP Hente Data Fra Databasen -->


  <!-- START Søke Funksjon -->
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
      const setTheme = theme => document.documentElement.className = theme;
      document.getElementById('theme-select').addEventListener('change', function() {
      setTheme(this.value);
      });
  </script>
  <!-- END Søke Funksjon -->

  
  <!-- START Slett Funksjon -->
  <dialog class="modal" id="modal">
      <h2>Bekreft Sletting</h2>
      <form method='POST'>
            <button id="slett_button" class="slett_button" name='slett' value='' > Slett </button>
            <button id="avbryt_button" class="avbryt_button" type='submit' name='avbryt'> Avbryt </button>
      </form>
  </dialog>
  <script>
      var modal = document.querySelector("#modal"); 
      var open_buttons = document.querySelectorAll(".slett_knapp");
      var close_button = document.querySelector(".slett_button");
      var slett_knapp_value
  
      open_buttons.forEach(btn => {
          btn.addEventListener("click", () => {
              slett_knapp_value = btn.value;
              document.getElementById("slett_button").value = slett_knapp_value;
              modal.showModal();
          })    
      }) ;
      close_button.addEventListener("click", () => {
          modal.close();
      });
  </script>
  <!-- END Slett Funksjon -->
    
</body>
</html>