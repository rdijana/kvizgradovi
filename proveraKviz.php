<?php
session_start();
include "konekcija/konekcija.php";
if(!isset($_SESSION['odgovori'])) {
 $_SESSION['odgovori'] = array();
}
$upit = 'SELECT * FROM pitanja';
$priprema = $konekcija->prepare($upit);
$izvrsiU = $priprema->execute();
$ukupno = $priprema->rowCount();
if(isset($_POST['sledece']) || isset($_POST['zavrsi'])){
 for($i = 0; $i < $ukupno; $i++){
 $key = "odgovori" . ($i + 1);
 if(isset($_POST[$key])){
 $_SESSION['odgovori'][$key] = intval($_POST[$key]);
 }
 }
}
if(isset($_POST['sledece'])) {
 $sledecePitanje = $_POST['sledecePitanje'];
 header('Location:pitanja.php?strana=' . $sledecePitanje);
}
if(isset($_POST['zavrsi'])) {
    $rezultat=0;
 foreach($_SESSION['odgovori'] as $odgovor) {
 $rezultat += $odgovor;
 }
 
 $upit = 'INSERT INTO rezultat (idKorisnika,rezultatKor) VALUES(:idKorisnika,:rezultat)';
 $pripremi= $konekcija->prepare($upit);
 $pripremi->bindParam(':idKorisnika', $_SESSION['korisnik']->idKorisnika);
 $pripremi->bindParam(':rezultat', $rezultat);
 $izvrsi = $pripremi->execute();
 header('Location:pitanja.php');
}
?>