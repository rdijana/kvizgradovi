<?php
include "../konekcija/konekcija.php";
header('Content-Type:application/json');
if(isset($_POST['send'])){
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $email=$_POST['email'];
    $lozinka=$_POST['lozinka'];
    $pol=$_POST['pol'];
    $korisnickoIme=$_POST['korisnickoIme'];

    $reImePrezime="/^[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,24}(\s[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,24})?$/";
    $reLozinka="/^[0-9]{4,15}$/";
    $reKorisnickoIme="/^[a-z]{4,60}$/";
    $reEmail="/^[a-z][a-z\d\.\-\_]+\@[a-z\d]+(\.[a-z]{2,4})+$/";

    $greske=[];

    if(!preg_match($reImePrezime,$ime)){
        array_push($greske,"Ime nije u dobrom formatu");
    }
    if(!preg_match($reImePrezime,$prezime)){
        array_push($greske,"Prezime nije dobrog formata");
    }
    if(!preg_match($reLozinka,$lozinka)){
        array_push($greske,"Lozinka nije u dobrom formatu");
    }
    if(!preg_match($reKorisnickoIme,$korisnickoIme)){
        array_push($greske,"Korisnicko ime nije u dobrom formatu");
    }
    if(empty($pol)){
        array_push($greske,"Izaberite pol");
    }
    if(!preg_match($reEmail,$email)){
array_push($greske,"Email nije ok");
    }
if(count($greske)==0){
    $upit="INSERT INTO korisnik VALUES (NULL,:ime,:prezime,:email,:lozinka,:korisnickoIme,2,NULL,:pol,:datum)";
        $pripremi=$konekcija->prepare($upit);
        $pripremi->bindParam(":ime",$ime);
        $pripremi->bindParam(":prezime",$prezime);
        $pripremi->bindParam(":email",$email);
        $lozinkaSif=md5($lozinka);
        $pripremi->bindParam(":lozinka",$lozinkaSif);
        $pripremi->bindParam(":korisnickoIme",$korisnickoIme);
        $pripremi->bindParam(":pol",$pol);
        $datum=date("Y-m-d H:i:s");
        $pripremi->bindParam(":datum",$datum);
        try{
            $uspesno=$pripremi->execute();
            $kod=201;
            $poruka="Uspešno ste se registrovali.";
        }catch(PDOException $e){
            $poruka="Vec postoji korisnik sa tim email";
        }
}else{
    $poruka=$greske;
}

}else{
    $poruka="Stranica nije pronadjena";
}
echo json_encode($poruka);
http_response_code($kod);
?>