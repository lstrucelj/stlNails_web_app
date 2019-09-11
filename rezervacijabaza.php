<?php
include("sesija.class.php");
Sesija::kreirajSesiju();

$datum = filter_input(INPUT_POST, 'datum');
$vrijeme = filter_input(INPUT_POST, 'vrijeme');
$usluga = filter_input(INPUT_POST, 'usluga');
$korisnik = Sesija::dajKorisnika()["id"];
$tip = Sesija::dajKorisnika()["id_tip"];
if (!empty($datum)){
if (!empty($vrijeme)){
if (!empty($usluga)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "database";


// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
//mysql_query("SET NAMES 'utf8'");
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO termini (datum, vrijeme, id_usluge, id_korisnik)
values ('$datum','$vrijeme', '$usluga', '$korisnik')";
if ($conn->query($sql)){
   header("Location: http://localhost/zavrsni_rad/rezervacija.php");
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
}
else{
echo "Datum mora biti unešen!";
die();
}
}
else{
echo "Vrijeme mora biti unešeno!";
die();
}
?>

