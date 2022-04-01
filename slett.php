<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="slett_endre_verktøy.css">
</head>
<body>
    <ul>
        <li><a href="/opprett.php">Opprett</a></li>
        <li><a href="/deploy.php">Deploy</a></li>
        <li><a href="/user_admin.php">User Admin</a></li>
        <li><a href="/sok.php">søkefunksjon</a></li>
    </ul> 

    <?php
    include "conn.php";
    echo "<table id='verktoytabell'>";
    echo "<tr>";
        echo "<th>id_verktøy</th>";
        echo "<th>hylle</th>";
        echo "<th>kasse</th>";
        echo "<th>delenummer</th>";
        echo "<th>id_kit</th>";
        echo "<th>beskrivelse</th>";
        echo "<th>verktøynummer</th>";
        echo "<th>id_bruker</th>";
        echo "<th>status</th>";
        echo "<th>Slett Verktøy</th>";
        echo "<th>Endre Verktøy</th>";
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
            echo "<td>$beskrivelse</td>";
            echo "<td>$verktøynummer</td>";
            echo "<td>$id_bruker</td>";
            echo "<td>$status</td>";
            echo "<td>
                <form method='POST'>
                <button id='slett_knapp' type='submit' name='slett' value='$id_verktøy'> Slett </button>   
                </form>
                </td>";
            echo "<td> <a href='endre_verktoy.php?verktoy=$id_verktøy'> ENDRE </a> </td>";
        echo "</tr>";
    }
    echo "</table>";
    /*if (isset($_POST['slett'])){
        
        $selected_verktoy = $_POST['slett'];
        $sql = "DELETE FROM verktoy WHERE id_verktoy=$selected_verktoy";
        $resultat = $kobling->query($sql);
    }*/
    ?>

    <script>
        document.getElementById("slett_knapp").onclick = function(){
            document.getElementById("slett_knapp").style.backgroundColor = "green";
            
        }
    </script>

</body>
</html>