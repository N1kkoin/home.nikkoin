// tutorial texto mudando os numeros ///////////////////////////////////////////////////////////////////////////////////

function ajustarSegundos() {
  if (window.innerWidth > 700) {
    document.querySelector('.modo-normal').textContent = "+3";
    document.querySelector('.modo-desafiador').textContent = "+4";
    document.querySelector('.modo-perfeccionista').textContent = "+5";
  } else {
    document.querySelector('.modo-normal').textContent = "+4";
    document.querySelector('.modo-desafiador').textContent = "+5";
    document.querySelector('.modo-perfeccionista').textContent = "+6";
  }
}

window.addEventListener('resize', ajustarSegundos);
document.addEventListener("DOMContentLoaded", function() {
  ajustarSegundos(); // Chame a função para ajustar os números quando o DOM estiver pronto
});


  // tabs ------------------------------------------------------------------------------------------------ 
  
  const accordionBtns = document.querySelectorAll(".item-header");
  
  accordionBtns.forEach((accordion) => {
    accordion.onclick = function () {
      this.classList.toggle("active");
  
      let content = this.nextElementSibling;
      console.log(content);
  
      if (content.style.maxHeight) {
        //this is if the accordion is open
        content.style.maxHeight = null;
      } else {
        //if the accordion is currently closed
        content.style.maxHeight = content.scrollHeight + "px";
        console.log(content.style.maxHeight);
      }
    };
  });


// Resize event listener to adjust accordion content height on window resize
window.addEventListener('resize', () => {
  accordionBtns.forEach((accordion) => {
    let content = accordion.nextElementSibling;
    if (accordion.classList.contains('active')) {
      // Recalculate and update maxHeight for active accordion
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
});

  // overlay --------------------------------------------------------------------------------------------------~

  // Seleciona todas as imagens e o overlay
const images = document.querySelectorAll('.imgs-paraovelay');
const overlay = document.getElementById('overlay');
const overlayImg = document.getElementById('overlay-img');
const closeBtn = document.querySelector('.close');
const body = document.body;


// Quando uma imagem é clicada
images.forEach(image => {
  image.addEventListener('click', function() {
    overlay.style.display = 'flex';  // Mostra o overlay
    overlayImg.src = this.src;       // Define o src da imagem clicada no overlay
    body.classList.add('no-scroll'); // Adiciona a classe que desabilita o scroll

  });
});

// Quando o botão de fechar é clicado
closeBtn.addEventListener('click', function() {
  overlay.style.display = 'none'; // Esconde o overlay
  body.classList.remove('no-scroll'); // Remove a classe para habilitar o scroll

});

// Fecha o overlay ao clicar fora da imagem
overlay.addEventListener('click', function(event) {
  if (event.target !== overlayImg) {
    overlay.style.display = 'none'; // Esconde o overlay
    body.classList.remove('no-scroll'); // Remove a classe para habilitar o scroll

  }
});
