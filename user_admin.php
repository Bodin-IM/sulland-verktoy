<?php
include "meny.php";
include "conn.php";

if(isset($_POST["submit3"])) {

    $brukernavn = $_REQUEST['brukernavn'];
     
     $sql = "INSERT INTO kit (kit_navn)
     VALUES ('$kit_navn')";
     
     if ($kobling->query($sql) === TRUE) {
       echo "New record created successfully";
     } else {
       echo "Error: " . $sql . "<br>" . $kobling->error;
     }
     
    
     }
 ?>






        



        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Ny Bruker</title>
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
  width: 60%;
  margin-top: 6px; 
}


.submit3 {
    float: left;
    width: 20%;
    padding: 12px 10px;
}

.button {
    float: left;
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
    <div class="innpakining">
        <form method="post">
        <div class="input">      
            <div class="tekst">
                <label for="brukernavn">Ny Bruker</label>
            </div>
            <div class="box"> 
                <input type="text" name="brukernavn" id="brukernavn"> 
            </div>
            <div class="submit3">
            <input class="button" name="submit3" type="submit" value="Lagre">
        </div>

        </div>   

        

        </form>
    </div>
    </center>
        </body>
        </html>