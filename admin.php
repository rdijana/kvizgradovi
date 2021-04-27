<?php
session_start();
if(!isset($_SESSION['korisnik'])) {
echo("Nemate pravo pristupa ovoj stranici.Registrujte se.");
 exit();
}
include "head.php";
include "nav.php";
include "konekcija/konekcija.php";
$upit="SELECT k.idKorisnika,k.ime,k.prezime,k.email,k.korisnicko_ime,k.poruka,u.imeUloge as naziv FROM korisnik k INNER JOIN uloge u ON k.idUloge=u.idUloge";
$pripremi=$konekcija->prepare($upit);
$pripremi->execute();
$rezultati=$pripremi->fetchAll();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex justify-content-center mt-5 mb-5 pb-5 table-responsive">
            <table class="table table-dark" id="tabela">
                <thead>
                    <tr>
                        <th>Redni broj</th>
                    <th>Id korisnika</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Email</th>
                    <th>Poruka</th>
                    <th>Uloga</th>
                    <th>Izbriši</th>
                    <th>Ažuriraj</th>
                   
</tr>
                </thead>
                <tbody>
                    <?php 
                    $redniBroj=1;
                    foreach($rezultati as $rezultat):?>
                    
                        <tr data-brisanjeId="<?=$rezultata->idKorisnika?>">
                        <td><?=$redniBroj?></td>
                        <td><?=$rezultat->idKorisnika?></td>
                        <td><?=$rezultat->ime?></td>
                        <td><?=$rezultat->prezime?></td>
                        <td><?=$rezultat->email?></td>
                        <td><?=$rezultat->poruka?></td>
                        <td><?=$rezultat->naziv?></td>
                    <?php
                    if(isset($_SESSION["korisnik"]) && $_SESSION["korisnik"]->nazivUloge ==="admin"):?>
<td><a href="#" data-id="<?=$rezultat->idKorisnika?>" class="izbrisi dugme px-2 py-1">Izbriši</a></td>
<td><a href="#" data-id="<?=$rezultat->idKorisnika?>" class="azuriraj dugme px-2 py-1">Ažuriraj</a></td>

                    <?php endif;?>
                    <tr>
                    <?php 
                $redniBroj++;
                endforeach;?>
                 <?php
                    if(isset($_SESSION["korisnik"]) && $_SESSION["korisnik"]->nazivUloge ==="admin"):?>
                <tr><td colspan="9" class="text-center"><a href="#" class="dodaj dugme px-2 py-1">Dodaj korisnika</a></td></tr>
                 <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-6" id="azurirajSakrij">
            <h2 class="text-center">Forma za izmenu korisnika</h2>
            <form action="#" method="#">
        <input type="hidden" id="hiddenKorisnikId" name="hiddenKorisnikId" value=""/>
    <input type="text" name="ime" id="ime" placeholder="Ime"/>
        <span id="greskaImeA">Ime mora početi velikim slovom i imati najmanje 3,a najviše 50 karaktera</span>
        <input type="text" name="prezime" id="prezime" placeholder="Prezime"/>
        <span id="greskaPrezimeA">Prezime mora početi velikim slovom i imati najmanje 3,a najviše 50 karaktera</span>
        <input type="text" name="email" id="email" placeholder="Email"/>
        <span id="greskaEmailA">Email nije u dobrom formatu.Primer dijana&#46;radovanovic&#46;10&#46;18&#64;ict&#46;edu&#46;rs</span>
        <input type="text" name="username" id="username" placeholder="Username"/>
        <span id="greskaUserA">Korisničko ime mora sadržati sva mala slova i može imati minimalno 4 karaktera,a maksimalno 60</span>
        <input type="password" name="lozinka" id="lozinka" placeholder="Lozinka"/>
        <span id="greskaLozA">Lozinka mora sadržati samo brojeve minimalan broj karaktera je 4,a maksimalan 15</span>
        <select name="ddlUloga" id="ddlUloga" class="font">
            <option value="0">Izaberite</option>
            <?php
            $upitUloga="SELECT * FROM uloge";
            $pripremi=$konekcija->prepare($upitUloga);
            $pripremi->execute();
            $rezultatiUloge=$pripremi->fetchAll();
            foreach($rezultatiUloge as $rezultatU):?>
            <option value="<?=$rezultatU->idUloge?>"><?=$rezultatU->imeUloge?></option>
            <?php endforeach; ?>
        </select>
        <span id="greskaUlogaA">Izaberite ulogu</span>
        <input type="hidden" id="hiddenKorisnikId" name="hiddenKorisnikId" value=""/>
        <button type="button" class="button" id="azurirajKor">Ažuriraj</button>
        </form>
        <div class="odgovor"></div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-6" id="dodajSakrij">
            <h2 class="text-center">Forma za dodavanje korisnika</h2>
            <form id="formaDodaj">
<input type="text" id="imeK" placeholder="Unesite ime"/>
<span id="greskaIme">Ime mora početi velikim slovom i imati najmanje 3,a najviše 50 karaktera</span>
<input type="text" id="prezimeK" placeholder="Unesite prezime"/>
<span id="greskaPrezime">Prezime mora početi velikim slovom i imati najmanje 3,a najviše 50 karaktera</span>
<input type="text" id="emailK" placeholder="Unesite email"/>
<span id="greskaEmail">Email nije u dobrom formatu.Primer dijana&#46;radovanovic&#46;10&#46;18&#64;ict&#46;edu&#46;rs</span>
<input type="text" id="usernameK" placeholder="Unesite username"/>
<span id="greskaUser">Username mora sadržati sva mala slova i može imati minimalno 4 karaktera,a maksimalno 60</span></br>
<label for="pol" class="font">Izaberite pol</label></br>
<input type="radio" id="muski" name="pol" value="muski" class="font"/> Muški </br>
<input type="radio" id="zenski" name="pol" value="zenski" class="font"/> Ženski</br>
<span id="greskaPol">Izaberite pol</span>
<input type="password" id="lozinkaK" placeholder="Unesite lozinku"/>
<span id="greskaLoz">Lozinka mora sadržati samo brojeve minimalan broj karaktera je 4,a maksimalan 15</span>
<select name="ddlUloga" id="ddlUlogaK" class="font">
            <option value="0">Izaberite</option>
            <?php
            $upitUloga="SELECT * FROM uloge";
            $pripremi=$konekcija->prepare($upitUloga);
            $pripremi->execute();
            $rezultatiUloge=$pripremi->fetchAll();
            foreach($rezultatiUloge as $rezultatU):?>
            <option value="<?=$rezultatU->idUloge?>"><?=$rezultatU->imeUloge?></option>
            <?php endforeach; ?>
        </select>
<span id="greskaUloga">Izaberite ulogu</span>
<button type="button" class="button" id="dodajKorisnika">Dodaj</button>
</form>
<div id="info"></div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
