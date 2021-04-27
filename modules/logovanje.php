<?php
session_start();
include "../konekcija/konekcija.php";
if(isset($_POST["send"])){
    $email=$_POST["email"];
    $lozinka=$_POST["lozinka"];

    $regexEmail="/^[a-z][a-z\d\.\-\_]+\@[a-z\d]+(\.[a-z]{2,4})+$/";
    $regexLozinka= "/^[0-9]{4,15}$/";

    $greske=[];
    if(!preg_match($regexEmail,$email)){
$greske[]="Email nije ok";
    }
    if(!preg_match($regexLozinka,$lozinka)){
        $greske[]="Lozinka nije ok";
    }
    if(count($greske)==0){
        $upit="SELECT u.imeUloge as nazivUloge,u.idUloge as idUloge,k.email,k.idKorisnika
        FROM korisnik k INNER JOIN uloge u ON k.idUloge=u.idUloge WHERE email=:email AND lozinka=:lozinka";
        $lozinka=md5($lozinka);
        $pripremi=$konekcija->prepare($upit);
        $pripremi->bindParam(":email",$email);
        $pripremi->bindParam(":lozinka",$lozinka);
        $pripremi->execute();
        if($pripremi->rowCount()==1){
            $korisnik=$pripremi->fetch();
            $_SESSION["korisnik"]=$korisnik;
           
        }else{
            $_SESSION["greskeL"]=["Korisnik nije pronadjen"];
       
        }
    }else{
        $_SESSION["greskeL"]=$greske;
        
    }
}
?>