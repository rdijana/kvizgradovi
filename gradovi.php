<?php
session_start();
include "konekcija/konekcija.php";
include "head.php";
include "nav.php";

if(!isset($_SESSION['korisnik'])) {
 exit();
}

$upit = 'SELECT * FROM gradovi';
$priprema = $konekcija->prepare($upit);
$rezultatUpita = $priprema->execute();
$ukupnoGradova = $priprema->rowCount();
$brojGradovaPoStrani=2;
$odstupanje=0;
if(isset($_GET["strana"])){
$odstupanje=($_GET["strana"]-1)*$brojGradovaPoStrani;
}
$upit="SELECT * FROM gradovi LIMIT :lim OFFSET :ods";
$priprema=$konekcija->prepare($upit);
$priprema->bindParam(':ods', $odstupanje,PDO::PARAM_INT);
$priprema->bindParam(':lim', $brojGradovaPoStrani,PDO::PARAM_INT);
$izvrsi=$priprema->execute();
$gradovi=$priprema->fetchAll();
$brojStrana=ceil($ukupnoGradova/$brojGradovaPoStrani);
?>
<main>
<div class="container-fluid mt-5">
    <div class="row" id="slike">        
<?php
foreach($gradovi as $grad):?>
<div class="col-12 col-md-6 p-5">
<img src="<?= $grad->putanjaSlike;?>" alt="<?= $grad->altSlike;?>"class="img-fluid"/>
<h2 class="pt-3 pb-3 text-center"><?= $grad->imeGrada;?></h2>
<p><?= $grad->opisGrada;?></p>
        </div>
<?php endforeach; ?>  
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 mt-5 d-flex justify-content-center stranice">
            <p class="pt-5 pb-5">Izaberite stranu:
        <?php for($i = 0; $i < $brojStrana ; $i++): ?>
            <a href="<?= $_SERVER["PHP_SELF"] 
            . "?strana=" . ($i + 1) ?>"><?= $i+1 ?></a>
<?php endfor ?></p>
        </div>
    </div>
</div>
</main>
<?php
include "footer.php";
?>