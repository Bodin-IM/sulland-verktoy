<?php
include "meny.php";
include "conn.php";

if(isset($_POST["submit"])) {

$hylle = $_REQUEST['hylle'];
$kasse = $_REQUEST['kasse'];
$delenummer = $_REQUEST['delenummer'];
$id_kit = $_REQUEST['id_kit'];


$beskrivelse = $_REQUEST['beskrivelse'];
$verktoynummer = $_REQUEST['verktoynummer'];
$status = $_REQUEST['status'];

$sql = "INSERT INTO Verktoy (hylle, kasse, delenummer, id_kit, beskrivelse, verktoynummer, status)
VALUES ('$hylle', '$kasse', '$delenummer', IF('$id_kit' = 'no_kit', NULL,'$id_kit'), '$beskrivelse', '$verktoynummer', '$status')";

if ($kobling->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $kobling->error;
}


}

if(isset($_POST["submit2"])) {

   $kit_navn = $_REQUEST['kit_navn'];
    
    $sql = "INSERT INTO kit (kit_navn)
    VALUES ('$kit_navn')";
    
    if ($kobling->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $kobling->error;
    }
    
   
    }



if (isset($_POST['submit_slett'])){

    $selected_kit = $_POST['kit'];
    $sql = "DELETE FROM kit WHERE id_kit ='$selected_kit'";
    $resultat = $kobling->query($sql);

    if ($kobling->query($sql) === TRUE) {
        echo "Deleted kit";
      } else {
        echo "Error: " . $sql . "<br>" . $kobling->error;
      }
      
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
        <?php
        $sql2 = "SELECT * FROM kit";
        $resultat2 = $kobling->query($sql2);

        $nullkit =NULL;
        ?>
            <div class="tekst"> 
                <label for="id_kit">Kit</label> 
            </div>
            <div class="box">  
                <?php
                echo "<select class='kit_select' name='id_kit'>";
                echo "<option value='no_kit'></option>";
                while($rad = $resultat2->fetch_assoc()) {
                    $id_kit = $rad["id_kit"];
                    $kitnavn = $rad["kit_navn"];

                    echo "<option value=$id_kit>$kitnavn</option>";
                }

                echo "</select>";
                
                ?>




                
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
            <input class="button" name="submit2" type="submit" value="Lagre">
        </div>


        </form>

        <h1>Slette kit</h1>
        <form method="post">
        <div class="input">

        <?php
        $sql2 = "SELECT * FROM kit";
        $resultat2 = $kobling->query($sql2);

     
        ?>

            <div class="tekst">
                <label for="id_kit">slett kit</label>
            </div>
            <div class="box"> 
            <?php
                echo "<select class='kit_select' name='kit'>";
              
                while($rad = $resultat2->fetch_assoc()) {
                    $id_kit = $rad["id_kit"];
                    $kitnavn = $rad["kit_navn"];

                    echo "<option value=$id_kit>$kitnavn</option>";
                }

                echo "</select>";
                
                ?>
            </div>
        </div>

        <div class="submit3">
            <input class="button" name="submit_slett" type="submit" value="Slett">
        </div>

        </form>
    
    </div>

    
    </center>
    <?php $kobling->close(); ?>
</body>
  
</html>