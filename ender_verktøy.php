<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=ph, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="meny.css">
</head>
<body>


<?php
include "meny.php";

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

// Prepare statement
$stmt = $conn->prepare($sql);

// execute the query
$stmt->execute();

// melding om at vrekyet er opdatert
echo $stmt->rowCount() . " dur har opdatert verktøyene i data basen";
} catch(PDOException $e) {
echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>



</body>



</html>

