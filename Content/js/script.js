console.log("script charger");

document.addEventListener("DOMContentLoaded", function () {
  //#################################################################################################
  //page home
  //#################################################################################################
  let home = document.getElementById("home");
  if (home) {
    //debut écriture vétérinaire toiletteur
    const choice = ["Vétérinaire", "Toiletteur"];
    let counter = 0;
    let choiceProName = document.getElementById("choix");

    // script pour changer le mot + appel de la fonction type écriture
    function choisePro() {
      choiceProName = document.getElementById("choix");
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
      choiceProName.textContent = "";
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
  }

  //#################################################################################################
  //page ficheUsers
  //#################################################################################################

  let ficheUsers = document.getElementById("ficheUsers");
  if (ficheUsers) {
    //gestion de l affichage pour ajouter un animal apres l inscription

    let boutonAnimal = document.getElementById("boutonAnimal");

    boutonAnimal.addEventListener("click", function () {
      document.getElementById("afficherAnimal").classList.toggle("invisible"); //affiche la class invisible
    });

    //gestion de l action en fonction du select

    const formulaire = document.getElementById("choix_animal");
    if (formulaire) {
    
    let raceanimaux;
    const typeAnimal = document.getElementById("typeAnimal");
    const race = document.getElementById("race");
    const raceList = document.getElementById("raceList");
    document.getElementById("descriptionAnimal").style.display = "none";

    typeAnimal.addEventListener("change", function () {
      
      if (typeAnimal.value === "selection") {
        console.log("selection");
        document.getElementById("descriptionAnimal").style.display = "none";
      } else {
      
        document.getElementById("descriptionAnimal").style.display = "block";
        const formData = new FormData(formulaire);

        fetch("?controller=animal&action=fiche_users", {
          method: "POST",
          body: formData,
        })
        .then((response) => {
          // refaire le json car il y a du html dedans
          return response.text().then((html) => {
            const jsonStart = html.indexOf('{');//recherche le premier caractere pour le json
            const jsonEnd = html.lastIndexOf('}') + 1;//recherche le dernier caractere pour le json
            const jsonContent = html.substring(jsonStart, jsonEnd);//supprime la partie txt html 
            return JSON.parse(jsonContent);//recrée le json
          });
        })
        .then((data) => {
          // traitement du json
          console.log("Réponse du serveur (JSON) :", data);
          raceanimaux = data.raceanimaux;
          console.log("test: ", raceanimaux);
          
          // traitement de la reponse json
          race.addEventListener("input", function () {
            const raceChien = race.value.toLowerCase();
      
            // recherche les résultats en fonction de ce qui est tapé
            const resultat = raceanimaux.filter((obj) =>
              obj.race_animal.toLowerCase().includes(raceChien)
            );
      
            afficheResultat(resultat);
          });
        })
          .catch((error) => {
            console.error("erreur lors de la requete", error);
          });
      }
    });

    race.addEventListener("input", function () {
      const raceChien = race.value.toLowerCase();

      // recherche les resultat en fonction de ce qui est taper
      const resultat = raceanimaux.filter((obj) =>
        obj.race_animal.toLowerCase().includes(raceChien)
      );

      afficheResultat(resultat);
    });
    //affiche les resultats dans la liste
    function afficheResultat(results) {
      raceList.innerHTML = "";
      if ((raceList.style.display = "none")) {
        raceList.style.display = "block";
      }
      const nbrAffichage = 10;
      const resultats = results.slice(0, nbrAffichage);
      resultats.forEach((result) => {
        const listItem = document.createElement("li");

        listItem.textContent = result.race_animal;

        listItem.dataset.nomRace = result.race_animal;
        listItem.dataset.idRace = result.id_race;

        clickLi(listItem, raceList);

        raceList.appendChild(listItem);
      });
    }

    function clickLi(listItem, raceList) {
      listItem.addEventListener("click", (event) => {
        const li = event.currentTarget;

        const nomRace = li.dataset.nomRace;
        const idRace = li.dataset.idRace;

        document.getElementById("race").value = nomRace;
        document.getElementById("numero").value = idRace;
        // document.getElementById('race').value = idRace;
        raceList.style.display = "none";
      });
    }
    }
  }
});
