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
    <link rel="stylesheet" href="admin_side.css">
    <link rel="stylesheet" href="admin_meny.css">
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
  /*if(!isset($_SERVER['HTTP_REFERER'])){
      header('location: logg_inn_admin.php');
      exit;
  }*/
  include "meny.php";
  ?>
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Søk her..." title="Type in a name">
  <?php
  include "conn.php";
  if (isset($_POST['slett'])){
      $selected_verktoy = $_POST['slett'];
      $sql = "DELETE FROM verktoy WHERE id_verktoy=$selected_verktoy";
      $resultat = $kobling->query($sql);
  }
  $sql = "SELECT * FROM verktoy LEFT JOIN bruker ON verktoy.id_bruker=bruker.id_bruker LEFT JOIN kit ON verktoy.id_kit = kit.id_kit";
  $resultat = $kobling->query($sql);

  echo "<div id='mother_div'>";
      echo "<table id='verktoytabell'>";
          echo "<tr>";
              echo "<th>Hylle</th>";
              echo "<th>Kasse</th>";
              echo "<th>Delenummer</th>";
              echo "<th>Kit</th>";
              echo "<th>Beskrivelse</th>";
              echo "<th>Verktøynummer</th>";
              echo "<th>Bruker</th>";
              echo "<th>Status</th>";
              echo "<th>Slett Verktøy</th>";
              echo "<th>Endre Verktøy</th>";
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
          $kit_navn = $rad["kit_navn"];
        echo "<form method='POST'"; 
            echo "<tr>";
                echo "<td name='hylle_innhold' contenteditable='true'>$hylle</td>";
                echo "<td name='kasse_innhold' contenteditable='true'>$kasse</td>";
                echo "<td name='delenummer_innhold' contenteditable='true'>$delenummer</td>";
                echo "<td>$kit_navn</td>";
                echo "<td name='beskrivelse_innhold' contenteditable='true'>$beskrivelse</td>";
                echo "<td name='verktoynummer_innhold' contenteditable='true'>$verktøynummer</td>";
                echo "<td>$brukernavn</td>";
                echo "<td name='status_innhold' contenteditable='true'>$status</td>";
                echo "<td>  <button class='slett_knapp' type='button' value='$id_verktøy'> SLETT </button>  </td>";
                echo "<td> <button name='lagre_knapp' class='lagre_knapp'>LAGRE</button></td>";
                echo "<td name='id_verktøy_innhold' contenteditable='true'>$id_verktøy</td>";
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

    <!-- START endre Funksjon -->
    <?php
        if (isset($_POST['lagre_knapp'])) {
            $id_verktoy_update = $_POST['id_verktøy_innhold'];
            $hylle1 = $_POST['hylle_innhold'];
            $kasse1 = $_POST['kasse_innhold'];
            $delenummer1 = $_POST['delenummer_innhold'];
            $beskrivelse1 = $_POST['beskrivelse_innhold'];
            $verktoynummer1 = $_POST['verktoynummer_innhold'];

            $sql_update = "UPDATE verktoy SET hylle='$hylle1' kasse='$kasse1', delenummer='$delenummer1', beskrivelse='$beskrivelse1', verktoynummer='$verktoynummer1'   WHERE id_verktoy = '$id_verktoy_update'";
            $result = $kobling->query($sql_update);
        };
    ?>
    <!-- END endre Funksjon -->
</body>
</html>