<?php
$servername = "localhost"; //$servername = "10.100.0.2";
$username = "root"; //$username = "im2a";
$password = ""; //$password = "Passord2";
$dbname = "sulland_verktoy";

// Create connection
$kobling = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($kobling->connect_error) {
  die("Connection failed: " . $kobling->connect_error);
}
?>