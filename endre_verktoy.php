<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="admin_meny.css">
    <link rel="stylesheet" href="endre_verktøy.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>
  <?php
include "meny.php";
include "conn.php";

if(isset($_GET['verktoy'])){
 
  
  $endre_id = $_GET['verktoy'];

}  else{
  die("du må vlge et vrektøy");
}


$sql = "SELECT * FROM verktoy WHERE id_verktoy='$endre_id'";
$resultat = $kobling->query($sql);

echo "<form class='form' method='POST'>";
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

  
  echo"<center class='center'>";
    echo "<div class='innpakning'>";

      echo "<div class='input'> ";
        echo" <div class='tekst'>"; echo"</div>";
        echo"<div class='box'>";
          echo " <input class='data' type='hidden' name='id_verktoy' value='$id_verktoy'>";
        echo "</div>";
      echo "</div>";


      echo "<div class='input'> ";
        echo" <div class='tekst'>";
          echo"Hylle";
        echo "</div>";
        echo"<div class='box'>";
          echo"<input class='data' type='text' name='hylle' id='hylle' value='$hylle'>";
        echo "</div>";
      echo "</div>";

      echo "<div class='input'> ";
        echo" <div class='tekst'>";
          echo"Kasse";
        echo "</div>";
        echo"<div class='box'>";
          echo" <input class='data' type='text' name='kasse' id='kasse'value='$kasse'>";
        echo "</div>";
      echo "</div>";

      echo "<div class='input'> ";
        echo" <div class='tekst'>";
          echo"Delenummer";
        echo "</div>";
        echo"<div class='box'>";
          echo" <input class='data' type='text' name='delenummer' id='delenummer'value='$delenummer'>";
        echo "</div>";
      echo "</div>";

      echo "<div class='input'> ";
      
        $sql2 = "SELECT * FROM kit";
        $resultat2 = $kobling->query($sql2);

        $nullkit =NULL;
        echo" <div class='tekst'>";
        echo "<label for='id_kit'>Kit</label> ";
        echo "</div>";  
        echo"<div class='box'>";
        echo"<div class='kit_select'>";
        
                echo "<select class='kit_select' name='id_kit'>";
                echo "<option value='no_kit'></option>";
                while($rad = $resultat2->fetch_assoc()) {
                    $id_kit = $rad["id_kit"];
                    $kitnavn = $rad["kit_navn"];

                    echo "<option value=$id_kit>$kitnavn</option>";
                }

                echo "</select>";
      
      echo "</div>";
      echo "</div>";  
      echo "</div>";

      echo "<div class='input'> ";
        echo" <div class='tekst'>";
          echo"Beskrivelse";
        echo "</div>";
        echo"<div class='box'>";
          echo"  <input class='data' type='text' name='beskrivelse' id='beskrivelse'value='$beskrivelse'>";
        echo "</div>";
      echo "</div>";

      echo "<div class='input'> ";
        echo" <div class='tekst'>";
          echo"Verktoynummer";
        echo "</div>";
        echo"<div class='box'>";
          echo"<input class='data' type='text' name='verktoynummer' id='verktoynummer' value='$verktoynummer'>";
        echo "</div>";
      echo "</div>";

      echo "<div class='submit'>";
        echo " <input class='button' type='submit' name='endre' value='Endre'> " ;
    echo "</form>";
  echo "</div>"; 
 echo"</center>";

}

if(isset($_POST["endre"])) {

  $id_verktoy_update = $_POST["id_verktoy"];
  $hylle = $_POST["hylle"];
  $kasse = $_POST["kasse"];
  $delenummer = $_POST["delenummer"];
  $id_kit = $_POST["id_kit"];
  $beskrivelse = $_POST["beskrivelse"];
  $verktoynummer = $_POST["verktoynummer"];
 
$sql_update = "UPDATE verktoy SET hylle='$hylle', kasse='$kasse', delenummer='$delenummer', id_kit='$id_kit', beskrivelse='$beskrivelse', verktoynummer='$verktoynummer'  WHERE id_verktoy = '$id_verktoy_update'";
if($kobling->query($sql_update)) {
echo "<center class='melding_box'>";
echo "<h2 class='melding'>Verktøyet Ble Endret</h2>";
echo "</center>";

} else {
echo "<center>";
echo "<h2>Noe gikk galt med spørringen $sql_update($kobling->error). </h2>";
echo "</center>";
}
}

?>
</body>
</html>


