<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sulland - verktøy</title>
</head>
<body>


<table>
<?php 


if(isset($_POST['submit_handleliste'])) {
    $table = $_POST['verktoy_handleliste'];      
    echo $table;
    
}
?>
</table>

</body>
</html>