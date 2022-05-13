<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="meny.css">
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>

:root,
:root.light {
--bg-url: url('sulland_bakgrunn.png');
--bg-size: 20%;
--sok-bord: 5px solid #cccccc;
}

:root.dark {
--bg-url: url('sulland_bakgrunn_dark.png');
--bg-size: 20%;
--bg-color: #3E3E3D;
--sok-bord: 5px solid #262626;
}

body {
margin: 0;
background-color: var(--bg-color);
background-image: var(--bg-url);
background-size: var(--bg-size);
}

table {
width: 100%;
height: 100%;
border: 1px solid black;
background-color: #f2f2f2;
border-collapse: collapse;
background: #0b2028;
color: #f2f2f2;
box-shadow: 5px 5px 5px 5px #032530;

}
th, td {
border-left: 1px solid black;
border-right: 1px solid black;
border-collapse: collapse;
padding-left: 10px
}
tr {
height: 4vh;

}
tr:nth-child(odd) {
background: #032530;
}
tr:nth-child(even) {
background: #0b2028;
}
tr:hover {
background: #0d313f;
}
.stil {
width: 70%;
height: 50%;
display: flex;
justify-content: center;
font-family: Drive,Helvetica,Arial,sans-serif;
position: relative;
left: 15%;

}
.logo {
position: relative;
height: 100px;
width: 100%;
background-color: #0b2028;
margin: 0;
color: white;
}





#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 70%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: var(--sok-bord);
  margin-bottom: 12px;
  margin-top: 12px;
  position: relative;
  left: 15%;
}

#myTable {
  border-collapse: collapse;
  width: 70%;
  border: 1px solid #ddd;
  font-size: 18px;
  position: relative;
  left: 15%;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #333;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}


</style>
</head>
<body>
    <br>
<?php
include "conn.php";
include "meny.php";
?>
<br>
<?php

if (isset($_POST['submit_fjern_lan'])) {
  $id_verktoylan = $_POST['verktoy_lan'];
  

  $sql_lånupdate = "UPDATE verktoy SET id_bruker = NULL WHERE id_verktoy=$id_verktoylan";

  $kobling->query($sql_lånupdate);
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
    $id_verktøy = $rad["id_verktoy"];
   


    echo "<tr>";
        echo "<td> $verktoynummer </td>";
        echo "<td> $id_bruker </td>";
        echo "<td> $brukernavn </td>";
        echo "<td>" ;     
            if  ($id_bruker != NULL){
              echo "<form method='post'>
                <input type='hidden' value='$id_verktøy' name='verktoy_lan'>
                <input type='submit' value='Fjern Lån' name='submit_fjern_lan'>
              </form>";
            } else{
              echo "$brukernavn";
            }
        
        echo " </td>";

       
    echo "</tr>";
    
}

echo "</table>";
echo "</div>"


?>

</body>
</html>
