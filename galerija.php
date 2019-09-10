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
    <title>Galerija</title>
    <sript src="https.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></sript>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="JQUERY.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Noticia+Text&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/uredi.css">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Emilys+Candy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
    <script src="fullcalendar/lib/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/galerija.css">
</head>

<body class="w3-black">

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
    <a href=\"registracija.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hover-black w3-black\">
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
      echo "<a href=\"galerija.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hover-black w3-black\" id=\"odjava_gumb\">
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

  <div class="scene">

    <!-- camera -->
    <div class="roll-camera">
      <div class="move-camera">
        <div class="wallpaper"></div>
          <!-- shelf -->
          <div class="shelf top">
            <div class="face top"></div>
            <div class="face front">

              <a href="#" data-img-url="../photos/1.jpg" class="photocard">
                <img src="./slike/nokti2.jpg" alt="">
              </a>
              <a href="#" class="photocard">
                <img src="./slike/slika4.jpg" alt="">
              </a>
              <a href="#" class="photocard">
                <img src="./slike/slika9.jpg" alt="">
              </a>

              <a href="#" class="photocard">
                <img src="./slike/slika1.jpg" alt="" style="margin-left:250px">
              </a>

            </div>
            <div class="face back"></div>
            <div class="face left"></div>
            <div class="face bottom"></div>
          </div>
          <!-- /shelf -->

          <!-- shelf -->
          <div class="shelf middle">
            <div class="face top"></div>
            <div class="face front">

              <a href="#" data-img-url="../photos/1.jpg" class="photocard">
                <img src="./slike/slika10.jpg" alt="">
              </a>
              <a href="#" class="photocard">
                <img src="./slike/slika6.jpg" alt="">
              </a>
              <a href="#" class="photocard">
                <img src="./slike/slika5.jpg" alt="">
              </a>

              <a href="#" class="photocard">
                  <img src="./slike/slika8.jpg" alt="" style="margin-left:250px">
               </a>

            </div>
            <div class="face back"></div>
            <div class="face left"></div>
            <div class="face bottom"></div>
          </div>
          <!-- /shelf -->

          <!-- shelf -->
          <div class="shelf bottom">
            <div class="face top"></div>
            <div class="face front">

              <a href="#" data-img-url="../photos/1.jpg" class="photocard">
                <img src="./slike/nokti.jpg" alt="">
              </a>
              <a href="#" class="photocard">
                <img src="./slike/nokti1.jpg" alt="">
              </a>
              <a href="#" class="photocard">
                <img src="./slike/slika3.jpg" alt="">
              </a>

               <a href="#" class="photocard">
                <img src="./slike/slika7.jpg" alt="" style="margin-left:250px">
               </a>

            </div>
            <div class="face back"></div>
            <div class="face left"></div>
            <div class="face bottom"></div>
          </div>
          <!-- /shelf -->
        </div>
        <!-- /camera -->
      </div>
      <div class="w3-display-bottomleft w3-hide-small"
             style="bottom:90%;opacity:0.7;width:100%;margin-left:1200px;height:10%">
            <h2 id="logo" style="font-size:50px"><b>STL Nails</b></h2>
      </div>
  </div>
  <div id="slike">
          <p>Cijelu galeriju možete pogledati <a href="https://www.instagram.com/stl.nails/" style="font-weight: bold;">OVDJE.</a></p>
  </div>

  <script>
  $(function(){
    var centerShelfs,
        $body = $('body'),
        $topShelf = $('.shelf.top'),
        $middleShelf = $('.shelf.middle'),
        $bottomShelf = $('.shelf.bottom');

    centerShelfs = function(){
      var topShelfPosition = $body.height()/2;

      $topShelf.css('top', topShelfPosition);
      $middleShelf.css('top', topShelfPosition + 200);
      $bottomShelf.css('top', topShelfPosition + 400);
    };

    moveToShelf = function(e){
      e.preventDefault();
      $body.attr('class', '');
      $body.addClass(e.target.id);
    };

    // bind events
    $(window).on('resize', centerShelfs);
    $('.nav a').on('click', moveToShelf);

    // move to start position
    centerShelfs();

    window.setTimeout(function(){
      $body.addClass('view-middle-shelf');
    }, 500);
  });
  </script>


</body>
</html>