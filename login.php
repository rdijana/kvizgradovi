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
                        <h2 class="text-center mb-4 pt-2">Logovanje</h2>
                        </div>
                        </div>
                        <div class="row px-0 mx-0 d-flex justify-content-center">
                          <div class=" col-12 col-md-10">
                          <form>
<input type="text" name="email" id="email"  placeholder="Unesite email"/>
<span id="greskaEmail">Email nije u dobrom formatu.Primer dijana&#46;radovanovic&#46;10&#46;18&#64;ict&#46;edu&#46;rs</span>
<input type="password" name="lozinka" id="lozinka" placeholder="Unesite lozinku"/>
<span id="greskaLoz">Lozinka mora sadržati samo brojeve minimalan broj karaktera je 4,a maksimalan 15</span>
<button type="button" class="button" id="login">Uloguj se</button>
</form>
<div id="info">
<p>
<?php
if(isset($_SESSION["greskeL"])){
    foreach($_SESSION["greskeL"] as $greska){
echo "<p>$greska</p>";
    }
    unset($_SESSION["greskeL"]);
}
?>
</p>
</div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
</main>
<?php
include "footer.php";
?>