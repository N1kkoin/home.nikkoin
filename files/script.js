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