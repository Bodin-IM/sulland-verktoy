<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sulland's verktøy</title>
    <link rel="stylesheet" href="meny.css">
    <link rel="stylesheet" href="sulland.css">
    <style>

table, td {
    
    border: 3px solid black;
    background-color: #f2f2f2;
    border-collapse: collapse;
    width: 30%;
}
.stil {
    
    display: flex;
    justify-content: center;
    
}
.beskrivelse {
 
}
    </style>
</head>

<body>
<?php

$tjener = "10.100.0.2";
$brukernavn = "im2a";
$passord = "Passord2";
$database = "sulland_verktoy";

$kobling = new mysqli ($tjener, $brukernavn, $passord, $database);

$sql = "SELECT * FROM verktoy";
$resultat = $kobling->query($sql);
echo "<div class='stil'>";
echo "<table id='verktoytabell'>";
echo "<tr>";
    echo "<th>id_verktøy</th>";
    echo "<th>hylle</th>";
    echo "<th>kasse</th>";
    echo "<th>delenummer</th>";
    echo "<th>id_kit</th>";
    echo "<th class='beskrivelse'>beskrivelse</th>";
    echo "<th>verktøynummer</th>";
    echo "<th>id_bruker</th>";
    echo "<th>status</th>";
echo "</tr>";

while($rad = $resultat->fetch_assoc()) {
    $id_verktøy = $rad["id_verktoy"];
    $hylle = $rad["hylle"];
    $kasse = $rad["kasse"];
    $delenummer = $rad["delenummer"];
    $id_kit = $rad["id_kit"];
    $beskrivelse = $rad["beskrivelse"];
    $verktøynummer = $rad["verktoynummer"];
    $id_bruker = $rad["id_bruker"];
    $status = $rad["status"];

    echo "<tr>";
        echo "<td>$id_verktøy</td>";
        echo "<td>$hylle</td>";
        echo "<td>$kasse</td>";
        echo "<td>$delenummer</td>";
        echo "<td>$id_kit</td>";
        echo "<td class='beskrivelse'>$beskrivelse</td>";
        echo "<td>$verktøynummer</td>";
        echo "<td>$id_bruker</td>";
        echo "<td>$status</td>";
    echo "</tr>";
}

echo "</table>";
echo "</div>"
?>
</body>
</html>