<?php
include "../konekcija/konekcija.php";

header("Content-Type:application/json");
$podaci=null;
if(isset($_POST['send'])){
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $email=$_POST['email'];
    $korisnickoIme=$_POST['korisnickoIme'];
    $pol=$_POST['pol'];
    $lozinka=$_POST['lozinka'];
    $uloga=$_POST['uloga'];

    $greske=[];

    $reImePrezime="/^[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,24}(\s[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,24})?$/";
    $reLozinka="/^[0-9]{4,15}$/";
    $reKorisnickoIme="/^[a-z]{4,60}$/";
    $reEmail="/^[a-z][a-z\d\.\-\_]+\@[a-z\d]+(\.[a-z]{2,4})+$/";
    if(!preg_match($reImePrezime,$ime)){
        array_push($greske,"Ime nije u dobrom formatu");
    }
    if(!preg_match($reImePrezime,$prezime)){
        array_push($greske,"Prezime nije dobrog formata");
    }
    if(!preg_match($reKorisnickoIme,$korisnickoIme)){
        array_push($greske,"Korisničko ime nije u dobrom formatu");
    }
    if(!preg_match($reLozinka,$lozinka)){
        array_push($greske,"Lozinka nije u dobrom formatu");
    }
    if(empty($pol)){
        array_push($greske,"Izaberite pol");
    }
    if(!preg_match($reEmail,$email)){
array_push($greske,"Email nije ok");
    }
    if(empty($uloga)){
        array_push($greske,"Izaberite ulogu");
    }
    if(count($greske)){
        $podaci=$greske;
    }else{
        $upit="INSERT INTO korisnik VALUES (NULL,:ime,:prezime,:email,:lozinka,:korisnickoIme,:uloga,NULL,:pol,:datum)";
        $pripremi=$konekcija->prepare($upit);
        $pripremi->bindParam(":ime",$ime);
        $pripremi->bindParam(":prezime",$prezime);
        $pripremi->bindParam(":email",$email);
        $lozinkaSif=md5($lozinka);
        $pripremi->bindParam(":lozinka",$lozinkaSif);
        $pripremi->bindParam(":korisnickoIme",$korisnickoIme);
        $pripremi->bindParam(":uloga",$uloga);
        $pripremi->bindParam(":pol",$pol);
        $datum=date("Y-m-d H:i:s");
-        $pripremi->bindParam(":datum",$datum);
        try{
            $kod=$pripremi->execute()?201:300;
        }catch(PDOException $e){
            $podaci="Greska";
        }
    }
}
http_response_code($kod);
echo json_encode($podaci);
?>











