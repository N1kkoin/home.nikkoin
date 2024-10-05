<?php
// Configurações do banco de dados
define('DB_HOST', 'localhost');  // Geralmente é 'localhost' no Hostinger
define('DB_USER', 'u575812263_nick');  // Nome de usuário que você criou
define('DB_PASS', "Lunemo121'");    // Senha que você definiu
define('DB_NAME', 'u575812263_nikkoinart');  // Nome do banco de dados que você criou

// Cria a conexão com o banco de dados
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verifica se a conexão falhou e trata o erro
if ($conn->connect_error) {
    error_log("Erro de conexão: " . $conn->connect_error); // Registra o erro em um log
    echo "Erro ao conectar ao banco de dados."; // Mensagem amigável
    exit; // Termina a execução do script
}

// Fecha a conexão ao final do script
register_shutdown_function(function() use ($conn) {
    $conn->close();
});
?>
