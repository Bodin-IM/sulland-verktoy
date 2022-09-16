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
    <title>Sulland - verktøy</title>
    <link rel="stylesheet" href="css/endre_passord.css">
    <!-- En link for å hente font fra google  --> 
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>
    <div id='mother_div'>
        <div  id='tittel'>
            <h1>Lag nytt passord</h1>
        </div>
        <div id='form_en'>
            <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input id='data_input' type="text" name="endre_passord" placeholder="Nytt Passord" required>
                    <button id='input_knapp' type='submit' name='endre'>Endre</button>
            </form>
        </div>
            
    </div>
    
</body>
</html>




