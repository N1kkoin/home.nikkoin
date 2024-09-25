const phrases = ["Web Designer,", "Ilustradora,", "Front-end,", "Criativa,", "Designer,", "Nikkoin Design,"];
const typeDelay = 100; // delay between typing each character in ms
const deleteDelay = 50; // delay before deleting each character in ms
const nextPhraseDelay = 2000; // delay before starting to type the next phrase in ms
const loopDelay = 200; // delay between loops in ms

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


// NAVBAR //////////////////////////////////////////////////////////////////

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
