<?php
session_start();
include  "../konekcija/konekcija.php";
header("Content-Type:Application/json");
$poruka=null;
if(isset($_POST["send"]) && $_SESSION["korisnik"]->nazivUloge==="admin"){
    $ime=$_POST["ime"];
    $prezime=$_POST["prezime"];
    $email=$_POST["email"];
    $korisnickoIme=$_POST["korisnickoIme"];
    $lozinka=$_POST["lozinka"];
    $idUloge=$_POST["uloga"];
    $idKorisnika=$_POST["idKorisnika"];
$greske=[];

    $reImePrezime="/^[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,14}(\s[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,14})?$/";
    $reLozinka="/^[0-9]{4,20}$/";
    $reKorisnickoIme="/^[a-z]{4,15}$/";
$reEmail="/^[a-z][a-z\d\.\-\_]+\@[a-z\d]+(\.[a-z]{2,4})+$/";
    if(!preg_match($reImePrezime,$ime)){
        array_push($greske,"Ime nije u dobrom formatu");
    }
    if(!preg_match($reImePrezime,$prezime)){
        array_push($greske,"Prezime nije dobrog formata");
    }
    if(!preg_match($reKorisnickoIme,$korisnickoIme)){
        array_push($greske,"Korisnicko ime nije u dobrom formatu");
    }
    if(!preg_match($reLozinka,$lozinka)){
        array_push($greske,"Lozinka nije u dobrom formatu");
    }
    if(!preg_match($reEmail,$email)){
array_push($greske,"Email nije ok");
    }
    if(empty($idUloge)){
        array_push($greske,"Izaberite ulogu");
    }
    if(count($greske)){
        $poruka=$greske;
    }
        else{
            $upit="UPDATE korisnik SET ime=:ime,prezime=:prezime,email=:email,lozinka=:lozinka,korisnicko_ime=:korisnickoIme,idUloge=:idUloge WHERE idKorisnika=:idKorisnika";
            $priprema=$konekcija->prepare($upit);
            $priprema->bindParam(":ime",$ime);
            $priprema->bindParam(":prezime",$prezime);
            $priprema->bindParam(":email",$email);
            $lozinkaSif=md5($lozinka);
            $priprema->bindParam(":lozinka",$lozinkaSif);
            $priprema->bindParam(":korisnickoIme",$korisnickoIme);
            $priprema->bindParam(":idUloge",$idUloge);
            $priprema->bindParam(":idKorisnika",$idKorisnika);
            if($priprema->execute()){
                $kod=201;
                $poruka="Korisnik je ažuriran";
                header("Location:index.php");
            }else{
               
                $poruka="Korisnik nije ažuriran";
            }
        }
    }
http_response_code($kod);
echo json_encode($poruka);
?>