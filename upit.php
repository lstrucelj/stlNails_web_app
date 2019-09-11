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
    <title>Kontakt</title>
    <sript src="https.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></sript>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="JQUERY.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Noticia+Text&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Emilys+Candy&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/pozadina.css">
</head>

<style>
body, h1,h2,h3,h4,h5,h6 {
font-family: "Montserrat", sans-serif
}
.w3-row-padding img {
margin-bottom: 12px
}

.w3-sidebar {
width: 120px;
background: #222;
}

#popravi{
    background-size: cover; /* Resize the background image to cover the entire container */
    background: linear-gradient(mediumvioletred,rgba(141, 153, 174, 0.5)), url("./slike/nokti10.png") no-repeat fixed;
}

.w3-content{
    margin-left: 270px;
    margin-right: auto;
}

#podnozje{
    margin-left:700px;
    margin-top: 180px;
    margin-bottom:2px;
}

#facebook{
    margin-left:50px;
}

#ikone{
    margin-top:4px;
}

#logo{
    font-size: 80px;
    margin-top: 15px;
    margin-left: 70px;
    font-family: 'Emilys Candy', cursive;
}

@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>

<body class="w3-black" id="popravi">

<div class="w3-display-bottomleft w3-hide-small"
   style="bottom:90%;opacity:0.7;width:100%;margin-left:1200px;height:10%">
  <h2 id="logo" style="font-size:50px"><b>STL Nails</b></h2>
</div>

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

  <a href="pocetna.php" class="w3-bar-item w3-button w3-padding-large">
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

  <a href="upit.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black w3-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>KONTAKT</p>
  </a>
</nav>

<div class="w3-padding-large" id="main">

  <!-- Contact Section -->
  <form method="post" action="https://formspree.io/strucelj.leona@gmail.com">
  <div class="w3-padding-64 w3-content w3-text-white" id="contact" style:"margin-right:50px">
    <h2 class="w3-text-light-grey">Contact Me</h2>
    <hr style="width:200px" class="w3-opacity">

    <div class="w3-section">
      <p><i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Pula, CRO</p>
      <p><i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Phone: +385 994070969</p>
      <p><i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"> </i> Email: strucelj.leona@gmail.com</p>
    </div><br>
    <p>Za dodatna pitanja kontaktirajte me u nastavku: </p>

    <form target="_blank" style="margin-bottom:-9%">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Ime i prezime" required name="Name"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Naslov" required name="Subject"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Poruka" required name="Message"></p>
      <p>
        <button class="w3-button w3-light-grey w3-padding-large" type="submit">
          <i class="fa fa-paper-plane"></i> POŠALJI PORUKU
        </button>
      </p>
    </form>
  <!-- End Contact Section -->
  </div>

    <!-- Footer -->
  <footer class="w3-text-white w3-xlarge" id="podnozje">
    <a href="https://www.facebook.com/stl.leona.nails/"><i class="fa fa-facebook-official w3-hover-opacity" id="facebook"></i></a>
    <a href="https://www.instagram.com/stl.nails/"><i class="fa fa-instagram w3-hover-opacity"></i></a>
    <p class="w3-medium" id="ikone">© 2019 Leona Štrucelj </p>
  <!-- End footer -->
  </footer>

<!-- END PAGE CONTENT -->
</div>
</body>
</html>