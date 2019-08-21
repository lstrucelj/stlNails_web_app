<!DOCTYPE html>
<?php

?>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Cjenik usluga</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
    <link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
    <script src="fullcalendar/lib/jquery.min.js"></script>
    <script src="fullcalendar/lib/moment.min.js"></script>
    <script src="fullcalendar/fullcalendar.min.js"></script>
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

#popravi{
    margin-top: -5px;
    background-repeat: no-repeat;
  }

table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
  background-color: #fff;
}
table#t01 th {
  color: white;
  background-color: #222;
}

#tablica{
    margin-left: 390px;
    margin-top: 180px;
    margin-right:-350px;
    }

td{
    color: black;
}

</style>

<body class="w3-black" id="popravi">

<div class="w3-display-bottomleft w3-hide-small"
   style="bottom:90%;opacity:0.7;width:100%;margin-left:1200px;height:10%">
  <h2 id="logo" style="font-size:50px"><b>STL Nails</b></h2>
</div>
    <div id="nav">
        <!-- Icon Bar (Sidebar - hidden on small screens) -->
        <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

          <a href="pocetna.php" class="w3-bar-item w3-button w3-padding-large">
            <i class="fa fa-home w3-xxlarge"></i>
            <p>POČETNA</p>
          </a>
          <a href="prijava.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-user w3-xxlarge"></i>
            <p>PRIJAVA</p>
          </a>
          <a href="registracija.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-arrow-circle-right w3-xxlarge"></i>
            <p>REGISTRACIJA</p>
          </a>
          <a href="galerija.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-eye w3-xxlarge"></i>
            <p>GALERIJA</p>
          </a>
          <a href="rezervacija.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
              <i class="fa fa-calendar-plus-o w3-xxlarge"></i>
            <p>REZERVACIJA</p>
            </a>
          <a href="tablica.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black w3-black">
            <i class="fa fa-money w3-xxlarge"></i>
            <p>CJENIK</p>
          </a>
          <a href="upit.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-envelope w3-xxlarge"></i>
            <p>KONTAKT</p>
          </a>
        </nav>

<div id="tablica">
<table id="t01">
  <tr>
    <th style="width:300px;padding:15px">Usluga</th>
    <th style="width:80px;padding:15px">Cijena (HRK)</th>
  </tr>
  <tr>
    <td style="width:700px;padding:6px;text-align:left;">Nadogradnja gelom</td>
    <td style="width:120px;padding:6px;text-align:center">130.00</td>
  </tr>
  <tr>
      <td style="width:700px;padding:6px;text-align:left;">Korekcija gela</td>
      <td style="width:120px;padding:6px;text-align:center">100.00</td>
  </tr>
  <tr>
      <td style="width:700px;padding:6px;text-align:left;">Korekcija tuđe usluge</td>
      <td style="width:120px;padding:6px;text-align:center">110.00</td>
  </tr>
  <tr>
      <td style="width:700px;padding:6px;text-align:left;">Trajni lak</td>
      <td style="width:120px;padding:6px;text-align:center">100.00</td>
  </tr>
  <tr>
      <td style="width:700px;padding:6px;text-align:left;">Skidanje gela/trajnog laka</td>
      <td style="width:120px;padding:6px;text-align:center">60.00</td>
  </tr>
  <tr>
      <td style="width:700px;padding:6px;text-align:left;">Popravak nokta</td>
      <td style="width:120px;padding:6px;text-align:center">20.00</td>
  </tr>
  <tr>
       <td style="width:700px;padding:6px;text-align:left;">Pedikura</td>
       <td style="width:120px;padding:6px;text-align:center">100.00</td>
  </tr>
  <tr>
       <td style="width:700px;padding:6px;text-align:left;">Manikura + pedikura</td>
       <td style="width:120px;padding:6px;text-align:center">200.00</td>
  </tr>
  <tr>
       <td style="width:700px;padding:6px;text-align:left;">Poklon bon - geliranje</td>
       <td style="width:120px;padding:6px;text-align:center">130.00</td>
  </tr>
  <tr>
       <td style="width:700px;padding:6px;text-align:left;">Poklon bon - trajni lak</td>
       <td style="width:120px;padding:6px;text-align:center">100.00</td>
  </tr>

</table>
</div>
</body>
</html>