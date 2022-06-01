<?php
    include "conn.php";
    if (isset($_POST['endre'])) {
        $nytt_passord = $_POST['endre_passord'];
        $sql_update = "UPDATE admin SET password='$nytt_passord'" ;
        $result = $kobling->query($sql_update);
        if($kobling->query($sql_update)){
            header('Location: logg_inn_admin.php');
            die();
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
        <h1>Lag et nytt passord</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" name="endre_passord" placeholder="Nytt Passord" required>
            <button type='submit' name='endre'>Endre</button>
        </form>
    </div>
</body>
</html>