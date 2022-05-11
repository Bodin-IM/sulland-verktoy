<?php
    include "conn.php";
    if (isset($_POST['logg_inn'])){
        if ($passord = ($_POST['passord'])){
            
            header("Location: admin.php");
        }
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Logg Inn Som Admin</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" name="passord" placeholder="Passord" required>
            <button type='submit' name='logg_inn'>Logg inn</button>
        </form>
    </div>
</body>
</html>