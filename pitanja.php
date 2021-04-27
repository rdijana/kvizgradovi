<?php
session_start();
if(!isset($_SESSION['korisnik'])) {
echo("Nemate pravo pristupa ovoj stranici.Registrujte se.");
 exit();
}
include "konekcija/konekcija.php";
include "head.php";
include "nav.php";

$upit = 'SELECT * FROM pitanja';
$priprema = $konekcija->prepare($upit);
$rezultatUpita = $priprema->execute();
$ukupnoPitanja = $priprema->rowCount();
$upitRezultat = 'SELECT * FROM rezultat WHERE idKorisnika =:idKorisnika';
$pripremaRez = $konekcija->prepare($upitRezultat);
$pripremaRez->bindParam(':idKorisnika', $_SESSION['korisnik']->idKorisnika);
$pripremaRez->execute();
$rezultatUpita = $pripremaRez->fetch();
if($pripremaRez->rowCount()) {
 $rezultat= $rezultatUpita->rezultatKor;
 echo ("<div class='container-fluid my-5 py-5'><div class='row'><div class='col-12'><h4 class='text-center'>Čestitamo završili ste kviz.</h4><h5 class='text-center mb-5 pb-5 pt-4'>Vaš rezultat je : ".$rezultat . " / " .$ukupnoPitanja."</h5></div></div></div>");
 include "footer.php";
 exit();
}
if(isset($_GET['strana'])){
 $stranica = $_GET['strana'] - 1;
} else {
 $stranica = 0;
}
$pitanjaPoStrani =3;
$ods = $pitanjaPoStrani * $stranica;
$upitOds = 'SELECT * FROM pitanja LIMIT :lim OFFSET :ofs';
$priprema= $konekcija->prepare($upitOds);
$priprema->bindParam(':ofs', $ods,PDO::PARAM_INT);
$priprema->bindParam(':lim', $pitanjaPoStrani,PDO::PARAM_INT);
$izvrsi= $priprema->execute();
$rezultati= $priprema->fetchAll();


$upitOdgovori = 'SELECT * FROM `odgovor`';
$pripremaOdg= $konekcija->prepare($upitOdgovori);
$izvrsii = $pripremaOdg->execute();
$rezultatOdg= $pripremaOdg->fetchAll();
$brojStranica = ceil($ukupnoPitanja/ $pitanjaPoStrani);

?>
<div class="container-fluid mt-5 mb-5 pb-5">
 <div class="row d-flex justify-content-center">
<div class="col-8 col-lg-4">
    <div class="row" id="pitanja">
 <form method="POST" action="proveraKviz.php">
<?php 
// $redniBroj=1;
foreach($rezultati as $pitanje):?>
 <p class="mb-0 pt-3 pb-1"><?php echo $pitanje->idPitanja. ". " . $pitanje->pitanje;?></p>
 <?php
 foreach($rezultatOdg as $odgovor){
 if($odgovor->idPitanja == $pitanje->idPitanja){
 ?>
<input type="radio" id="<?php echo $odgovor->idOdgovora;?>"name="odgovori<?php echo $pitanje->idPitanja; ?>" value="<?php echo
$odgovor->tacan; ?>"/>
 <?php echo $odgovor->odgovor . "<br>";
 }
 }
//  $redniBroj++;
 ?>
 <?php endforeach; ?>
 <input type="hidden" value="<?php echo ($stranica + 2); ?>" name="sledecePitanje" />
 <?php
 if($stranica != 0):?>
 <a href="<?php echo $_SERVER["PHP_SELF"]."?strana=" .$stranica; ?>" class="m-3 dugme">Prethodno</a>
 <?php endif; ?>
 <?php
 if($stranica + 1 == $brojStranica):?>
 <input type="submit" class="dugme" value="Završi kviz" id="zavrsi" name="zavrsi" class="mt-3" />
 <?php else: ?>
 <input type="submit" class="dugme" value="Sledeće" id="sledece" name="sledece" class="mt-3" />
 <?php endif; ?>
 </form>
</div>
</div>
 </div>
</div>
<?php
 include "footer.php";
?>
