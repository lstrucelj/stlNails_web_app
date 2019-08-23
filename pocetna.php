<!DOCTYPE html>
<?php
include("baza.class.php");
include("sesija.class.php");
Sesija::kreirajSesiju();
$baza = new Baza();
$baza->spojiDB();

?>

<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Početna</title>
    <sript src="https.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></sript>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="JQUERY.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Noticia+Text&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="uredi.css">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Emilys+Candy&display=swap" rel="stylesheet">
</head>

<style>
body, h1,h2,h3,h4,h5,h6 {
font-family: "Montserrat",
sans-serif
}
.w3-row-padding img {
margin-bottom: 12px
}

.w3-sidebar {
width: 120px;
background: #222;
}

@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>

<body class="w3-black" id="popravi">

<div class="w3-display-bottomleft w3-container w3-amber w3-gray w3-hide-small"
   style="bottom:30%;opacity:0.7;width:100%;margin-left:120px;height:40%">
  <h2 id="tekstpocetna"><b>Life is not perfect, but your nails can be!</b></h2>
</div>

<div class="w3-display-bottomleft w3-hide-small"
   style="bottom:70%;opacity:0.7;width:100%;margin-left:120px;height:10%">
  <h2 id="logo"><b>STL Nails</b></h2>
</div>

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

  <a href="pocetna.php" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>POČETNA</p>
  </a>

  <?php
  if(Sesija::dajKorisnika() == null ){
  echo "<a href=\"prijava.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hover-black\" id=\"prijava_gumb\">
    <i class=\"fa fa-user w3-xxlarge\"></i>
    <p>PRIJAVA</p>
    </a>
    <a href=\"registracija.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hover-black\">
       <i class=\"fa fa-arrow-circle-right w3-xxlarge\"></i>
       <p>REGISTRACIJA</p>
     </a>";
    }
    else {
    echo "<a href=\"odjava.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hover-black\" id=\"odjava_gumb\">
              <i class=\"fa fa-sign-out w3-xxlarge\"></i>
              <p>ODJAVA</p>
            </a>"
            ;
  }
  ?>

  <?php
    if(Sesija::dajKorisnika() != null ){
      echo "<a href=\"galerija.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hover-black\" id=\"odjava_gumb\">
                  <i class=\"fa fa-eye w3-xxlarge\"></i>
                  <p>GALERIJA</p>
              </a>

              <a href=\"rezervacija.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hover-black\" id=\"odjava_gumb\">
                    <i class=\"fa fa-calendar-plus-o w3-xxlarge\"></i>
                  <p>REZERVACIJA</p>
                  </a>
                <a href=\"tablica.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hover-black\" id=\"odjava_gumb\">
                  <i class=\"fa fa-money w3-xxlarge\"></i>
                  <p>CJENIK</p>
                </a>";
    }
    ?>

  <a href="upit.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>KONTAKT</p>
  </a>
</nav>

</body>
</html>