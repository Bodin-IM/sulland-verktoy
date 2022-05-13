<?php
if(!isset($_SERVER['HTTP_REFERER'])){
  header('location: logg_inn_admin.php');
  exit;
}
include "meny.php";
include "conn.php";

if(isset($_POST["submit3"])) {

    $brukernavn = $_POST['brukernavn'];
     
     $sql = "INSERT INTO bruker (brukernavn) VALUES ('$brukernavn')";
     
     if ($kobling->query($sql) === TRUE) {
       echo "Ny bruker er lagt til";
     } else {
       echo "Error: " . $sql . "<br>" . $kobling->error;
     }
     
    
     }

     if (isset($_POST['submit_slett'])){

      $selected_bruker = $_POST['bruker'];
      $sql = "DELETE FROM bruker WHERE id_bruker ='$selected_bruker'";
      $resultat = $kobling->query($sql);
  
      if ($kobling->query($sql) === TRUE) {
          echo "Slettet bruker";
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

.bruker_select {
    width: 75%;
    padding: 12px 20px;
    margin: 8px 0;
    font-size: 15px;
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

       
        <form method="post">
        <div class="input">

        <?php
        $sql2 = "SELECT * FROM bruker";
        $resultat2 = $kobling->query($sql2);

     
        ?>

            <div class="tekst">
                <label for="id_bruker">slett bruker</label>
            </div>
            <div class="box"> 
            <?php
                echo "<select class='bruker_select' name='bruker'>";
                echo "<option value='no_kit'></option>";
                while($rad = $resultat2->fetch_assoc()) {
                    $id_bruker = $rad["id_bruker"];
                    $brukernavn = $rad["brukernavn"];

                    echo "<option value=$id_bruker>$brukernavn</option>";
                }

                echo "</select>";
                
                ?>
            </div>
              <div class="submit3">
                <input class="button" name="submit_slett" type="submit" value="Slett">
              </div>
        </div>

        

        </form>


    </div>
    </center>
        </body>
        </html>