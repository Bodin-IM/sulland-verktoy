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

if(isset($_POST["submit3"])) {

    $brukernavn = $_REQUEST['brukernavn'];
     
     $sql = "INSERT INTO kit (kit_navn)
     VALUES ('$kit_navn')";
     
     if ($conn->query($sql) === TRUE) {
       echo "New record created successfully";
     } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
     }
     
    
     }
 ?>






<form method="post">
        <div class="input">      
            <div class="tekst">
                     <label for="brukernavn">Ny Bruker</label>
            </div>
            <div class="box"> 
                <input type="text" name="kit_navn" id="brukernavn"> 
            </div>
        </div>   

        <div class="submit3">
            <input class="button" name="submit3" type="submit" value="Lagre">
        </div>


        </form>



        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ny Bruker</title>
            <link rel="stylesheet" href="meny.css">
        </head>
        <body>
            
        </body>
        </html>