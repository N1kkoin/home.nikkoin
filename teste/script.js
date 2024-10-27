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
  

  // ---------------------------------------------------------------------------------------------------------------------------

  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});
