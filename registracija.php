<!DOCTYPE html>
<?php
include("baza.class.php");
$baza = new Baza();
$baza->spojiDB();



if(isset($_POST['registracija'])){
    if(!empty($_POST)){
        $poruka = "";
        //var_dump($_POST);

        if(!isset($_POST['ime']) || !isset($_POST['prezime']) || !isset($_POST['korIme']) || !isset($_POST['email']) || !isset($_POST['lozinka']) || !isset($_POST['lozinka_provjera']) || !isset($_POST['brojMob'])){
            $poruka .= "Nisu uneseni svi podaci.<br />";
        }
        /*
        if(($_GET['firstName'])== null || ($_POST['lastName'])== null || ($_POST['userName'])==null || ($_POST['email'])== null || ($_POST['psw'])== null || ($_POST['psw2'])==null || ($_POST['phone'])==null){
             $poruka .= "Nisu uneseni svi podaci.<br />";
        }
        */
        else{
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            $korisnicko_ime = $_POST['korIme'];
            $email = $_POST['email'];
            $lozinka = $_POST['lozinka'];
            $potvrda = $_POST['lozinka_provjera'];
            $telefon = $_POST['brojMob'];
            $id_tip = 1;

            if(empty($ime) || empty($prezime) || empty($korisnicko_ime) || empty($email) || empty($lozinka) || empty($potvrda)){
                  $poruka .= "Nisu uneseni svi podaci.<br />";
            }
            else {
                $upit="SELECT * FROM korisnici WHERE korisnicko_ime = '{$korisnicko_ime}'";
                $res = $baza->selectDB($upit);

                if(strcmp($lozinka, $potvrda) != 0){
                    $poruka .= "Lozinke nisu jednake.<br />";
                }
                $regex_lozinka = '/^(?=(?:.*[A-Z]){2,})(?=(?:.*[a-z]){2,})(?=(?:.*[0-9]){1,})\S{5,15}$/';
                if(!preg_match($regex_lozinka, $lozinka)){
                    $poruka .= "Lozinka nema barem 2 mala, 2 velika slova i jedan broj ili nije duljine od 5-15 znakova.<br />";
                }
                if ($res->num_rows == 1) {
                    $poruka .= "Korisnicko ime je zauzeto!.<br />";
                }

                $upit="SELECT * FROM korisnici WHERE email = '{$email}' LIMIT 1";
                $res2 = $baza->selectDB($upit);
                if ($res2 != null){
                if ($res2->num_rows == 1) {
                    $poruka .= "Email je zauzet!.<br />";
                }
                }

                $mail = '/^\b[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,4}\b$/i';
                if(!preg_match($mail, $email)){
                    $poruka .= "Email je neispravnog formata.<br />";
                }

                $regex_znak = '/[\\()\'{}!#"\/]/';
                if(preg_match($regex_znak, $ime)){
                    $poruka .= "Ime ne smije sadrzavati nedozvoljene znakove!<br />";
                }
                if(preg_match($regex_znak, $prezime)){
                    $poruka .= "Prezime ne smije sadrzavati nedozvoljene znakove!<br />";
                }
                if(preg_match($regex_znak, $korisnicko_ime)){
                    $poruka .= "Korisnicko ime ne smije sadrzavati nedozvoljene znakove!<br />";
                }
                if(preg_match($regex_znak, $email)){
                    $poruka .= "Email ne smije sadrzavati nedozvoljene znakove!<br />";
                }
                if(preg_match($regex_znak, $lozinka)){
                    $poruka .= "Lozinka ne smije sadrzavati nedozvoljene znakove!<br />";
                }
                if($poruka == ""){
                    $sql="INSERT INTO korisnici (korisnicko_ime, ime, prezime, email, lozinka, br_tel, id_tip) VALUES ('{$korisnicko_ime}', '{$ime}','{$prezime}','{$email}','{$lozinka}','{$telefon}',1)";
                    $baza->updateDB($sql);
                    header("Location: http://localhost/zavrsni_rad/prijava.php");
                    die();
                }
            }
        }
    }
}
$baza->zatvoriDB();
?>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
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
color:black;
}

#poruka{
  color:red;
}

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
  <a href="prijava.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>PRIJAVA</p>
  </a>
  <a href="registracija.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black w3-black">
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
  <a href="tablica.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
     <i class="fa fa-money w3-xxlarge"></i>
     <p>CJENIK</p>
  </a>
  <a href="upit.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>KONTAKT</p>
  </a>
</nav>

<div>
        <div id="signup"></div>
        <div id="main1"></div>

        <form id="registracija" name="registracija" method="post" novalidate action="registracija.php">
        <div id="reg">
            <div id="lijevo">
            Ime: <br>
            <input type="text" name="ime" placeholder="  Ime" id="firstName" required="">
            Korisničko ime: <br>
            <input type="text" name="korIme" placeholder="  Korisničko ime" id="userName" required="">
            <br>
            Lozinka: <br>
            <input type="password" name="lozinka" placeholder="  Lozinka" id="psw" required="">
            <br>
            Broj mobitela: <br>
            <input type="text" name="brojMob" placeholder="  099/1234-567" id="phone" required="">
            <br>
            <br>
            </div>
            <div id="desno">
            Prezime: <br>
            <input type="text" name="prezime" placeholder="  Prezime" id="lastName" required="">
            <br>
            Email: <br>
            <input type="text" name="email" placeholder="  Email" id="email" required="">
            <br>
            Ponovni upis lozinke: <br>
            <input type="password" name="lozinka_provjera" placeholder="  Ponovi lozinku" id="psw2" required="">
            <br>
            <br>
            <input type="submit" id="posalji" name="registracija" value="REGISTRIRAJ SE"><br>
            </div>
            <p id="poruka">
                 <?php
                 if (isset($poruka)) {
                      echo $poruka;
                 }
                 ?>
            </p>
</div>
        </form>
</div>
</body>
</html>