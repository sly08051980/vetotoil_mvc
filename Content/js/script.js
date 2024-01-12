console.log("script charger");

document.addEventListener('DOMContentLoaded', function () {

    //debut écriture vétérinaire toiletteur
    const choice = ["Vétérinaire", "Toiletteur"];
let counter = 0;
let choiceProName = document.getElementById('choix');


// script pour changer le mot + appel de la fonction type écriture
function choisePro() {
    choiceProName = document.getElementById('choix');
    if (counter === 0) {
        choiceProName.innerHTML = choice[1];
        
        counter = 1;
    } else if (counter === 1) {
        choiceProName.innerHTML = choice[0];
        
        counter = 0;
    }
    type();
}

setInterval(choisePro, 2000);

// fin du script de changement 


//fonction pour faire une ecriture comme à la machine à écrire
function type() {
    const text = choiceProName.innerHTML;
    let index = 0;
    choiceProName.textContent = ''; 
    //fonction pour faire lettre par lettre
    function addChar() {
        if (index < text.length) {
          choiceProName.textContent += text[index];
            index++;
            setTimeout(addChar, 100); 
        }
    }
    addChar();
}

//fin de la fonction
type();
//fin vétérinaire toiletteur 

  });

