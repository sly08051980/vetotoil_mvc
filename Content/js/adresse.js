console.log("script chargé");



document.addEventListener('DOMContentLoaded', function() {

let inscription=document.getElementById('inscription');

if(inscription){


    let adresse = document.getElementById('adresse');
    let nbrLetter = 0;
    let ulListe = document.getElementById('list');

    adresse.addEventListener("input", async (eventInput) => {
        nbrLetter = eventInput.target.value.length;
        const rue = eventInput.target.value.split(" ").join("+");

        await findAdress(rue, nbrLetter);
    });

    async function findAdress(rue, nbrLetter) {
        if (nbrLetter > 4) {
            const response = await fetch('https://api-adresse.data.gouv.fr/search/?q=' + rue+'&limit=50');
            const adressResult = await response.json();
            console.log(adressResult);
            ulListe.style.display = "block";
            findData(adressResult);
        }
    }

    function findData(adressResult) {
        const labels = [];
        const city = [];
        const cityCode = [];
        const cityName = [];

        for (const recherche of adressResult.features) {
            labels.push(recherche.properties.label);
            city.push(recherche.properties.city);
            cityCode.push(recherche.properties.postcode);
            cityName.push(recherche.properties.name);
        }

        listeLi(labels, city, cityCode, cityName);
    }

    function listeLi(labels, city, cityCode, cityName) {
        ulListe.innerHTML = "";
        for (let i = 0; i < labels.length; i++) {
            const liListe = document.createElement("li");
            liListe.innerHTML = labels[i];
            liListe.setAttribute("id", i);
            liListe.classList.add('form-list-item');
            
            ulListe.appendChild(liListe);
    
            clickLi(liListe, city, cityCode, cityName);
        }
    }

    function clickLi(liListe, city, cityCode, cityName) {
        liListe.addEventListener("click", (event) => {
            const li = event.target;
            document.getElementById('codePostal').value = cityCode[li.id];
            document.getElementById('ville').value = city[li.id];
            adresse.value = cityName[li.id];

            ulListe.innerHTML = "";
            ulListe.style.display = "none";
        });
    }


    }
});
