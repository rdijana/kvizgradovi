<?php
include "./konekcija/konekcija.php";
$upit="SELECT * FROM futer";
$priprema=$konekcija->prepare($upit);
$rezultat=$priprema->execute();
$rezultati=$priprema->fetchAll();
$ispis="<ul id='futer'class='p-0'>";
foreach($rezultati as $rezultat){
    $ispis.="<li><a href='$rezultat->putanja'>$rezultat->faFa</a></li>";
}
$ispis.="</ul>";
echo $ispis;
?>