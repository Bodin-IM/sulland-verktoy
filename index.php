<?php 
session_start();
$_SESSION['feilmelding_minelan'] = NULL;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="meny.css">
    <link rel="stylesheet" href="verktoyvisning.css">

</head>
<body>
    
    
<div id="mother_div">
    <div id="meny">
        <div><a href="index.php">Verktøyvisning</a></div>
        <div><a href="bruker_sjekk.php">Mine lån</a></div>
        <div><a href="utskrift.php">Utskrift</a></div>
        <div><a href="hjelp.php">hjelp</a></div>
    </div>

    <div id="meny2">
        <div id="nav" class="nav">
            <div value="dark" id="theme-select" class="the_As"><a href="">Dark Mode</a></div>
            <div value="light" id="theme-select" class="the_As"><a href="">Light Mode</a></div>
            <div id="admin" class="the_As"><a href="/logg_inn_admin.php">Logg Inn</a></div>
        </div>

        <div id="dots_box" class="dots_box" onclick="click_on_dots()">
            <div id="dot1" class="dots"></div>
            <div id="dot2" class="dots"></div>
            <div id="dot3" class="dots"></div>
        </div>
    </div>
</div>

<div class="forside">
    <?php include "sulland_verktoyvisning.php"; mysqli_close($kobling)?>
    <br>
    <?php include "footer.html";?>    
</div>

    <?php

   

    ?>

    <script>
        function click_on_dots() {
            document.getElementById("nav").classList.toggle("nav2");
        }
    </script>
    <script>
        const setTheme = theme => document.documentElement.className = theme;
        document.getElementById('theme-select').addEventListener('change', function() {
        setTheme(this.value);
        });
    </script>

</body>
</html>