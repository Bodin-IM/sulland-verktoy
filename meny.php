<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<div id="mother_div">
    <div id="meny">
        <div><a href="admin.php">Home</a></div>
        <div><a href="opprett.php">Opprett</a></div>
        <div><a href="user_admin.php">Ny bruker</a></div>
        <div><a href="alle_utlan.php">Alle utlån</a></div>
    </div>

    <div id="meny2">
        <div id="nav" class="nav">
            <div id="andre_passord" class="the_As"><a href="endre_passord.php">Passord</a></div>
            <div id="log_ut" class="the_As"><a href="log_ut.php">Logg ut</a></div>
        </div>

        <div id="dots_box" class="dots_box" onclick="click_on_dots()">
            <div id="dot1" class="dots"></div>
            <div id="dot2" class="dots"></div>
            <div id="dot3" class="dots"></div>
        </div>
    </div>
</div>

<script>
    function click_on_dots() {
        document.getElementById("nav").classList.toggle("nav2");
    }
</script>


