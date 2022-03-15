


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

if(isset($_POST["endre_id"])){
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


  
  
}  else{
  die("du må vlge et vrektøy");
}


$sql = "SELECT * FROM verktoy WHERE id_verktoy='$endre_id'";
$resultat = $conn->query($sql);

echo ""

?>



<form action="php">
  
</form>


        <h1>endre data</h1>
  
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



</body>


</body>



</html>

