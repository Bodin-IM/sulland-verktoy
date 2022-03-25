<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sulland's verktøy</title>
    <link rel="stylesheet" href="meny.css">
    <link rel="stylesheet" href="sulland.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>

table {
    width: 80%;
    border: 3px solid black;
    background-color: #f2f2f2;
    border-collapse: collapse;
   
}
.stil {
    width: 50%;
    display: flex;
    justify-content: center;
    font-family: Drive,Helvetica,Arial,sans-serif;
    position: relative;
    left: 25%;
    
}

.logo {
    position: relative;
    height: 100px;
    width: 100%;
    background-color: rgb(11, 30, 38);
    margin: 0;
}


button {
    background-color: transparent;
    background-repeat: no-repeat;

    border: none;
    cursor: pointer;
    overflow: hidden;
    outline: none;
}
    </style>
    
</head>
<body>

<?php
include "meny.php";
$tjener = "10.100.0.2";
$brukernavn = "im2a";
$passord = "Passord2";
$database = "sulland_verktoy";

$kobling = new mysqli ($tjener, $brukernavn, $passord, $database);

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
        echo "<td> <button>$id_verktoy</button></td>";
        echo "<td> <button>$hylle</button></td>";
        echo "<td> <button>$kasse</button></td>";
        echo "<td> <button>$delenummer</button></td>";
        echo "<td> <button>$id_kit</button></td>";
        echo "<td> <button>$beskrivelse</button></td>";
        echo "<td> <button>$verktøynummer</button></td>";
        echo "<td> <button>$id_bruker</button></td>";
        echo "<td> <button>$status</button></td>";
        echo "<td> <a href='endre_verktoy.php?verktoy=$id_verktoy'>ENDRE</a> </td>";
    echo "</tr>";
}

echo "</table>";

?>
</body>
</html>