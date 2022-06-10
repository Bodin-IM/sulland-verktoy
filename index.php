<?php 
session_start();
if (!isset($_SESSION['feilmelding_minelan'])) {
    $_SESSION['feilmelding_minelan'] = NULL;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sulland - Verktøy</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/meny.css">
    <link rel="stylesheet" href="css/verktoyvisning.css">
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
        <div id="nav" class="nav2">
           <!-- <div value="dark" id="theme-select" class="the_As"><a href="">Dark Mode</a></div>
            <div value="light" id="theme-select" class="the_As"><a href="">Light Mode</a></div> -->
            <div><a href="/logg_inn_admin.php">Logg Inn</a></div>
        </div>  
    </div>
</div>

<div class="forside">
    <?php include "sulland_verktoyvisning.php"; mysqli_close($kobling)?>
    <br>
    <?php include "footer.html";?>    
</div>
    <!--
    <script>
        const setTheme = theme => document.documentElement.className = theme;
        document.getElementById('theme-select').addEventListener('change', function() {
        setTheme(this.value);
        });
    </script> -->

</body>
</html>