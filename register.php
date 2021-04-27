<?php
session_start();
include "head.php";
include "nav.php";
?>
<main>
<div class="container-fluid mx-0 mb-5 pb-5 pt-5">
                    <div class="row mx-0 d-flex justify-content-center flex-wrap ">
                       
                      <div class="col-lg-7 col-12 mx-0 mb-4">
                        <div class="row mb-0 px-0 mx-0">
                          <div class="col-12">
                        <h2 class="text-center mb-4 pt-2">Registracija</h2>
                        </div>
                        </div>
                        <div class="row px-0 mx-0 d-flex justify-content-center">
                          <div class=" col-12 col-md-10">
<form id="forma">
<input type="text" id="ime" placeholder="Unesite ime"/>
<span id="greskaIme">Ime mora početi velikim slovom,minimalan broj karaktera je 3,maksimalan 50.</span>
<input type="text" id="prezime" placeholder="Unesite prezime"/>
<span id="greskaPrezime">Prezime mora početi velikim slovom,minimalan broj karaktera je 3,maksimalan 50.</span>
<input type="text" id="email" placeholder="Unesite email"/>
<span id="greskaEmail">Email nije u dobrom formatu.Primer dijana.radovanovic.10.18@ict.edu.rs</span>
<input type="text" id="username" placeholder="Unesite username"/>
<span id="greskaUser">Username mora sadržati sva mala slova i može imati minimalno 4 karaktera,a maksimalno 60</span></br>
<label for="pol" class="font">Izaberite pol</label></br>
<input type="radio" id="muski" name="pol" value="muski" class="font"/> Muški </br>
<input type="radio" id="zenski" name="pol" value="zenski" class="font"/> Ženski</br>
<span id="greskaPol">Izaberite pol</span>
<input type="password" id="lozinka" placeholder="Unesite lozinku"/>
<span id="greskaLoz">Lozinka mora sadržati samo brojeve minimalan broj karaktera je 4,a maksimalan 15</span>
<button type="button" class="button" id="registruj" value="registruj">Registruj se</button>
</form>
<div id="info"></div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
</main>
<?php
include "footer.php";
?>