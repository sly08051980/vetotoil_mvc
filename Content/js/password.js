document.addEventListener("DOMContentLoaded", function () {

let inscription= document.getElementById("inscription");
let inscriptPro=document.getElementById("inscriptionPro");
let employer = document.getElementById("ajout_employer");

if(inscription || inscriptPro || employer){
 
let verification =document.getElementById("submit");

verification.addEventListener("click", function(event){
    let mdp=document.getElementById("password").value;
    let remdp =document.getElementById("repassword").value;
    if (mdp !== remdp) {

        alert ('mot de passe différent');
        event.preventDefault();
        return;
    }

    if(mdp.length<8){
        alert('Il faut au minimum 8 caractère');
        event.preventDefault();
        return;
    }
    if (!mdp.match(/[A-Z]/, 'g')){
        alert('il faut une majuscule');
        event.preventDefault();
        return;
    }
    let expression = /\d/;
    if (!expression.test(mdp)) {
       alert ('vous devez mettre des chiffres');
       event.preventDefault();
       return;
    }

    let special = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/; 
    if (!special.test(mdp)){
        alert("Il faut mettre un caractère spécial dans le mot de passe.");
        event.preventDefault();
        return;
    }
})
  
let mdp = document.getElementById("password");
let chiffre = document.getElementById("chiffre");
let majuscule=document.getElementById("majuscule");
let caractere=document.getElementById("caractere");

mdp.addEventListener('input', function() {
    let specialDocument =document.getElementById("special");
    let mdpValue = mdp.value;
    if (mdpValue.length > 0) {
        ulVisible.classList.remove("d-none");

        let expression = /\d/;
        let regex1 = /[a-z]/;
        let special = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/; 
        if (expression.test(mdpValue) && regex1.test(mdpValue)) {
            chiffre.classList.remove("d-none");
        } else {
            chiffre.classList.add("d-none");
        }

        if(mdpValue.match(/[A-Z]/, 'g')){
            majuscule.classList.remove("d-none");
        }else{
            majuscule.classList.add("d-none");
        }
        if(mdpValue.length>7){
caractere.classList.remove("d-none");
        }else{
            caractere.classList.add("d-none");
        }
        if (special.test(mdpValue)){
            specialDocument.classList.remove("d-none");
        }else{
            specialDocument.classList.add("d-none");
        }

    } else {
        ulVisible.classList.add("d-none");
    }
});


}

});