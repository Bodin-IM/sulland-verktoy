<?php
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

if(isset($_POST["submit"])) {

$hylle = $_REQUEST['hylle'];
$kasse = $_REQUEST['kasse'];
$delenummer = $_REQUEST['delenummer'];
$id_kit = $_REQUEST['id_kit'];
$beskrivelse = $_REQUEST['beskrivelse'];
$verktoynummer = $_REQUEST['verktoynummer'];
$status = $_REQUEST['status'];

$sql = "INSERT INTO Verktoy (hylle, kasse, delenummer, id_kit, beskrivelse, verktoynummer, status)
VALUES ('$hylle', '$kasse', '$delenummer', '$id_kit', '$beskrivelse', '$verktoynummer', '$status')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title></title>
</head>
  
<body>

    <?php  
    include "meny.php";
    ?>
    <center>
        <h1>Storing Form data in Database</h1>
  
        <form method="post">
              
              
<p>
                <label for="hylle">hylle:</label>
                <input type="text" name="hylle" id="hylle">
            </p>
  
  
  
              
              
<p>
                <label for="kasse">kasse:</label>
                <input type="text" name="kasse" id="kasse">
            </p>
  
  
  
              
              
<p>
                <label for="delenummer">delenumer:</label>
                <input type="text" name="delenummer" id="delenummer">
            </p>
  
  
              
              
              
<p>
                <label for="id_kit">kit:</label>
                <input type="text" name="id_kit" id="id_kit">
            </p>
  


 <p>
                <label for="beskrivelse">beskrivelse:</label>
                <input type="text" name="beskrivelse" id="beskrivelse">
            </p> 



<p>
                <label for="verktoynummer">verktøynummer:</label>
                <input type="text" name="verktoynummer" id="verktoynummer">
            </p>
          
            
                   
<p>
                <label for="status">status:</label>
                <input type="text" name="status" id="status">
            </p>
  
  
              
            <input name="submit" type="submit" value="Submit">
        </form>
    </center>
</body>
  
</html>