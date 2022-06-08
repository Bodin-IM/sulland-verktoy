// 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 key

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sulland - verktøy</title>
    <link rel="stylesheet" href="meny.css">
</head>
<body>
    
</body>
</html>

 <?php
 include "meny.php";
 ?>

# webhook for project deployment
if ($_GET['token'] === 'secret_key') {
$cmd = shell_exec("rm -rf your-php-application
&& git clone https://your_secret_token@github.com/username/your-php-application.git
&& rm -rf your-php-application/.git
);
echo $cmd;
echo 'Deployment sucess';
} else {
echo 'Error';
}

?>


// https://www.9lessons.info/2021/10/automated-deployment-php-application-github.html


