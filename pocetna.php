<?php
session_start();
include "head.php";
include "nav.php";
?>
<main>
<div class="container-fluid mx-0 px-0">
    <div class="row mx-0 px-0">
        <div class="col-12 text-center p-5">
            <h2>O kvizu</h2>
        </div>
    </div>
</div>
<div class="container-fluid mb-5 pt-5">
    <div class="row mx-0 px-0">
        <div class="col-12 mx-0 px-0">
            <div class="row d-flex justify-content-center flex-wrap">
        <div class="col-md-10 col-lg-5">
<p class="text-justify"><span class="boja1">Kviz</span> (engl. quiz) predstavlja 
jednu formu igre u kojoj takmičar ili
   grupa učesnika pokušava da da tačan odgovor na određena pitanja iz različitih oblasti znanja. 
   Njegovi začeci postojali su još u doba <span class="boja1">Starog Rima</span>. Sintagma<span class="boja1"> Homo ludens</span> koristi se da bi 
   označila čoveka koji kao biće voli da se igra.
   Prvim učesnikom nekog <span class="boja1">kviza</span> u istoriji uslovno se smatra <span class="boja1">Edip</span>
    koji je odgovarao na <span class="boja1">Sfinginu
    zagonetku</span>.</p>
   <p>Naš <span class="boja1">kviz</span> je konkretno baziran na proveri vašeg znanja o gradovima Srbije.Nadamo se da će
      vam biti zabavno dok odgovarate 
     na naša pitanja o gradovima <span class="boja1"> Srbije</span>.
   </p>
        </div>
        <div class="col-md-10 col-lg-5" id="pocetnaSlika">
            <img src="slike/kviz.jpg" class="img-fluid" alt="kviz">
        </div>
            </div>
    </div>
    </div>
</div>
<?php if(isset($_SESSION["korisnik"])):?>
<div class="container-fluid mx-0 px-0 pt-5">
                    <div class="row mx-0 px-0 d-flex justify-content-center flex-wrap ">
                       
                      <div class="col-lg-7 col-12 mx-0 mb-4">
                        <div class="row mb-0 px-0 mx-0">
                          <div class="col-12">
                        <h2 class="text-center mb-4 pt-2">Kontakt forma</h2>
                        </div>
                        </div>
                        <div class="row px-0 mx-0 d-flex justify-content-center">
                          <div class=" col-12 col-md-10">
                        <form action="#" method="#">
                          <input type="text" id="tbIme" name="tbName" placeholder="Ime"/>
                          <span id="greskaIme">Ime mora početi velikim slovom i imati najmanje 3,a najviše 50 karaktera</span> 
                          <input type="text" id="tbPrezime" name="tbSName" placeholder="Prezime"/>
                          <span id="greskaPrezime">Prezime mora početi velikim slovom i imati najmanje 3,a najviše 50 karaktera</span> 
                          <input type="text" id="tbEmail" name="tbEmail" placeholder="Email"/>
                          <span id="greskaEmail">Email nije u dobrom formatu.Primer dijana&#46;radovanovic&#46;10&#46;18&#64;ict&#46;edu&#46;rs</span> 
                          <textarea name="message" id="tbPoruka" placeholder="Poruka"></textarea>
                          <span id="greskaPoruka">Poruka nije u dobrom formatu</span> 
                          <button type="button" class="button" id="btnPosalji"><i class="fas fa-paper-plane"></i></button>
                        </form>
                        <div id="info"></div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
<?php endif; ?>
</main>
<?php
include "footer.php";
?>