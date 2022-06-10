<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sulland - verktøy</title>
</head>
<body>

<?php 

    if(isset($_POST['submit_handleliste'])) {
        $valgte_verktoy = $_POST['verktoy_handleliste'];  
        echo "$valgte_verktoy";
        include "conn.php";
        $sql = "SELECT * FROM verktoy LEFT JOIN bruker ON verktoy.id_bruker=bruker.id_bruker LEFT JOIN kit ON verktoy.id_kit = kit.id_kit WHERE id_verktoy IN($valgte_verktoy) ORDER BY hylle, kasse";

        $resultat = $kobling->query($sql);
    }
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
                echo "<td>$id_verktøy</td>";
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
    




</body>
</html>