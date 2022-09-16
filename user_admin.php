<?php
session_start();
if ($_SESSION['logged_in'] == TRUE) {
} else {
  header('location: logg_inn_admin.php');
  exit;
}

include "conn.php";
if (isset($_POST["submit3"])) {
  $brukernavn = $_POST['brukernavn'];
  $sql = "INSERT INTO bruker (brukernavn) VALUES ('$brukernavn')";
  if ($kobling->query($sql) === TRUE) {
    echo "Ny bruker er lagt til";
  } else {
    echo "Error: " . $sql . "<br>" . $kobling->error;
  }
}

if (isset($_POST['submit_slett'])) {
  $selected_bruker = $_POST['bruker'];
  $sql = "DELETE FROM bruker WHERE id_bruker ='$selected_bruker'";
  $resultat = $kobling->query($sql);
  if ($kobling->query($sql) === TRUE) {
    echo "Slettet bruker";
  } else {
    echo "Error: " . $sql . "<br>" . $kobling->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sulland - verktøy</title>
  <link rel="stylesheet" href="css/admin_meny.css">
  <link rel="stylesheet" href="css/user_admin.css">
  <!-- En link for å hente font fra google  -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
  <?php include "meny.php"; ?>

  <div id="box1">
    <form id="form1" method="post">
      <input type="text" name="brukernavn" class="data_input" placeholder="Ny bruker" required>
      <input class="lagre_ny_data_knapp" name="submit3" type="submit" value="Lagre">
    </form>


    <form id="form2" method="post">
      <?php
      $sql2 = "SELECT * FROM bruker";
      $resultat2 = $kobling->query($sql2);
      ?>
      <?php
      echo "<select class='data_input' name='bruker'>";
      echo "<option value='no_kit'>Velg bruker</option>";
      while ($rad = $resultat2->fetch_assoc()) {
        $id_bruker = $rad["id_bruker"];
        $brukernavn = $rad["brukernavn"];

        echo "<option value=$id_bruker>$brukernavn</option>";
      }
      echo "</select>";
      ?>

      <input class="slett_bruker_knapp" name="submit_slett" type="submit" value="Slett">
    </form>
  </div>
</body>

</html>