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
    var myLink1 = document.getElementById("myLink1");
    var myLink2 = document.getElementById("myLink2");
  
    myLink1.addEventListener("dblclick", function(event) {
      event.preventDefault();
      window.location.href = "ilustrações/"; // Substitua pelo seu URL desejado
    });
  
    myLink2.addEventListener("dblclick", function(event) {
      event.preventDefault();
      window.location.href = "design_gráfico/"; // Substitua pelo seu URL desejado
    });
}










