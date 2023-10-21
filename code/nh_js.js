const phrases = ["Designer.", "Ilustradora.", "Criativa.", "Nikkoin Design"];
const typeDelay = 100; // delay between typing each character in ms
const deleteDelay = 50; // delay before deleting each character in ms
const nextPhraseDelay = 2000; // delay before starting to type the next phrase in ms
const loopDelay = 500; // delay between loops in ms

let currentPhraseIndex = 0;
let isDeleting = false;
let currentText = "";
let typeTimeoutId = null;

function type() {
    const currentPhrase = phrases[currentPhraseIndex];
    currentText = isDeleting
    ? currentPhrase.substring(0, currentText.length - 1)
    : currentPhrase.substring(0, currentText.length + 1);
    document.getElementById("typewriter").textContent = currentText;

    if (!isDeleting && currentText === currentPhrase) {
    isDeleting = true;
    typeTimeoutId = setTimeout(() => {
        type();
    }, nextPhraseDelay);
    } else if (isDeleting && currentText === "") {
    isDeleting = false;
    currentPhraseIndex = (currentPhraseIndex + 1) % phrases.length;
    typeTimeoutId = setTimeout(() => {
        type();
    }, loopDelay);
    } else {
    typeTimeoutId = setTimeout(() => {
        type();
    }, isDeleting ? deleteDelay : typeDelay);
    }
}
type();


// PORTIFOLIO HOVER CLICK --------------------------------------------------------------

document.addEventListener("DOMContentLoaded", function() {
    const portfolioLink = document.getElementById("Portifólio");
    const dropdownContent = document.querySelector(".dropdown-content");
  
    let dropdownVisible = false;
  
    // Adicione um ouvinte de clique ao link "Portifólio"
    portfolioLink.addEventListener("click", function(e) {
      e.preventDefault(); // Evita que o link seja seguido
  
      // Alternar a visibilidade do submenu
      if (!dropdownVisible) {
        dropdownContent.style.display = "block";
        dropdownVisible = true;
      } else {
        dropdownContent.style.display = "none";
        dropdownVisible = false;
      }
    });
  
    // Adicione ouvintes de hover para mostrar e ocultar o submenu
    portfolioLink.addEventListener("mouseenter", function() {
      if (!dropdownVisible) {
        dropdownContent.style.display = "block";
      }
    });
  
    portfolioLink.addEventListener("mouseleave", function() {
      if (!dropdownVisible) {
        dropdownContent.style.display = "none";
      }
    });
  
    // Adicione ouvintes de clique aos links do submenu
    const subLinks = document.querySelectorAll(".dropdown-content a");
    subLinks.forEach(function(link) {
      link.addEventListener("click", function() {
        // Ocultar o submenu quando um link do submenu for clicado
        dropdownContent.style.display = "none";
        dropdownVisible = false;
      });
    });
  });





