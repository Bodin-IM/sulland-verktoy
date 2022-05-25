<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="slett_endre_verktøy.css">
    <link rel="stylesheet" href="meny.css">
    <style>

body {
  margin: 0;
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
    left: 4.5%;
    
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 68.5%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 5px solid #cccccc;
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

    </style>
</head>
<body>
    <!-- START PHP Hente Data Fra Databasen --> 
    <?php
    if ($_SESSION['logged_in'] == TRUE) {
    }
    else {
        header('location: logg_inn_admin.php');
        exit;
    }
    /*if(!isset($_SERVER['HTTP_REFERER'])){
        header('location: logg_inn_admin.php');
        exit;
    }*/
    include "meny.php";
    ?>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Søk her..." title="Type in a name">
    <?php
    include "conn.php";
    if (isset($_POST['slett'])){
        $selected_verktoy = $_POST['slett'];
        $sql = "DELETE FROM verktoy WHERE id_verktoy=$selected_verktoy";
        $resultat = $kobling->query($sql);
    }
    $sql = "SELECT * FROM verktoy LEFT JOIN bruker ON verktoy.id_bruker=bruker.id_bruker";
    $resultat = $kobling->query($sql);

    echo "<div class='stil'>";
        echo "<table id='verktoytabell'>";
            echo "<tr>";
                //echo "<th>id_verktøy</th>";
                echo "<th>Hylle</th>";
                echo "<th>Kasse</th>";
                echo "<th>Delenummer</th>";
                echo "<th>ID_kit</th>";
                echo "<th>Beskrivelse</th>";
                echo "<th>Verktøynummer</th>";
                echo "<th>Bruker</th>";
                echo "<th>Status</th>";
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
            $brukernavn = $rad["brukernavn"];
            echo "<tr>";
            //echo "<td>$id_verktøy</td>";
            echo "<td>$hylle</td>";
            echo "<td>$kasse</td>";
            echo "<td>$delenummer</td>";
            echo "<td>$id_kit</td>";
            echo "<td>$beskrivelse</td>";
            echo "<td>$verktøynummer</td>";
            echo "<td>$brukernavn</td>";
            echo "<td>$status</td>";
            echo "<td>  <button class='slett_knapp' type='button' value='$id_verktøy'> SLETT </button>  </td>";
            echo "<td> <button class='endre_knapp'><a href='endre_verktoy.php?verktoy=$id_verktøy'> ENDRE </a></button>  </td>";
        echo "</tr>";
        }
        echo "</table>";
    echo "</div>";

    mysqli_close($kobling);
    ?>
    <!-- END PHP Hente Data Fra Databasen -->


    <!-- START Søke Funksjon -->
    <script>
        function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("verktoytabell");
        var rows = table.getElementsByTagName("tr");
        for (i = 1; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var j;
            var rowContainsFilter = false;
            for (j = 0; j < cells.length; j++) {
            if (cells[j]) {
                if (cells[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                rowContainsFilter = true;
                continue;
                }
            }
            }
            if (! rowContainsFilter) {
            rows[i].style.display = "none";
            } else {
            rows[i].style.display = "";
            }
        }
        }
        const setTheme = theme => document.documentElement.className = theme;
        document.getElementById('theme-select').addEventListener('change', function() {
        setTheme(this.value);
        });
    </script>
    <!-- END Søke Funksjon -->

    
    <!-- START Slett Funksjon -->
    <dialog class="modal" id="modal">
        <h2>Bekreft Sletting</h2>
        <form method='POST'>
             <button id="slett_button" class="slett_button" name='slett' value='' > Slett </button>
             <button id="avbryt_button" class="avbryt_button" type='submit' name='avbryt'> Avbryt </button>
        </form>
    </dialog>
    <script>
        var modal = document.querySelector("#modal"); 
        var open_buttons = document.querySelectorAll(".slett_knapp");
        var close_button = document.querySelector(".slett_button");
        var slett_knapp_value
    
        open_buttons.forEach(btn => {
            btn.addEventListener("click", () => {
                slett_knapp_value = btn.value;
                document.getElementById("slett_button").value = slett_knapp_value;
                modal.showModal();
            })    
        }) ;
        close_button.addEventListener("click", () => {
            modal.close();
        });
    </script>
    <!-- END Slett Funksjon -->
</body>
</html>