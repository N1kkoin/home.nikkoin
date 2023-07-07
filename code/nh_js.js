
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


var meuElemento = document.getElementById("meu-elemento");
var isHovered = false;

// Adicionar evento de hover apenas quando ativado
meuElemento.addEventListener("mouseover", function () {
  isHovered = true;
  this.style.display = "block";
});

meuElemento.addEventListener("mouseout", function () {
  isHovered = false;
  this.style.display = "none";
});

// Ocultar o elemento inicialmente
meuElemento.style.display = "none";

// Mostrar o elemento se o hover estiver ativado
window.addEventListener("mousemove", function () {
  if (!isHovered) {
    meuElemento.style.display = "none";
  }
});

