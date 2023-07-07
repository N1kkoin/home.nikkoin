function escrevendoNaHome() {
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
}
function hoverproblemamobile() {
    var isMobile = false; // Variável para verificar se é um dispositivo móvel
    var isFirstClick = true; // Variável para rastrear o primeiro clique

    // Verificar se o dispositivo é um dispositivo móvel
    function checkMobileDevice() {
        isMobile = (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
    }

    // Lidar com o clique no elemento
    function handleClick() {
        if (isMobile && isFirstClick) {
            isFirstClick = false; // Marcar o primeiro clique como concluído

            var imageContainer = document.getElementById('image-container');
            var imageLink = document.getElementById('image-link');
            var imageTitle = document.querySelector('#image-container .image-title');
            var opacity = getComputedStyle(imageTitle).getPropertyValue('opacity');

            if (opacity === '1') {
                // Ativar o href
                imageLink.setAttribute('href', 'ilustrações/');
            }
        }
    }

    // Chamar a função para verificar o dispositivo móvel ao carregar a página
    window.addEventListener('load', checkMobileDevice);
}










