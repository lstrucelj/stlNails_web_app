<!DOCTYPE html>
<?php
include("baza.class.php");
include("sesija.class.php");
Sesija::kreirajSesiju();
$baza = new Baza();
$baza->spojiDB();

if(Sesija::dajKorisnika() != null ){
	header("Location: http://localhost/zavrsni_rad/pocetna.php");
	die();
}

if(!empty($_POST)){
    $korime = $_POST['korisnicko_ime'];
	$p_lozinka = $_POST['prijava_lozinka'];

	if(empty($korime) || empty($p_lozinka)){
           $message = "Nisu uneseni podaci!";
           echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else{
	$rez = $baza->selectDB('SELECT * FROM korisnici WHERE korisnicko_ime = "' .$korime. '" AND lozinka = "' .$p_lozinka. '";');
	if($rez->num_rows > 0){
			$rez = $rez->fetch_array();
			if($rez["zakljucan"]==1){
				$message = "Korisnik je zakljucan!";
                echo "<script type='text/javascript'>alert('$message');</script>";
			}else{
				$rez = $baza->selectDB('SELECT * FROM korisnici WHERE korisnicko_ime = "' .$korime. '" AND lozinka = "' .$p_lozinka. '";');
                $korisnik=$rez->fetch_assoc();
                Sesija::kreirajKorisnika($korisnik);
                $baza->updateDB("UPDATE korisnici SET pokusaj=0 WHERE korisnicko_ime='{$korisnik["korisnicko_ime"]}'");
                header("Location: http://localhost/zavrsni_rad/pocetna.php");
                die();
			}
	}else{
			$rez = $baza->selectDB('SELECT * FROM korisnici WHERE korisnicko_ime = "' .$korime. '";');
			if($rez->num_rows > 0){
				$rez = $rez->fetch_array();
				$broj_p = intval($rez["pokusaj"]);

				if($broj_p >= 3){
					$baza->updateDB("UPDATE korisnici SET zakljucan=1 WHERE korisnicko_ime='{$korime}'");
					$message = "Korisnik je zakljucan!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
				}else{
					$broj_p=$broj_p+1;
					$baza->updateDB("UPDATE korisnici SET pokusaj={$broj_p} WHERE korisnicko_ime='{$korime}'");
				}
			}
			else {
			    $message = "Korisnik nije registriran!";
                echo "<script type='text/javascript'>alert('$message');</script>";
			}
	}
	}
}

?>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
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

input{
    color: white;
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
  <a href="prijava.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black w3-black" >
    <i class="fa fa-user w3-xxlarge"></i>
    <p>PRIJAVA</p>
  </a>
  <a href="registracija.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-arrow-circle-right w3-xxlarge"></i>
    <p>REGISTRACIJA</p>
  </a>


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

<div>
<div id="box">
    <div id="signup">
      <h1 id="kreiraj">KREIRAJ RAČUN</h1>
      <button id="signup_btn" >
      <a href="registracija.php" class="linija">REGISTRIRAJ SE<a/>
      </button>
</div>

<div id="main"></div>

<form id="prijava" name="prijava" method="post" novalidate action="prijava.php">
    <div id="login_form">
      Korisničko ime: <br>
      <input type="text" name="korisnicko_ime" placeholder="Korisničko ime" id="name">
      <br>
      <br>
      Lozinka: <br>
      <input type="password" name="prijava_lozinka" placeholder="Lozinka" id="name">
      <br>
      <br>
      <input type="submit" id="sub" value="PRIJAVA"><br>
      </div>
      </form>
     </div>
</div>
</body>
</html>