document.addEventListener("DOMContentLoaded", function () {
  let societe = document.getElementById('societe');
  let modifierInputs = document.getElementsByClassName('modifierInput');
  let nomSociete = document.getElementById('nomSociete');

  if (societe) {
      console.log("societe");
      let btnModifier = document.getElementById('modifier');
      btnModifier.addEventListener("click", function () {
          if (btnModifier.value == "modifier") {
              console.log("click");
                btnModifier.style.display="none";
           document.getElementById('envoyerFormulaire').className="d-block btn btn-custom rounded-pill";
          
              Array.from(modifierInputs).forEach(function (input) {
                  modifier(input);
              });
          } else {
              console.log("nop");
          }
      });
  }

  function modifier(input) {
    //fonction pour afficher les inputs
      input.removeAttribute('readonly');
      input.classList.remove("border-0");
  }
});