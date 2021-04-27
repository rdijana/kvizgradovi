var url=location.href;
$(document).ready(function(){
meni();
function meni(){
    var bar=document.querySelector("#nav a");
    var nav=document.querySelector("#nav ul");
    bar.addEventListener("click",function(event){
    event.preventDefault();
    nav.classList.toggle("vidljiv");
    nav.classList.toggle("nevidljiv");
    })
   }
   
})
if(url.indexOf("gradovi.php?strana=1")!=-1 || url.indexOf("gradovi.php?strana=2")!=-1 || url.indexOf("gradovi.php?strana=3")!=-1 || url.indexOf("gradovi.php?strana=4")!=-1 || url.indexOf("gradovi.php?strana=5")!=-1){
 $("#slike img").hover(function(){

 $(this).animate({opacity:"0.5"},"slow")

 },function(){
 $(this).animate({opacity:"1"},"slow")});
}
if(url.indexOf("register.php")!=-1){
$("#registruj").click(function(){
    let ispravni=true;
    let ime=$("#ime").val();
    let prezime=$("#prezime").val();
    let email=$("#email").val();
    let korisnickoIme=$("#username").val();
    let pol=$("input[name='pol']:checked").val();
    console.log(pol);
    let lozinka=$("#lozinka").val();

    let reImePrezime=/^[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,24}(\s[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,24})?$/;
    let reLozinka=/^[0-9]{4,15}$/;
    let reKorisnickoIme=/^[a-z]{4,60}$/;
    let reEmail=/^[a-z][a-z\d\.\-\_]+\@[a-z\d]+(\.[a-z]{2,4})+$/;

    if(!reImePrezime.test(ime)){
        $("#greskaIme").show();
         ispravni=false;

    }else{
        $("#greskaIme").hide();
    }
    if(!reImePrezime.test(prezime)){
        $("#greskaPrezime").show();
        ispravni=false;
    }else{
        $("#greskaPrezime").hide();
    }
    if(!reEmail.test(email)){
        $("#greskaEmail").show();
        ispravni=false;
    }
    else{
        $("#greskaEmail").hide();
    }
    if(!reKorisnickoIme.test(korisnickoIme)){
        $("#greskaUser").show();
        ispravni=false;
    }else{
        $("#greskaUser").hide();
    }
    if(pol==null){
        $("#greskaPol").show();
        ispravni=false;
    }else{
        $("#greskaPol").hide();
    }
    if(!reLozinka.test(lozinka)){
        // Zbog md5 15
        $("#greskaLoz").show();
        ispravni=false;
    }else{
        $("#greskaLoz").hide();
    }
if(ispravni){
    
    $.ajax({
        url:"modules/registar.php",
        method:"post",
        dataType:"json",
        data:{
            send:true,
            ime:ime,
            prezime:prezime,
            email:email,
            lozinka:lozinka,
            korisnickoIme:korisnickoIme,
            pol:pol
        },
    success:function(data){
        $("#info").html("Uspešno ste se registrovali");
                    window.location.href="index.php";
    },
    error:function(xhr,status,data){
        $("#info").html("Greška");
    }
    })
}     
})
}
        
if(url.indexOf("login.php")!=-1){
    $("#login").click(function(){
    // alert("Kliknuoo");
        var ispravni=true;
        var email=$("#email").val();
        var lozinka=$("#lozinka").val();
        
        
        var reLozinka=/^[0-9]{4,15}$/;
        var reEmail=/^[a-z][a-z\d\.\-\_]+\@[a-z\d]+(\.[a-z]{2,4})+$/;
           
        
        if(!reEmail.test(email)){
           $("#greskaEmail").show();
           ispravni=false;
        }else{
            $("#greskaEmail").hide();
        }
        if(!reLozinka.test(lozinka)){
            // Zbog md5 15
            $("#greskaLoz").show();
           ispravni=false;
        }else{
            $("#greskaLoz").hide();
        }
        // alert("Proverioo");
     if(ispravni){
            $.ajax({
                url:"modules/logovanje.php",
                method:"post",
                dataType:"json",
                data:{
                  
                   email:email,
                   lozinka:lozinka,
                   send:true
                },
                success:function(podaci){
                     window.location.href="index.php";
                    
                },
                error:function(xhr,status,error){
                   
                     window.location.href="index.php";
                }
    
            });
        }
        })


    }
    if(url.indexOf("admin.php")!=-1){
    $(document).ready(function(){
        $(".izbrisi").click(function(e){
            e.preventDefault();
           let id=$(this).data("id");
           console.log(id);
           $.ajax({
               url:"modules/izbrisiKorisnika.php",
               method:"post",
               dataType:"json",
               data:{
                   id:id
               },
               success:function(){
                 alert("Korisnik je izbrisan");
                   $('[data-brisanjeId="'+id+'"]').remove();
                location.reload();
               },error:function(xhr,status,error){
                   $(".odgovor").html("Došlo je do greske");
               }
           }); 
        });
    
        //AZURIRANJE
    
        $("#azurirajSakrij").hide();
        $(".azuriraj").click(function(e){
            e.preventDefault();
        $("#azurirajSakrij").show();
            let id=$(this).data("id");
    
    $("#hiddenKorisnikId").val(id);
    
        });
    $("#azurirajKor").click(function(){
        var ispravni=true;
        var ime=$("#ime").val();
        var prezime=$("#prezime").val();
        var email=$("#email").val();
        var korisnickoIme=$("#username").val();
        var lozinka=$("#lozinka").val();
        var idUloge=$("#ddlUloga").val();
        var idKorisnika=$("#hiddenKorisnikId").val();

        $reImePrezime=/^[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,24}(\s[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,24})?$/;
        $reLozinka=/^[0-9]{4,15}$/;
        $reKorisnickoIme=/^[a-z]{4,60}$/;
        $reEmail=/^[a-z][a-z\d\.\-\_]+\@[a-z\d]+(\.[a-z]{2,4})+$/;
           
        if(!$reImePrezime.test(ime)){
            $("#greskaImeA").show();
             ispravni=false;

        }else{
            $("#greskaImeA").hide();
        }
        if(!$reImePrezime.test(prezime)){
            $("#greskaPrezimeA").show();
            ispravni=false;
        }else{
            $("#greskaPrezimeA").hide();
        }
        if(!$reEmail.test(email)){
            $("#greskaEmailA").show();
            ispravni=false;
        }
        else{
            $("#greskaEmailA").hide();
        }
        if(!$reKorisnickoIme.test(korisnickoIme)){
            $("#greskaUserA").show();
            ispravni=false;
        }else{
            $("#greskaUserA").hide();
        }
        
        if(!$reLozinka.test(lozinka)){
            // Zbog md5 15
            $("#greskaLozA").show();
            ispravni=false;
        }else{
            $("#greskaLozA").hide();
        }
if(idUloge=="0"){
    $("#greskaUlogaA").show();
            ispravni=false;
        }else{
            $("#greskaUlogaA").hide();
        }
        if(ispravni){
            $.ajax({
                url:"modules/azuriraj.php",
                method:"post",
                dataType:"json",
                data:{
                    ime:ime,
                    prezime:prezime,
                    email:email,
                    korisnickoIme:korisnickoIme,
                    lozinka:lozinka,
                    uloga:idUloge,
                    idKorisnika:idKorisnika,
                    send:true
                },
                //ako se izvrsi sakrivamo formu
                success:function(podaci,xhr){
                    $("#azurirajSakrij").hide();
    $("#ime").val(podaci.ime);
    $("#prezime").val(podaci.prezime);
    $("#email").val(podaci.email);
    $("#username").val(podaci.korisnickoIme);
    $("#lozinka").val(podaci.lozinka);
    $("#ddlUloga").val(podaci.idUloge);
    $("#hiddenKorisnikId").val(podaci.idKorisnika);
    location.reload();
            },error:function(xhr,status,error){
                    
                    $(".odgovor").html("Došlo je do greske");
                }
            })
        }
    });
//DODAVANJE
$("#dodajSakrij").hide();
$(".dodaj").click(function(e){
    e.preventDefault();
$("#dodajSakrij").show();  
});

$("#dodajKorisnika").click(function(){
    var ispravni=true;
    var ime=$("#imeK").val();
    var prezime=$("#prezimeK").val();
    var email=$("#emailK").val();
    var korisnickoIme=$("#usernameK").val();
    var pol=$("input[name='pol']:checked").val();
    console.log(pol);
    var lozinka=$("#lozinkaK").val();
    var uloga=$("#ddlUlogaK").val();
    
    $reImePrezime=/^[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,24}(\s[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,24})?$/;
    $reLozinka=/^[0-9]{4,15}$/;
    $reKorisnickoIme=/^[a-z]{4,60}$/;
    $reEmail=/^[a-z][a-z\d\.\-\_]+\@[a-z\d]+(\.[a-z]{2,4})+$/;
       
    if(!$reImePrezime.test(ime)){
        $("#greskaIme").show();
         ispravni=false;

    }else{
        $("#greskaIme").hide();
    }
    if(!$reImePrezime.test(prezime)){
        $("#greskaPrezime").show();
        ispravni=false;
    }else{
        $("#greskaPrezime").hide();
    }
    if(!$reEmail.test(email)){
        $("#greskaEmail").show();
        ispravni=false;
    }
    else{
        $("#greskaEmail").hide();
    }
    if(!$reKorisnickoIme.test(korisnickoIme)){
        $("#greskaUser").show();
        ispravni=false;
    }else{
        $("#greskaUser").hide();
    }
    if(pol==null){
        $("#greskaPol").show();
        ispravni=false;
    }else{
        $("#greskaPol").hide();
    }
    if(!$reLozinka.test(lozinka)){
        // Zbog md5 15
        $("#greskaLoz").show();
        ispravni=false;
    }else{
        $("#greskaLoz").hide();
    }
    if(uloga=="0"){
        $("#greskaUloga").show();
                ispravni=false;
            }else{
                $("#greskaUloga").hide();
                console.log(uloga);
            }
    if(ispravni){
        $.ajax({
            url:"modules/dodaj.php",
            type:"post",
            data:{
               ime:ime,
               prezime:prezime,
               email:email,
               korisnickoIme:korisnickoIme,
               pol:pol,
               lozinka:lozinka,
               uloga:uloga,
               send:true
            },
            success:function(podaci,xhr){
                $("#info").html("Uspešna registracija");
                location.reload();
            },
            error:function(xhr,status,error){
                
                $("#info").html("Došlo je do greške");
            }

        });
    }
    })


    })
}
if(url.indexOf("index.php")!=-1){
$("#btnPosalji").click(function(){
    var ispravni=true;
    var ime=$("#tbIme").val();
    var prezime=$("#tbPrezime").val();
    var email=$("#tbEmail").val();
    var poruka=$("#tbPoruka").val();
    
    $reImePrezime=/^[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,24}(\s[A-ZĆČŽŠĐ]{1}[a-zćčžšđ]{2,24})?$/;
   $reEmail=/^[a-z][a-z\d\.\-\_]+\@[a-z\d]+(\.[a-z]{2,4})+$/;
    $rePoruka=/^([\w\d\n\s\,\.\!\?])+$/;
       
    if(!$reImePrezime.test(ime)){
        $("#greskaIme").show();
         ispravni=false;

    }else{
        $("#greskaIme").hide();
    }
    if(!$reImePrezime.test(prezime)){
        $("#greskaPrezime").show();
        ispravni=false;
    }else{
        $("#greskaPrezime").hide();
    }
    if(!$reEmail.test(email)){
        $("#greskaEmail").show();
        ispravni=false;
    }
    else{
        $("#greskaEmail").hide();
    }
    if(!$rePoruka.test(poruka)){
        $("#greskaPoruka").show();
        ispravni=false;
    }
    else{
        $("#greskaPoruka").hide();
    }
if(ispravni){    
    $.ajax({
            url:"modules/kontaktPoruka.php",
            type:"post",
            data:{
                ime:ime,
                prezime:prezime,
                email:email,
                poruka:poruka,
                send:true
            },
            success:function(podaci,xhr){
                alert("Uspešno ste poslali poruku.");
                location.reload();
            },
            error:function(xhr,status,error){
                
                $("#info").html("Došlo je do greške");
            }

        });
}
});

$("#pocetnaSlika img").hover(function(){
    $(this).css({"boxShadow" : "8px 8px 8px 12px rgba(216, 216, 216, 0.8)", "transition" : "box-shadow 0.5s"})
    },function(){
    $(this).css({"boxShadow" : "none"})})

    }