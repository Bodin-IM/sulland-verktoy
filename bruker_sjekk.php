<?php 
session_start();
if (!isset($_SESSION["valgt_bruker"])){
    $_SESSION['feilmelding_minelan'] = TRUE;
    header('location: index.php');
}
 else {
   
    header('location: mine_utlan.php');
}
?>