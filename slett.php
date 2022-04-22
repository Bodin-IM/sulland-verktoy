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
        

:root,
:root.light {
  --bg-url: url('sulland_bakgrunn.png');
  --bg-size: 35%;
}

:root.dark {
  --bg-url: url('sulland_bakgrunn_dark.png');
  --bg-size: 35%;
  --bg-color: #3E3E3D;
}

body {
  background-color: white;
  background-size: var(--bg-size);
  color: var(--text-color);
  font-family:Arial, Helvetica, sans-serif;
}

table {
  width: 73%;
  height: 100%;
  border: 1px solid black;
  background-color: #f2f2f2;
  border-collapse: collapse;
  background: #0b2028;
  color: #f2f2f2;
  position: relative;
  left: 15%;

   
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
}





#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 70%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 5px solid black;
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
.endre_knapp a{
  text-decoration: none;
  color: black;
}

    
    </style>
</head>
<body>
    
    <?php
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
    $sql = "SELECT * FROM verktoy";
    $resultat = $kobling->query($sql);
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
            echo "<td>  <button class='slett_knapp' type='button' value='$id_verktøy'> SLETT </button>  </td>";
            echo "<td> <button class='endre_knapp'><a href='endre_verktoy.php?verktoy=$id_verktøy'> ENDRE </a></button>  </td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
    
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