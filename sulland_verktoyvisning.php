
<!-- en button tag so gjør at du kommer deg till toppen av siden-->
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<?php 
 include "conn.php";
?>

<div class='logo'>
  <h1 style="font-family: Drive,Helvetica,Arial,sans-serif; font-size: 300%" >SUllAND</h1>



  <!-- skjema valg av bruker -->
  <?php
  $sql2 = "SELECT * FROM bruker";
  $resultat_bruker = $kobling->query($sql2);
  ?>

  <!-- kjører POST bruker når vi endrer valgt bruker -->


<form id="bruker_valg" method="POST">
<select name="bruker" required onchange="this.form.submit()" >
      <option value="no_bruker">Endre bruker</option>

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
  $id = $_SESSION['valgt_bruker'];

  $sql3 = "SELECT * FROM bruker WHERE id_bruker = $id";
  $resultat_valgtbruker = $kobling->query($sql3);
  $rad = $resultat_valgtbruker->fetch_assoc();
  $valgt_brukernavn = $rad['brukernavn'];
  $_SESSION["brukernavn"] = $valgt_brukernavn;}





  echo "<h1>";
  if (isset($_SESSION['valgt_bruker'])){
 
  echo $_SESSION["brukernavn"];

  }else {
  echo 'Velg en bruker';
  }
  echo "</h1>";
  if (isset($_POST['submit_lan']) and isset($_SESSION["valgt_bruker"])   ){

    $id_verktoylan = $_POST['verktoy_lan'];
    $insert_bruker = $_SESSION["valgt_bruker"];

    $sql_lånupdate = "UPDATE verktoy SET id_bruker = $insert_bruker WHERE id_verktoy=$id_verktoylan";

    $kobling->query($sql_lånupdate);



  } elseif (isset($_POST['submit_lan']) and !isset($_SESSION["valgt_bruker"])   ){
  echo "
  <script>
    alert('velg bruker');
  </script> ";
  }



  ?>





</div>
<!-- Søkefungsjon -->
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Søk her..." title="Type in a name">

<?php

 

  $sql = "SELECT * FROM verktoy LEFT JOIN bruker ON verktoy.id_bruker=bruker.id_bruker LEFT JOIN kit ON verktoy.id_kit = kit.id_kit ORDER BY hylle, kasse";
  $resultat = $kobling->query($sql);

  ?>
  <div class='stil'>
    <table id='verktoytabell'>
      <thead>
        <tr>
        
          <th data-type="number">Hylle</th>
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
    echo "</tbody>";
    echo "</table>";
  echo "</div>"
    ?>
<!-- min lån sjekker -->
<?php
if($_SESSION['feilmelding_minelan'] == NULL){
  // gjør ingenting
} elseif ($_SESSION['feilmelding_minelan'] == TRUE) {
  $_SESSION['feilmelding_minelan'] = NULL;
  echo "
    <script>
      alert('velg bruker');
    </script> ";
  
}
?>
<script src="sulland_verktoyvisning.js"></script>
