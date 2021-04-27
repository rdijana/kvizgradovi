<?php
include "./konekcija/konekcija.php";
$upit="SELECT * FROM meni";
$pripremi=$konekcija->prepare($upit);
$pripremi->execute();
$rezultati=$pripremi->fetchAll();
$ulogovan=false;
if(isset($_SESSION["korisnik"])){
    $ulogovan=true;
}
$ispis="<ul id='navigacija'>";
foreach($rezultati as $rezultat){
    if($rezultat->vidljiv==0){
        $ispis.="<li><a href='$rezultat->putanja'>$rezultat->naziv</a></li>";
    }
  if($ulogovan){
      if($rezultat->vidljiv==2){
      if($_SESSION['korisnik']->idUloge!=1 && $rezultat->naziv==="Admin"){
          $ispis.="";
      }else{
          $ispis.="<li><a href='$rezultat->putanja'>$rezultat->naziv</a></li>";
      }
  }
}else{
    if($rezultat->vidljiv==1){
        $ispis.="<li><a href='$rezultat->putanja'>$rezultat->naziv</a></li>";
    }
}
}
if($ulogovan){
    $ispis.="<li><a href='logout.php'>Odjava</a></li>";
}
$ispis.="</ul>";
echo $ispis;
?>