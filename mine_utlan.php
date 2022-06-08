<?php 
session_start();

if (!isset($_SESSION["valgt_bruker"])){
    
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sulland - verktøy</title>
    <link rel="stylesheet" href="meny.css">
    <link rel="stylesheet" href="sulland.css">
    <link rel="stylesheet" href="mine_utlan.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<body>
<ul>
        <li><a href="/index.php">Verktøyvisning</a></li>
        <li id="admin"><a href="/logg_inn_admin.php">Logg Inn</a></li>
    </ul>    
<br>

<?php
include "conn.php";




?>
<br>
<?php

if (isset($_POST['submit_fjern_lan'])) {
  $id_verktoylan = $_POST['verktoy_lan'];
  

  $sql_lånupdate = "UPDATE verktoy SET id_bruker = NULL WHERE id_verktoy=$id_verktoylan";

  $kobling->query($sql_lånupdate);
}
$id_bruker = $_SESSION['valgt_bruker'];

$sql = "SELECT * FROM verktoy JOIN bruker ON verktoy.id_bruker=bruker.id_bruker LEFT JOIN kit ON verktoy.id_kit = kit.id_kit WHERE verktoy.id_bruker=$id_bruker";

$resultat = $kobling->query($sql);
echo "<div class='stil'>";
echo "<table>";
echo "<tr>";
    echo "<th> Status </th>";
    echo "<th> Verktoynummer </th>";
    echo "<th> Delenummer </td>";
    echo "<th> Hylle </th>";
    echo "<th> Kasse </th>";
    echo "<th> Kit </th>";
    echo "<th> beskrivelse </th>";
    echo "<th> Brukernavn </th>";
echo "</tr>";




while($rad = $resultat->fetch_assoc()) {
    $verktoynummer = $rad["verktoynummer"];
    $hylle = $rad["hylle"];
    $brukernavn = $rad["brukernavn"];
    $id_verktøy = $rad["id_verktoy"];
    $kasse = $rad["kasse"];
    $delenummer = $rad["delenummer"];
    $beskrivelse = $rad["beskrivelse"];
    $status = $rad["status"];
    $kit_navn = $rad["kit_navn"];


    echo "<tr>";
        echo "<td> $status </td>";
        echo "<td> $verktoynummer </td>";
        echo "<td> $delenummer </td>";
        echo "<td> $hylle </td>";
        echo "<td> $kasse </td>";
        echo "<td> $kit_navn </td>";
        echo "<td> $beskrivelse </td>";
        echo "<td> $brukernavn </td>";
        echo "<td>";     
            
              echo "<form method='post'>
                <input type='hidden' value='$id_verktøy' name='verktoy_lan'>
                <input type='submit' value='Fjern Lån' name='submit_fjern_lan'>
              </form>";
            
        
        echo " </td>";

       
    echo "</tr>";
    
}

echo "</table>";
echo "</div>"


?>

</body>
</html>