<?php
include "../konekcija/konekcija.php";
header("Content-Type:application/json");

$podaci=null;

if(isset($_POST["send"])){
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $email=$_POST['email'];
    $poruka=$_POST["poruka"];

    $greske=[];

    $reImePrezime="/^[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,14}(\s[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,14})?$/";
    $reEmail="/^[a-z][a-z\d\.\-\_]+\@[a-z\d]+(\.[a-z]{2,4})+$/";
    $rePoruka="/^([\w\d\n\s\,\.\!\?])+$/";
    if(!preg_match($reImePrezime,$ime)){
        array_push($greske,"Ime nije u dobrom formatu");
    }
    if(!preg_match($reImePrezime,$prezime)){
        array_push($greske,"Prezime nije dobrog formata");
    }
    if(!preg_match($rePoruka,$poruka)){
        array_push($greske,"Lozinka nije u dobrom formatu");
    }
    if(!preg_match($reEmail,$email)){
    array_push($greske,"Email nije ok");
    }
    if(count($greske)){
        $podaci=$greske;
    }else{

        $upit="UPDATE korisnik SET poruka=:poruka WHERE ime=:ime AND prezime=:prezime AND email=:email";
        $pripremi=$konekcija->prepare($upit);
        $pripremi->bindParam(":ime",$ime);
        $pripremi->bindParam(":prezime",$prezime);
        $pripremi->bindParam(":email",$email);
        $pripremi->bindParam(":poruka",$poruka);
        try{
            $kod=$pripremi->execute()?201:300;
        }catch(PDOException $e){
            $podaci=$e;
        }
     }
}

http_response_code($kod);
echo json_encode($podaci);
?>