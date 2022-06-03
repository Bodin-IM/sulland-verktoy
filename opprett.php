<?php
session_start();
if ($_SESSION['logged_in'] == TRUE) {
}
else {
    header('location: logg_inn_admin.php');
    exit;
}
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
    <link rel="stylesheet" href="admin_meny.css">
    <link rel="stylesheet" href="opprett.css">

</head>
  
<body>

    
    
        <h1>Legge til verktøy</h1>
    <form class='form' method="post">
    <center>
    <div class="innpakning">
        
              
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
        <br>
        </form>



        <h1>Legge til Kit</h1>
        <form class='form2' method="post">
        <div class="input2">      
            <div class="tekst">
                     <label for="kit_navn">Kit</label>
            </div>
            <div class="box"> 
                <input type="text" name="kit_navn" id="kit_navn"> 
            </div>
        </div>   

        <div class="submit2">
            <input class="button2" name="submit2" type="submit" value="Lagre">
        </div>


        </form>

        <h1>Slette kit</h1>
        <form class='form2' method="post">
        <div class="input2">

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
            <input class="button2" name="submit_slett" type="submit" value="Slett">
        </div>

        </form>
    
    </div>

    
    </center>
    <?php $kobling->close(); ?>
</body>
  
</html>