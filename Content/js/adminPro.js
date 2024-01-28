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
              btnModifier.value = "envoyer";
              btnModifier.textContent = "Envoyer";
              Array.from(modifierInputs).forEach(function (input) {
                  modifier(input);
              });
          } else {
              console.log("nop");
          }
      });
  }

  function modifier(input) {
      input.removeAttribute('readonly');
      input.classList.remove("border-0");
  }
});