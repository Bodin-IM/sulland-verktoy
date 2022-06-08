<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="brukere.css">
</head>
<body>




<?php
include "meny.php";
include "conn.php";

        $sql2 = "SELECT * FROM bruker";
        $resultat_bruker = $kobling->query($sql2);

        ?>
        


    <select name="brukere" required>
      <option value="">velg en bruker</option>
                <option value='no_bruker'></option>

      <?php
                while($rad = $resultat_bruker->fetch_assoc()) {
                    $id_bruker = $rad["id_bruker"];
                    $brukernavn = $rad["brukernavn"];

                    echo "<option value=$id_bruker>$brukernavn</option>";
                }

                
                ?>

              
     
    </select>




                                                                                              



</body>
</html>
 



