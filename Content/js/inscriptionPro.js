console.log("script charger");

// https://entreprise.data.gouv.fr/api/sirene/v3/etablissements/{siret}

// 39860733300059
// https://entreprise.data.gouv.fr/api/sirene/v3/etablissements/39860733300059

document.addEventListener("DOMContentLoaded", function () {
  const url = "https://api.insee.fr/entreprises/sirene/V3/siret/";
  const accessToken = "8a31d28c-6c89-3dcc-afbe-ae5dd32ed3da";
  const button = document.getElementById("button");

  //#########################################
  //empecher de mettre des lettres ds le siret et ne mettre que des chiffres
  //#########################################

  document.getElementById('siret').addEventListener('keydown', function(event) {
    
    let keyCode = event.which || event.keyCode;

    //#########################################
  //autoriser que les chiffres et certaines touche comme supprimer 
  //#########################################
    if (!((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105) || [8, 9, 13, 27, 46].includes(keyCode))) {
      
        event.preventDefault();
    }

    //#########################################
  //limite a 14chiffres et supprime les lettres
  //#########################################
    let inputValue = event.target.value.replace(/\D/g, ''); 
    if (inputValue.length >= 14 && ![8, 46].includes(keyCode)) {
        event.preventDefault();
    }

});

  button.addEventListener("click", async function () {
    const siret = document.getElementById("siret").value;
    console.log("test : ", siret);

        //#########################################
  //recherche ds l api siret de l insee les info
  //#########################################

    const headers = {
      "Content-Type": "application/x-www-form-urlencoded",
      Accept: "application/json",
      Authorization: `Bearer ${accessToken}`,
    };

    try {
      const response = await fetch(url + siret, {
        method: "GET",
        headers: headers,
      });

      if (!response.ok) {
        throw new Error("Réponse réseau non OK");
      }

      const resultat = await response.json();
      console.log("resultat : ", resultat);

      searchInfo(resultat);
    } catch (error) {
      console.error("Erreur :", error);
    }
  });

  function searchInfo(resultat) {
    const numeroVoie = resultat.etablissement.adresseEtablissement.numeroVoieEtablissement;
    const typeVoie = resultat.etablissement.adresseEtablissement.typeVoieEtablissement;
    const libelleVoie = resultat.etablissement.adresseEtablissement.libelleVoieEtablissement;
    const complementAdresse = resultat.etablissement.adresseEtablissement .complementAdresseEtablissement;
    const libelleCommune =resultat.etablissement.adresseEtablissement.libelleCommuneEtablissement;
    const codePostal = resultat.etablissement.adresseEtablissement.codePostalEtablissement;
    const denominationUsuelleEtablissement = resultat.etablissement.periodesEtablissement[0].denominationUsuelleEtablissement;
    // console.log('denominationUsuelleEtablissement : ',denominationUsuelleEtablissement);
    const nomUniteLegale = resultat.etablissement.uniteLegale.nomUniteLegale;

      document.getElementById('adresse').value=numeroVoie+" "+typeVoie+" "+libelleVoie;
      document.getElementById('complementAdresse').value=complementAdresse;
      document.getElementById('codePostal').value=codePostal;
      document.getElementById('ville').value=libelleCommune;
      document.getElementById('nomSociete').value=denominationUsuelleEtablissement;
      document.getElementById('nomDirigeant').value=nomUniteLegale;

    // console.log(numeroVoie);
    
    const elements = [
        'adresse',
        'complementAdresse',
        'codePostal',
        'ville',
        'nomSociete',
        'nomDirigeant'
      ];
      
      elements.forEach(elementId => {
        const element = document.getElementById(elementId);
        const value = element.value.trim(); 
      
        if (value !== null && value !== '') {
    
          element.style.backgroundColor = 'purple';
          element.style.color = 'white';
        }
      });
  }

    //#########################################
  //empecher de mettre des lettres ds le telephone et ne mettre que des chiffres
  //#########################################

  document.getElementById('telephoneSociete').addEventListener('keydown', function(event) {
    
    telephone()
});
document.getElementById('telephoneDirigeant').addEventListener('keydown', function(event) {
    
  telephone()
});

function telephone(){
  let keyCode = event.which || event.keyCode;

  //#########################################
//autoriser que les chiffres et certaines touche comme supprimer 
//#########################################
  if (!((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105) || [8, 9, 13, 27, 46].includes(keyCode))) {
    
      event.preventDefault();
  }

  //#########################################
//limite a 14chiffres et supprime les lettres
//#########################################
let inputValue = event.currentTarget.value.replace(/\D/g, '');
let element = event.currentTarget;

if (inputValue.length >= 10 && ![8, 46].includes(keyCode)) {
    event.preventDefault();
}

if (inputValue.length === 9) {
    element.style.backgroundColor = 'purple';
    element.style.color = 'white';
} else {
    element.style.backgroundColor = ''; // Réinitialise la couleur si la longueur n'est pas égale à 10
    element.style.color = '';
}
}
});
