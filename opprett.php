<?php
include "meny.php";
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

if(isset($_POST["submit2"])) {

   $kit_navn = $_REQUEST['kit_navn'];
    
    $sql = "INSERT INTO kit (kit_navn)
    VALUES ('$kit_navn')";
    
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
    <title>Opprett</title>
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
  width: 70%;
  margin-top: 6px;

    
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

    
    <center>
        <h1>Legge til verktøy</h1>
    <div class="innpakning">
        <form method="post">
              
<div class="input">      
            <div class="tekst">
                     <label for="hylle">Hylle</label>
            </div>
            <div class="box"> 
                <input type="text" name="hylle" id="hylle"> 
            </div>
          
</div>       
  
  
              
<div class="input">    

            <div class="tekst"> 
                <label for="kasse">Kasse</label> 
            </div>
            <div class="box">
                <input type="text" name="kasse" id="kasse">
            </div>
            
</div>   
  
  
              
<div class="input">    

            <div class="tekst"> 
                <label for="delenummer">Delenummer</label> 
            </div>
            <div class="box"> 
                <input type="text" name="delenummer" id="delenummer"> 
            </div>
            
</div>          
  
              
              
<div class="input">

            <div class="tekst"> 
                <label for="id_kit">Kit</label> 
            </div>
            <div class="box">    
                <input type="text" name="id_kit" id="id_kit"> 
            </div>
            
</div>


<div class="input">
 
            <div class="tekst"> 
                <label for="beskrivelse">Beskrivelse</label> 
            </div>
            <div class="box"> 
                <input type="text" name="beskrivelse" id="beskrivelse"> 
            </div>
            
</div>


<div class="input">
<p>
                <div class="tekst">
                    <label for="verktoynummer">Verktøynummer</label> 
                </div>
                <div class="box"> 
                    <input type="text" name="verktoynummer" id="verktoynummer">
                </div>
            </p>
</div>
          
            

<div class="input">

                <div class="tekst"> 
                    <label for="status">Status</label> 
                </div>
                <div class="box"> 
                    <input type="text" name="status" id="status"> 
                </div>
            
</div>
  
        <div class="submit">
            <input class="button" name="submit" type="submit" value="Lagre">
        </div>

        </form>



        <h1>Legge til Kit</h1>
        <form method="post">
        <div class="input">      
            <div class="tekst">
                     <label for="kit_navn">Kit</label>
            </div>
            <div class="box"> 
                <input type="text" name="kit_navn" id="kit_navn"> 
            </div>
        </div>   

        <div class="submit2">
            <input class="button" name="submit" type="submit" value="Lagre">
        </div>


        </form>
    </div>
    </center>
</body>
  
</html>