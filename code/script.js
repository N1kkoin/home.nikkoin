const phrases = ["Nikkoin Design,", "Web Designer,", "Ilustradora,", "Front-end,", "Criativa,", "Designer,"];
const typeDelay = 100; // delay between typing each character in ms
const deleteDelay = 50; // delay before deleting each character in ms
const nextPhraseDelay = 2000; // delay before starting to type the next phrase in ms
const loopDelay = 200; // delay between loops in ms

let currentPhraseIndex = 0;
let isDeleting = false;
let currentText = "";
let typeTimeoutId = null;

function type() {
    const typewriterElement = document.getElementById("typewriter");
    
    // Verifica se o elemento existe antes de tentar modificar seu conteúdo
    if (!typewriterElement) {
        console.warn("Elemento com ID 'typewriter' não encontrado.");
        return; // Sai da função se o elemento não existir
    }
    
    const currentPhrase = phrases[currentPhraseIndex];
    currentText = isDeleting
        ? currentPhrase.substring(0, currentText.length - 1)
        : currentPhrase.substring(0, currentText.length + 1);
    typewriterElement.textContent = currentText;

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


// NAVBAR //////////////////////////////////////////////////////////////////


document.addEventListener('DOMContentLoaded', function () {
    const btn = document.querySelector('.box .btn');
    const navLinksMobile = document.querySelector('.nav_links_mobile');

    btn.addEventListener('click', function () {
        navLinksMobile.classList.toggle('open');
    });


    // Fecha o menu ao redimensionar a tela para maior que 768px
    window.addEventListener('resize', function () {
        if (window.innerWidth > 850) {
            navLinksMobile.classList.remove('open');
        }
    });
});

// Função que verifica o scroll e aplica/remova a classe com base na rolagem
function checkScrollPosition() {
    const nav = document.querySelector('nav');

    // Adiciona ou remove a classe 'scrolled-past-600' se o scrollY for maior que 600
    if (window.scrollY > 600) {
        nav.classList.add('scrolled-past-600');
    } else {
        nav.classList.remove('scrolled-past-600');
    }
}

// Verifica o scroll ao carregar a página
window.addEventListener('load', checkScrollPosition);

// Verifica o scroll enquanto o usuário navega na página
window.addEventListener('scroll', checkScrollPosition);

var btn = $('.btn');

btn.on('click', function() {
  $(this).toggleClass('active not-active');
});

$(window).on('resize', function() {
    if ($(window).width() > 850) {
      // Certifique-se de que o botão volte para o estado 'not-active' ao redimensionar
      btn.removeClass('active').addClass('not-active');
    }
  });

// MAIN /////////////////////////////////////////////////////////////////////////////////////////////////

// BARRAS GRAPH https://codepen.io/zaimus/pen/qBdwbXN -----------------------------------------------------------------

$(document).ready(function () {
    // Função para animar a largura da barra e adicionar a transição
    function animateBarChart(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {  // Se a barra estiver visível na tela
                const bar = $(entry.target);
                var dataWidth = bar.data("value");

                // Adiciona um pequeno delay antes de iniciar a animação
                setTimeout(() => {
                    // Adiciona a transição dinamicamente
                    bar.css("transition", "width 2s ease-out");

                    // Ajusta a largura da barra conforme o valor
                    bar.css("width", dataWidth + "%");

                    observer.unobserve(entry.target); // Para de observar depois de animar
                }, 200); // Delay de 300ms antes de animar
            }
        });
    }

    // Configura o IntersectionObserver
    let observer = new IntersectionObserver(animateBarChart, {
        root: null, // Usa a janela como viewport
        rootMargin: '0px 0px 50px 0px', // Margem positiva no final da página
        threshold: [0.1, 0.3, 0.5, 0.7, 1.0] // Vários thresholds para uma animação mais suave
    });

    // Observa cada barra
    $(".graph-bar").each(function () {
        observer.observe(this);
    });
});


// links quando clicar nos titulos /////////////////////////////////////////////////////////////////////


    // Selecionar todos os h2
    document.querySelectorAll('h2').forEach(h2 => {
        h2.addEventListener('click', function () {
            // Obter o link do atributo data-link
            const link = window.location.origin + this.getAttribute('data-link');

            // Criar um elemento temporário para copiar o link
            const tempInput = document.createElement('input');
            tempInput.value = link;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            // Selecionar o ícone dentro do h2
            const icon = this.querySelector('i');
            const originalClass = icon.className; // Salvar a classe original do ícone

            // Mudar para o ícone de confirmação (usando um ícone diferente, por exemplo, um ícone de check)
            icon.className = 'fa-solid fa-check';

            // Após 1 segundo (1000 ms), voltar ao ícone original
            setTimeout(() => {
                icon.className = originalClass;
            }, 1000); // Tempo em milissegundos (1 segundo)
        });
    });

    // portifólio imagens e overlay /////////////////////////////////////////////////////////////////////////////////////////////
// Selecionar todos os itens do portfólio
document.querySelectorAll('.portfolio-item').forEach(item => {
    item.addEventListener('click', function () {
        // Obter o ID do overlay a ser exibido
        const overlayId = this.getAttribute('data-overlay');
        const overlay = document.getElementById(overlayId);

        // Exibir o overlay
        overlay.classList.add('show');

        // Adicionar classe ao body para desativar o scroll
        document.body.classList.add('no-scroll');
    });
});

// Selecionar todos os botões de fechar
document.querySelectorAll('.close-overlay').forEach(button => {
    button.addEventListener('click', function () {
        // Fechar o overlay
        this.closest('.overlay').classList.remove('show');

        // Remover classe do body para ativar o scroll novamente
        document.body.classList.remove('no-scroll');
    });
});


// Animação logo e outros elementos com delay ////////////////////////////////////////////////////////////////////////////////
window.addEventListener("load", function() {
    // Seleciona todos os elementos com a classe 'animacao'
    var elements = document.querySelectorAll(".animacao");
    
    // Aplica a classe 'loaded' a cada elemento com base no valor de 'data-delay'
    elements.forEach(function(element) {
        // Converte o valor de 'data-delay' para um número, ou define como 0 se não existir
        var delay = parseInt(element.getAttribute('data-delay')) || 0;
        
        // Define um timeout para aplicar o atraso e adicionar a classe 'loaded'
        setTimeout(function() {
            element.classList.add("loaded");
        }, delay);
    });
});
