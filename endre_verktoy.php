


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=ph, initial-scale=1.0">
  <link rel="stylesheet" href="meny.css">
  <title>Document</title>
</head>
<body>
  <?php
include "meny.php";
?>

<?php

;


if(isset($_GET['verktoy'])){
  $servername = "10.100.0.2";
  $username = "im2a";
  $password = "Passord2";
  $dbname = "sulland_verktoy";
    
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $endre_id = $_GET['verktoy'];

}  else{
  die("du må vlge et vrektøy");
}


$sql = "SELECT * FROM verktoy WHERE id_verktoy='$endre_id'";
$resultat = $conn->query($sql);

echo "<from method='POST'>";
while($rad = $resultat->fetch_assoc())  {
  $id_verktoy = $rad["id_verktoy"];
  $hylle = $rad["hylle"];
  $kasse = $rad["kasse"];
  $delenummer = $rad["delenummer"];
  $id_kit = $rad["id_kit"];
  $beskrivelse = $rad["beskrivelse"];
  $verktoynummer = $rad["verktoynummer"];
  $id_bruker = $rad["id_bruker"];
  $status = $rad["status"];


  echo "id_verktøy";
  echo " <input type='text' name='id_verktøy' id='id_verktøy' value='$id_verktoy' disabled>";

  echo"hylle";
  echo"<input type='text' name='hylle' id='hylle' value='$hylle'>";

  echo"kasse";
  echo" <input type='text' name='kasse' id='kasse'value='$kasse'>";

  echo"delenummer";
  echo" <input type='text' name='delenummer' id='delenummer'value='$delenummer'>";

  echo"id_kit";
  echo" <input type='text' name='id_kit' id='id_kit'value='$id_kit'>";

  echo"beskrivelse";
  echo"  <input type='text' name='beskrivelse' id='beskrivelse'value='$beskrivelse'>";

  echo"verktoynummer";
  echo"<input type='text' name='verktoynummer' id='verktoynummer' value='$verktoynummer'>";

  




 echo " <input type='submit' name='endre' value='endre'> " ;
 echo "</form>";


}
  



?>





</body>



</html>

