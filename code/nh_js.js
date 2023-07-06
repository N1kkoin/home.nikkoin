
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


window.onscroll = function() {
  var nav = document.querySelector('nav');
  if (window.pageYOffset > 1) { // Altere este valor para o ponto de rolagem desejado
      nav.classList.add('nav-scrolled');
  } else {
      nav.classList.remove('nav-scrolled');
  }
};

$(document).ready(function() {
    // Selecionamos todas as divs dentro de .kodfun-gallery que possuem a classe .image-title
    $('.kodfun-gallery > div').on('click', function(e) {
        // Previne o comportamento padrão do clique (neste caso, seguindo o link)
        e.preventDefault();

        // Remove a classe 'visible' de qualquer .image-title que a possua
        $('.image-title.visible').removeClass('visible');

        // Adiciona a classe 'visible' ao .image-title desta div
        $(this).find('.image-title').addClass('visible');
    });

    // Quando o usuário clica fora da div, removemos a classe 'visible'
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.kodfun-gallery > div').length) {
            $('.image-title.visible').removeClass('visible');
        }
    });
});

