<?php
$servername = "10.100.0.2"; //$servername = "10.100.0.2";
$username = "im2a"; //$username = "im2a";
$password = "Passord2"; //$password = "Passord2";
$dbname = "sulland_verktoy";

// Create connection
$kobling = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($kobling->connect_error) {
  die("Connection failed: " . $kobling->connect_error);
}
?>