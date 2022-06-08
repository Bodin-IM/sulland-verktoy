<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sulland's verktøy</title>
    <link rel="stylesheet" href="admin_meny.css">
    <link rel="stylesheet" href="sulland.css">
    <link rel="stylesheet" href="endre_alle.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    
    
</head>
<body>

<?php
include "meny.php";
include "conn.php";

$sql = "SELECT * FROM verktoy";
$resultat = $kobling->query($sql);

echo "<table class='table table-dark table-hover' id='verktoytabell'>";
echo "<tr>";
    echo "<th>id_verktøy</th> ";
    echo "<th>hylle</th>";
    echo "<th>kasse</th>";
    echo "<th>delenummer</th>";
    echo "<th>id_kit</th>";
    echo "<th>beskrivelse</th>";
    echo "<th>verktøynummer</th>";
    echo "<th>id_bruker</th>";
    echo "<th>status</th>";
echo "</tr>";

while($rad = $resultat->fetch_assoc()) {
    $id_verktoy = $rad["id_verktoy"];
    $hylle = $rad["hylle"];
    $kasse = $rad["kasse"];
    $delenummer = $rad["delenummer"];
    $id_kit = $rad["id_kit"];
    $beskrivelse = $rad["beskrivelse"];
    $verktøynummer = $rad["verktoynummer"];
    $id_bruker = $rad["id_bruker"];
    $status = $rad["status"];

    echo "<tr>";
        echo "<td>$id_verktoy</td>";
        echo "<td>$hylle</td>";
        echo "<td>$kasse</td>";
        echo "<td>$delenummer</td>";
        echo "<td>$id_kit</td>";
        echo "<td>$beskrivelse</td>";
        echo "<td>$verktøynummer</td>";
        echo "<td>$id_bruker</td>";
        echo "<td>$status</td>";
        echo "<td>  <a href='endre_verktoy.php?verktoy=$id_verktoy'>ENDRE</a> </td>";
        
    echo "</tr>";
}

echo "</table>";

?>
</body>
</html>