<?php
session_start();
if ($_SESSION['logged_in'] == TRUE) {
} else {
    header('location: logg_inn_admin.php');
    exit;
}
include "meny.php";
include "conn.php";

//legge til verktøy
if (isset($_POST["submit"])) {

    $hylle = $_REQUEST['hylle'];
    $kasse = $_REQUEST['kasse'];
    $delenummer = $_REQUEST['delenummer'];
    $id_kit = $_REQUEST['id_kit'];


    $beskrivelse = $_REQUEST['beskrivelse'];
    $verktoynummer = $_REQUEST['verktoynummer'];
    $status = $_REQUEST['status'];

    $sql = "INSERT INTO Verktoy (hylle, kasse, delenummer, id_kit, beskrivelse, verktoynummer, status)
    VALUES ('$hylle', '$kasse', '$delenummer', IF('$id_kit' = 'no_kit', NULL,'$id_kit'), '$beskrivelse', '$verktoynummer', '$status')";

    if ($kobling->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $kobling->error;
    }
}

//lege til kit
if (isset($_POST["submit2"])) {


    $kit_navn = $_REQUEST['kit_navn'];

    $sql = "INSERT INTO kit (kit_navn)
    VALUES ('$kit_navn')";


    if ($kobling->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $kobling->error;
    }
}


//slette kit
if (isset($_POST['submit_slett'])) {

    $selected_kit = $_POST['kit'];
    $sql = "DELETE FROM kit WHERE id_kit ='$selected_kit'";
    $resultat = $kobling->query($sql);

    if ($kobling->query($sql) === TRUE) {
        echo "Deleted kit";
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
    <link rel="stylesheet" href="css/opprett.css">
    <!-- En link for å hente font fra google  -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
    <div id="box1">
        <h1>Legge til verktøy</h1>
        <form method="post" id="form1">
            <input class="data_input" type="text" name="hylle" id="hylle" placeholder="Hylle" required>
            <input class="data_input" type="text" name="kasse" id="kasse" placeholder="Kasse" required>
            <input class="data_input" type="text" name="delenummer" id="delenummer" placeholder="Delenummer" required>
            <input class="data_input" type="text" name="beskrivelse" id="beskrivelse" placeholder="Beskrivelse" required>
            <input class="data_input" type="text" name="verktoynummer" id="verktoynummer" placeholder="Verktøy Nummer" required>
            <input class="data_input" type="text" name="status" id="status" placeholder="Status">
            <?php
            $sql2 = "SELECT * FROM kit";
            $resultat2 = $kobling->query($sql2);
            $nullkit = NULL;
            ?>
            <?php
            echo "<select class='data_input' name='id_kit'>";
            echo "<option value='no_kit'>Velg Kit</option>";
            while ($rad = $resultat2->fetch_assoc()) {
                $id_kit = $rad["id_kit"];
                $kitnavn = $rad["kit_navn"];

                echo "<option value=$id_kit>$kitnavn</option>";
            }
            echo "</select>";
            ?>
            <input class="lagre_ny_data_knapp" name="submit" type="submit" value="Lagre">
        </form>
    </div>

    <div id="box2">
        <h1>Legge til Kit</h1>
        <form method="post" id="form2">
            <input class="input_ny_kit" type="text" name="kit_navn" id="kit_navn" placeholder="Kit Navn" required>
            <input class="input_ny_kit_knapp" name="submit2" type="submit" value="Lagre">
        </form>
    </div>

    <div id="box3">
        <h1>Slette kit</h1>
        <form method="post" id="form3">
            <!-- Slette kit -->
            <?php
            $sql2 = "SELECT * FROM kit";
            $resultat2 = $kobling->query($sql2);
            ?>
            <?php
            echo "<select class='slett_kit' name='kit'>";
            echo "<option >Velg Kit</option>";
            while ($rad = $resultat2->fetch_assoc()) {
                $id_kit = $rad["id_kit"];
                $kitnavn = $rad["kit_navn"];

                echo "<option value=$id_kit>$kitnavn</option>";
            }
            echo "</select>";
            ?>
            <input class="slett_kit_knapp" name="submit_slett" type="submit" value="Slett">
        </form>
    </div>
    <?php $kobling->close(); ?>
</body>

</html>