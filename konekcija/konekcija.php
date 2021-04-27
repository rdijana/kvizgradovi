<?php
$DBName = "id13045341_gradovikviz";
$serverName = "localhost";
$user = "id13045341_kviz";
$pass = "dijana1234";
try{
    $konekcija= new PDO("mysql:host=$serverName;dbname=$DBName;", $user,$pass);
$konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}catch(PDOException $ex){
    echo $ex->getMessage();
}

?>
