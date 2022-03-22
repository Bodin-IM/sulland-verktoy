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
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Opprett</title>
    <link rel="stylesheet" href="meny.css">

    <style> 
input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}


.input {
    width: 50%;
    display: flex;
    flex-direction: row;
   
}
.tekst {
    float: left;
  width: 25%;
  margin-top: 6px;
}

.box {
    float: left;
  width: 75%;
  margin-top: 6px;
    
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
                     <label for="hylle">hylle:</label>
            </div>
            <div class="box"> 
                <input type="text" name="hylle" id="hylle"> 
            </div>
          
</div>       
  
  
              
<div class="input">    

            <div class="tekst"> 
                <label for="kasse">kasse:</label> 
            </div>
            <div class="box">
                <input type="text" name="kasse" id="kasse">
            </div>
            
</div>   
  
  
              
<div class="input">    

            <div class="tekst"> 
                <label for="delenummer">delenumer:</label> 
            </div>
            <div class="box"> 
                <input type="text" name="delenummer" id="delenummer"> 
            </div>
            
</div>          
  
              
              
<div class="input">

            <div class="tekst"> 
                <label for="id_kit">kit:</label> 
            </div>
            <div class="box">    
                <input type="text" name="id_kit" id="id_kit"> 
            </div>
            
</div>


<div class="input">
 
            <div class="tekst"> 
                <label for="beskrivelse">beskrivelse:</label> 
            </div>
            <div class="box"> 
                <input type="text" name="beskrivelse" id="beskrivelse"> 
            </div>
            
</div>


<div class="input">
<p>
                <div class="tekst">
                    <label for="verktoynummer">verktøynummer:</label> 
                </div>
                <div class="box"> 
                    <input type="text" name="verktoynummer" id="verktoynummer">
                </div>
            </p>
</div>
          
            

<div class="input">

                <div class="tekst"> 
                    <label for="status">status:</label> 
                </div>
                <div class="box"> 
                    <input type="text" name="status" id="status"> 
                </div>
            
</div>
  
        <div>
            <input name="submit" type="submit" value="Submit">
        </div>

        </form>
    </div>
    </center>
</body>
  
</html>