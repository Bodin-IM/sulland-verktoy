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
  ?>