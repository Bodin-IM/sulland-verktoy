<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sulland - verktøy</title>
    <link rel="stylesheet" href="css/meny.css">
    <link rel="stylesheet" href="css/minelån.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<?php
include "conn.php";
include "meny.php";
?>
<br>
<?php

if (isset($_POST[''])) {
    
}
$sql = "SELECT* FROM verktoy JOIN bruker ON verktoy.id_bruker=bruker.id_bruker";

$resultat = $kobling->query($sql);
echo "<div class='stil'>";
echo "<table>";
echo "<tr>";
    echo "<th> verktoy </th>";
    echo "<th> id_bruker </th>";
    echo "<th> brukernavn </th>";
echo "</tr>";

while($rad = $resultat->fetch_assoc()) {
    $verktoynummer = $rad["verktoynummer"];
    $id_bruker = $rad["id_bruker"];
    $brukernavn = $rad["brukernavn"];
   


    echo "<tr>";
        echo "<td> $verktoynummer </td>";
        echo "<td> $id_bruker </td>";
        echo "<td> $brukernavn </td>";
       
    echo "</tr>";
}

echo "</table>";
echo "</div>"


?>

</body>
</html>
