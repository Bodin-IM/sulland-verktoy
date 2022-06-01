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
    <link rel="stylesheet" href="meny.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
    <div class="forside">
    <ul>
        <li><a href="/index.php">Verktøyvisning</a></li>
        <li><a href="/bruker_sjekk.php">Mine lån</a></li>
        <li id="admin"><a href="/logg_inn_admin.php">Logg Inn</a></li>
    </ul> 
        <?php include "sulland_verktoyvisning.php"; mysqli_close($kobling)?>
        <br>
        <?php include "footer.html";?>
        
    </div>
</body>
</html>