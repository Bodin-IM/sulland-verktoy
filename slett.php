<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method='POST'>
        <input type="text", id="input" name='input'>
        <input type="button" id="søk_bottun" value="søk">
        <input type="submit" id="slett_bottun" value="slett verktøy" name='slett'>
    </form>

    <?php
    $servername = "10.100.0.2";
    $username = "im2a";
    $password = "Passord2";
    $dbname = "sulland_verktoy";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM verktoy";
    $result = $conn->query($sql);

    
    while($rad = $result->fetch_assoc()) {
        $id_verktøy = $rad["id_verktoy"];
        $hylle = $rad["hylle"];
        $kasse = $rad["kasse"];
        $delenummer = $rad["delenummer"];
        $id_kit = $rad["id_kit"];
        $beskrivelse = $rad["beskrivelse"];
        $verktøynummer = $rad["verktoynummer"];
        $id_bruker = $rad["id_bruker"];
        $status = $rad["status"];
    
        /*echo "$id_verktøy";
        echo "$hylle";
        echo "$kasse";
        echo "$delenummer";
        echo "$id_kit";
        echo "$beskrivelse";
        echo "$verktøynummer";
        echo "$id_bruker";
        echo "$status";*/
    }

    if (isset($_POST['slett'])){
        
    }

    include "sulland_verktoyvisning.php";

    
?>
</body>
</html>