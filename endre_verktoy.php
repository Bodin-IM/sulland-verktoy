


<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="meny.css">

    <style> 
body {
    background-image: url("Bakgrunn.jpg");
}

input[type=text] {
  width:75%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  font-size: 15px;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

form {
    margin-bottom: 50px;
}

h1 {
    font-family: Arial, Helvetica, sans-serif;
}
.input {
    width: 100%;
    display: flex;
    flex-direction: row;
   
}
.tekst {
    float: left;
  width: 200px;
  margin-top: 6px;
  text-align: right;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 25px;
  font-weight: bold;
}

.box {
    float: left;
  width: 75%;
  margin-top: 6px; 
}

.kit_select {
    width: 75%;
    padding: 12px 20px;
    margin: 8px 0;
    font-size: 15px;
}
.submit {
    padding: 20px 20px;
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 8px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button:hover {
  background-color: #555555;
  color: white;
}
</style>

</head>



<body>
  <?php
include "meny.php";
include "conn.php";
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
echo "verktøy ble endret.";

} else {
echo "Noe gikk galt med spørringen $sql_update($kobling->error). ";
}

}


if(isset($_GET['verktoy'])){
 
  
  $endre_id = $_GET['verktoy'];

}  else{
  die("du må vlge et vrektøy");
}


$sql = "SELECT * FROM verktoy WHERE id_verktoy='$endre_id'";
$resultat = $kobling->query($sql);

echo "<form method='POST'>";
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

  
  echo"<center>";
  echo "<div class='innpakning'>";

  echo "<div class='input'> ";
  echo" <div class='tekst'>";
  echo "</div>";
  echo"<div class='box'>";
  echo " <input type='hidden' name='id_verktoy' value='$id_verktoy'>";
  echo "</div>";
  echo "</div>";


  echo "<div class='input'> ";
  echo" <div class='tekst'>";
  echo"hylle";
  echo "</div>";
  echo"<div class='box'>";
  echo"<input type='text' name='hylle' id='hylle' value='$hylle'>";
  echo "</div>";
  echo "</div>";




  

  echo "<div class='input'> ";
  echo" <div class='tekst'>";
  echo"kasse";
  echo "</div>";
  echo"<div class='box'>";
  echo" <input type='text' name='kasse' id='kasse'value='$kasse'>";
  echo "</div>";
  echo "</div>";



  echo "<div class='input'> ";
  echo" <div class='tekst'>";
  echo"delenummer";
  echo "</div>";
  echo"<div class='box'>";
  echo" <input type='text' name='delenummer' id='delenummer'value='$delenummer'>";
  echo "</div>";
  echo "</div>";



  echo "<div class='input'> ";
  echo" <div class='tekst'>";
  echo"id_kit";
  echo "</div>";
  echo"<div class='box'>";
  echo" <input type='text' name='id_kit' id='id_kit'value='$id_kit'>";
  echo "</div>";
  echo "</div>";



  echo "<div class='input'> ";
  echo" <div class='tekst'>";
  echo"beskrivelse";
  echo "</div>";
  echo"<div class='box'>";
  echo"  <input type='text' name='beskrivelse' id='beskrivelse'value='$beskrivelse'>";
  echo "</div>";
  echo "</div>";



  echo "<div class='input'> ";
  echo" <div class='tekst'>";
  echo"verktoynummer";
  echo "</div>";
  echo"<div class='box'>";
  echo"<input type='text' name='verktoynummer' id='verktoynummer' value='$verktoynummer'>";
  echo "</div>";
  echo "</div>";



  echo "<div class='submit'>";

 echo " <input class='button'type='submit' name='endre' value='endre'> " ;
 echo "</form>";
 echo "</div>"; 
 echo"</center>";

}
  



?>





</body>



</html>


