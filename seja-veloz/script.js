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