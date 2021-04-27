<?php
include "../konekcija/konekcija.php";
header("Content-Type:application/json");

$poruka=null;

if(isset($_POST["id"])){
    $id=$_POST["id"];

    $upit="DELETE FROM korisnik WHERE idKorisnika=:id";
    $priprema=$konekcija->prepare($upit);
    $priprema->bindParam(":id",$id);
    try{
$kod=$priprema->execute()?201:300;
$poruka="Izbrisan";
    }catch(PDOException $ex){
$poruka=$ex;
    }
}
http_response_code($kod);
echo json_encode($poruka);
?>