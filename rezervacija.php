<!DOCTYPE html>
<?php
include("baza.class.php");
include("sesija.class.php");
Sesija::kreirajSesiju();
$baza = new Baza();
$baza->spojiDB();
$tip = Sesija::dajKorisnika()["id_tip"];
?>


<?php
$connect = new PDO("mysql:host=localhost;dbname=database", "root", "");
$query = "SELECT t.datum, t.vrijeme, u.naziv, k.ime, k.prezime FROM termini t
          JOIN usluge u ON u.id = t.id_usluge
          JOIN korisnici k on k.id = t.id_korisnik
          WHERE t.datum>DATE(now())
          ORDER BY t.datum, t.vrijeme ASC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
?>

<html lang="hr">
<head>
    <meta charset="utf-8">
    <title>Rezervacija</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
    <script src="js/jquery.js"></script>
    <script src="js/timeline.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/timeline.min.css" />
    <link rel="stylesheet" type="text/css" href="css/rezervacija.css">
    <link rel="stylesheet" type="text/css" href="css/termini.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

    <script>

    function openForm() {
      document.getElementById("myForm").style.display = "flex";
      //var startD = $.fullCalendar.formatDate(start, "Y-MM-DD");
      //document.getElementById("dateId").value = startD;
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }

    </script>
</head>

<style>

.w3-sidebar {
width: 120px;
background: #222;
}

#popravi{
    margin-top: -5px;
    background-repeat: no-repeat;
  }

.container{
    margin-left:50%;
    width: 800px;
    margin-top: 12%;
}

.w3-bar-block.w3-center .w3-bar-item {
    text-align: center;
    color: white;
}

.w3-padding-large {
    padding: 12px 24px!important;
}

.w3-bar-block .w3-bar-item{
    height:101.6px;
}

#sibar{
    color: white;
    font-size: 12px;
    font-family: 'Montserrat', serif;
    text-decoration: none;
    margin-top:8px;
}

</style>

<body class="w3-black" id="popravi">


<div class="w3-display-bottomleft w3-hide-small"
   style="bottom:90%;opacity:0.7;width:100%;margin-left:1200px;height:10%">
  <h2 id="logo" style="font-size:50px; margin-top: 25px"><b>STL Nails</b></h2>
</div>
    <div id="nav">
        <!-- Icon Bar (Sidebar - hidden on small screens) -->
        <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

          <a href="pocetna.php" class="w3-bar-item w3-button w3-padding-large">
            <i class="fa fa-home w3-xxlarge"></i>
            <p id="sibar">POČETNA</p>
          </a>

  <?php
  if(Sesija::dajKorisnika() == null ){
  echo "<a href=\"prijava.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hover-black\" id=\"prijava_gumb\">
    <i class=\"fa fa-user w3-xxlarge\"></i>
    <p id=\"sibar\">PRIJAVA</p>
    </a>
    <a href=\"registracija.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hover-black w3-black\">
       <i class=\"fa fa-arrow-circle-right w3-xxlarge\"></i>
       <p id=\"sibar\">REGISTRACIJA</p>
     </a>";
    }
    else {
    echo "<a href=\"odjava.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hover-black\" id=\"odjava_gumb\">
              <i class=\"fa fa-sign-out w3-xxlarge\"></i>
              <p id=\"sibar\">ODJAVA</p>
            </a>"
            ;
  }
  ?>

  <?php
    if(Sesija::dajKorisnika() != null ){
      echo "<a href=\"galerija.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hover-black\" id=\"odjava_gumb\">
                  <i class=\"fa fa-eye w3-xxlarge\"></i>
                  <p id=\"sibar\">GALERIJA</p>
              </a>

              <a href=\"rezervacija.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hover-black w3-black\" id=\"odjava_gumb\">
                    <i class=\"fa fa-calendar-plus-o w3-xxlarge\"></i>
                  <p id=\"sibar\">REZERVACIJA</p>
                  </a>
                <a href=\"tablica.php\" class=\"w3-bar-item w3-button w3-padding-large w3-hover-black\" id=\"odjava_gumb\">
                  <i class=\"fa fa-money w3-xxlarge\"></i>
                  <p id=\"sibar\">CJENIK</p>
                </a>";
    }
    ?>

          <a href="upit.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-envelope w3-xxlarge"></i>
            <p id="sibar">KONTAKT</p>
          </a>
        </nav>



<div class="container">
  <br />
    <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Rezervirani termini</h3>
        <div class="btn-block">
            <button type="submit" value="Submit" href="/" onclick="openForm()" style="margin-left: 77%; margin-top: -3px; border-radius: 40px; display:inline-block; width: 20%">REZERVIRAJ TERMIN</button>
        </div>
    </div>
    <div class="panel-body">
     <div class="timeline">
      <div class="timeline__wrap">
       <div class="timeline__items">
       <?php
       foreach($result as $row)
       {
       ?>
        <div class="timeline__item">
         <div class="timeline__content">
          <h2><?php echo date("d.m.Y", strtotime($row['datum']));?></h2>
          <p><?php echo $row["vrijeme"];?></p>
          <p><?php echo $row["naziv"];?></p>
          <?php
            if($tip == 3){
            echo ($row["ime"]) . "  " . ($row["prezime"]);
            }
          ?>
         </div>
        </div>
       <?php
       }
       ?>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
</div>



<div class="testbox" id="myForm" style="margin-top: -3%">
      <form method="post" action="rezervacijabaza.php">
        <div class="banner">
          <h1 style="margin-left:230px; font-size: 30px; font-weight: bold; color: #700767">REZERVACIJA TERMINA</h1><br />
        </div>
        <div class="item">
          <p>Datum termina</p>
          <input style="color: black" type="date" id="dateId" name="datum" />
          <i class="fas fa-calendar"></i>
        </div>
        <div class="item">
          <p style="margin-top: 10px; margin-bottom: 5px">Vrijeme termina</p>
          <input type="time" name="vrijeme" id="slova"/>
          <i class="fas fa-clock"></i>
        </div>
        <div class="item">
          <p style="margin-top: 10px; margin-bottom: 5px">Usluga</p>
          <select name="usluga">
            <option value="">*Please select*</option>
            <option value="1">Nadogradnja gelom</option>
            <option value="2">Korekcija gela</option>
            <option value="3">Korekcija tuđe usluge</option>
            <option value="4">Trajni lak</option>
            <option value="5">Skidanje gela/trajnog laka</option>
            <option value="6">Popravak nokta</option>
            <option value="7">Pedikura</option>
            <option value="8">Manikura + pedikura</option>
          </select>
        </div>

        <div class="item">
          <p style="margin-top: 10px; margin-bottom: 5px">Kontakt broj</p>
          <input type="text" name="name" id="slova"/>
        </div>

        <div class="btn-block">
          <button type="submit" value="Submit" href="/" onclick="closeForm()" style="display:inline; margin-top: 20px">REZERVIRAJ</button>
          <button type="reset" value="Reset" href="/" onclick="closeForm()" style="margin-left:0; float:right; background:#fe88d1; margin-top: 20px">PONIŠTI</button>
        </div>
      </form>
    </div>
</body>
</html>


<script>
$(document).ready(function(){
 jQuery('.timeline').timeline({
  //mode: 'horizontal',
  //visibleItems: 4
  //Remove this comment for see Timeline in Horizontal Format otherwise it will display in Vertical Direction Timeline
 });
});
</script>