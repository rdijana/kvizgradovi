<?php
session_start();
include "konekcija/konekcija.php";
if(!isset($_SESSION['korisnik'])) {
echo("Nemate pravo pristupa ovoj stranici.Registrujte se.");
 exit();
}
include "head.php";
include "nav.php";
$upit="SELECT * FROM pitanja";
$priprema=$konekcija->prepare($upit);
$izvrsi=$priprema->execute();
$ukupnoPitanja=$priprema->rowCount();
$upitDva="SELECT * FROM rezultat WHERE idKorisnika=:idKorisnika";
$pripremi=$konekcija->prepare($upitDva);
$pripremi->bindParam(":idKorisnika",$_SESSION["korisnik"]->idKorisnika);
$pripremi->execute();
$rezultat=$pripremi->fetch();

if($pripremi->rowCount()){
    $rezultatK=$rezultat->rezultatKor;

    echo ("<div class='container-fluid my-5 py-5'><div class='row'><div class='col-12'><h4 class='text-center'>Imate pravo da učestvujete samo jednom u kvizu.</h4><h5 class='text-center mb-5 pb-5 pt-4'>Vaš rezultat je : ".$rezultatK . " / " .$ukupnoPitanja."</h5></div></div></div>");
    require('footer.php');
    exit();
}
?>
<div class="container mt-5 mb-5 pb-5">
<div class="row ">
    <div class="col-12" id="kviz">
<h2 class="text-center pt-4 pb-5">Dobrodošli u kviz Gradovi !</h2>


<ul  class="text-center">
     <li><h4 class="pb-4">Pravila kviza:</h4></li>
    <li>Broj pitanja: <?= $ukupnoPitanja ?></li>
    <li>Imate pravo da izaberete samo jedan odgovor</li>
    <li>Možete da učestvujete samo jednom u kvizu</li>
    <li><i class="fas fa-arrow-down"></i></li>
    <li><a href="pitanja.php?strana=1" class="mb-5"><span class="boja1">Započni kviz</span></a></li>
</ul>
</div>
</div>
</div>
<?php

include "footer.php";
    ?>