// INDEX.PHP /////////////////////////////////////////////////////////////////


// Alternar entre os formulários
function toggleForms(event, form) {
    event.preventDefault(); // Previne o envio do formulário
    
    var loginForm = document.getElementById('login-form');
    var registerForm = document.getElementById('register-form');

    if (form === 'login') {
        loginForm.classList.add('active');
        registerForm.classList.remove('active');
    } else {
        loginForm.classList.remove('active');
        registerForm.classList.add('active');
    }
}

// registro com sucesso mensagem ////////////////////////////////////////


function showSuccessMessage() {
    var successDiv = document.querySelector('.registro-sucesso');
    successDiv.classList.add('show'); // Adiciona a classe para exibir o div

    // Remove a mensagem após 3 segundos
    setTimeout(function() {
        successDiv.classList.remove('show'); // Remove a classe para ocultar o div
    }, 3000); // 3000 ms = 3 segundos
}

// Chame a função após o registro bem-sucedido
document.addEventListener('DOMContentLoaded', function() {
    // Suponha que isso seja chamado após o registro com sucesso
    showSuccessMessage();
});

// ENTER LOGIN OU CRIAR CONTA /////////////////////////////////////////////

document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.querySelector("#login-form form");
    const registerForm = document.querySelector("#register-form form");

    // Função para mover para o próximo campo ou enviar o formulário
    function handleKeyPress(event) {
        const inputs = Array.from(event.target.form.elements).filter(el => el.tagName !== "BUTTON"); // Ignora botões
        const index = inputs.indexOf(event.target); // Índice do campo atual
        
        if (event.key === "Enter") {
            event.preventDefault(); // Evita o envio imediato do formulário

            // Se o campo atual não for o último, move para o próximo
            if (index < inputs.length - 1) {
                inputs[index + 1].focus();
            } else {
                // Se for o último campo, clique no botão de submissão
                const submitButton = event.target.form.querySelector('button[type="submit"]');
                submitButton.click();
            }
        }
    }

    // Adiciona o evento keypress aos inputs do formulário de login
    loginForm.querySelectorAll("input").forEach(input => {
        input.addEventListener("keypress", handleKeyPress);
    });

    // Adiciona o evento keypress aos inputs do formulário de registro
    registerForm.querySelectorAll("input").forEach(input => {
        input.addEventListener("keypress", handleKeyPress);
    });
});